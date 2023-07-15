<?php 

    require_once("models/Review.php");
    require_once("models/Message.php"); 
    require_once("dao/UserDAO.php");

    class ReviewDAO implements ReviewDAOInterface{

        private $coon;
        private $url;
        private $message;

        public function __construct(PDO $coon, $url){
            $this->coon = $coon;
            $this->url = $url;
            $this->message = new Message($url);
        }


        public function buildReview($data){
            $review = new Review();

            $review->id = $data['id'];
            $review->rating = $data['rating'];
            $review->review = $data['review'];
            $review->users_id = $data['users_id'];
            $review->movies_id = $data['movies_id'];
            
            return $review;
        }

        public function create(Review $review){
            $stmt = $this->coon->prepare(
            "INSERT INTO reviews(rating, review, users_id, movies_id) 
            VALUES (:rating,:review,:users_id,:movies_id)"
            );

            $stmt->bindParam(":rating", $review->rating);
            $stmt->bindParam(":review", $review->review);
            $stmt->bindParam(":users_id", $review->users_id);
            $stmt->bindParam(":movies_id", $review->movies_id);

            $stmt->execute();
        }

        public function findAllReviewsByMovieId($id){
            $stmt = $this->coon->prepare("SELECT * FROM reviews WHERE movies_id=:id ORDER BY id DESC");
            $stmt->bindParam("id", $id);
            $stmt->execute();

            $reviews = $stmt->fetchAll();
            
            $allReviews =[];

            $userDao = new UserDAO($this->coon, $this->url);

            foreach($reviews as $review){

                $revieWObject = $this->buildReview($review);

                $user = $userDao->findById($revieWObject->users_id);

                $revieWObject->user = $user;

                $allReviews[] = $revieWObject;
            }

            return $allReviews;
        }

        public function hasAlreadyReviewed($id, $userId){

        }

        public function getRatings($id){
            $stmt = $this->coon->prepare("SELECT AVG(rating) AS avg_rating FROM reviews WHERE movies_id = :movies_id");
            $stmt->bindParam("movies_id", $id);
            $stmt->execute();

            $result = $stmt->fetch();

            $avgRating = $result['avg_rating'];

            if($avgRating===null){
                return "Não possui avaliação";
            }
            else{
                return round($avgRating);
            }
                
            
        }

    }


?>