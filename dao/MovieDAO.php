<?php 
    require_once("models/Movie.php");
    require_once("models/Message.php");
    require_once("dao/ReviewDAO.php");

    class MovieDAO implements MovieDAOInterface{

        private $coon;
        private $url;
        private $message;

        public function __construct(PDO $coon, $url){
            $this->coon = $coon;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildMovie($data){
            $movie = new Movie();


            $movie->id = $data['id'];
            $movie->title = $data['title'];
            $movie->description = $data['description'];
            $movie->image = $data['image'];
            $movie->trailer = $data['trailer'];
            $movie->category = $data['category'];
            $movie->length = $data['length'];
            $movie->users_id = $data['users_id'];

            $reviewDao = new ReviewDAO($this->coon, $this->url);

            $rating = $reviewDao->getRatings($movie->id);

            $movie->rating = $rating;

            return $movie;
        }
        
        public function findAll(){
            $stmt = $this->coon->query("SELECT * FROM movies ORDER BY id DESC");
            $stmt->execute();
            $movies = $stmt->fetchAll();
            $allMovies =[];

            foreach($movies as $movie){
                $allMovies[] = $this->buildMovie($movie);
            }

            return($allMovies);
           
        }

        public function create(Movie $movie){
            $stmt = $this->coon->prepare("INSERT INTO movies(title, description, image,trailer, category,length, users_id) VALUES (:title, :description, :image, :trailer,:category, :length, :users_id)");

            $stmt->bindParam(":title", $movie->title);
            $stmt->bindParam(":description", $movie->description);
            $stmt->bindParam(":image", $movie->image);
            $stmt->bindParam(":trailer", $movie->trailer);
            $stmt->bindParam(":category", $movie->category);
            $stmt->bindParam(":length", $movie->length);
            $stmt->bindParam(":users_id", $movie->users_id);

            $stmt->execute();

            $this->message->setMessage("Seu filme foi cadastrado com sucesso!", "msg-sucess", "index.php");
        }

        public function findByUserId($id){
            $stmt = $this->coon->prepare("SELECT * FROM movies  WHERE users_id=:id ORDER BY id DESC");
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $movies = $stmt->fetchAll();
            
            $allMovies =[];

            foreach($movies as $movie){
                $allMovies[] = $this->buildMovie($movie);
            }

            return($allMovies);
        }

        public function findByCategory($category){
            $stmt = $this->coon->prepare("SELECT * FROM movies  WHERE category=:category ORDER BY id DESC");
            $stmt->bindParam(":category", $category);

            $stmt->execute();

            $movies = $stmt->fetchAll();
            
            $allMovies =[];

            foreach($movies as $movie){
                $allMovies[] = $this->buildMovie($movie);
            }

            return($allMovies);
        }

        public function findByMovieId($id){
            $stmt = $this->coon->prepare("SELECT * FROM movies  WHERE id=:id");
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            if($stmt->rowCount() > 0) {

                $movieData = $stmt->fetch();
        
                $movie = $this->buildMovie($movieData);
        
                return $movie;
        
              } else {
        
                return false;
        
              }

        }


        public function destroy($id){
            $stmt = $this->coon->prepare("DELETE FROM movies WHERE id=:id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();
            
            $this->message->setMessage("Seu filme foi deletado com sucesso!", "msg-error", "back");
        }

        public function findMoviesByTitleName($title){
            $stmt = $this->coon->prepare("SELECT * FROM movies
            WHERE title LIKE :title");

            $stmt->bindValue(":title", '%'.$title.'%');

            $stmt->execute();

            $movies = $stmt->fetchAll();
            
            $allMovies =[];

            foreach($movies as $movie){
                $allMovies[] = $this->buildMovie($movie);
            }

            return($allMovies);

        }

        public function updateMovie(Movie $movie){

            $stmt = $this->coon->prepare("UPDATE movies SET
            title = :title,
            description = :description,
            image = :image,
            category = :category,
            trailer = :trailer,
            length = :length
            WHERE id = :id      
          ");

            $stmt->bindParam(":title", $movie->title);
            $stmt->bindParam(":description", $movie->description);
            $stmt->bindParam(":image", $movie->image);
            $stmt->bindParam(":category", $movie->category);
            $stmt->bindParam(":trailer", $movie->trailer);
            $stmt->bindParam(":length", $movie->length);
            $stmt->bindParam(":id", $movie->id);

            $stmt->execute();

            $this->message->setMessage("Filme atualizado com sucesso!", "msg-success", "dashboard.php");

        }
    }
?>