<?php 
    require_once("globals.php");
    require_once("models/User.php");
    require_once("db.php");
    require_once("dao/UserDAO.php");
    require_once("dao/MovieDAO.php");
    require_once("models/Message.php");
    require_once("models/User.php");
    require_once("models/Movie.php");

    $userDao= new UserDAO($conn, $BASE_URL);

    $userData = $userDao->verifyToken();


    $message = new Message($BASE_URL);

    $type = filter_input(INPUT_POST, "type");
    $user_id = filter_input(INPUT_POST, "user_id");
    
    $movieDAO = new MovieDAO($conn, $BASE_URL);
    

    if($type==="create"){
        $title = filter_input(INPUT_POST, "title");
        $description = filter_input(INPUT_POST, "description");
        $trailer = filter_input(INPUT_POST, "trailer");
        $category = filter_input(INPUT_POST, "category");
        $length = filter_input(INPUT_POST, "length");

        $movie = new Movie();

        $formatTrailer = $movie->convertYouTubeURL($trailer);

        
        //validaacao minima de dados

        if(!empty($title) && !empty($description) && !empty($category)){
            $movie->title = $title;
            $movie->description = $description;
            $movie->trailer = $formatTrailer;
            $movie->category = $category;
            $movie->length = $length;
            $movie->users_id = $userData->id;
            //upload imagem 

            if(isset($_FILES['image']) && !empty($_FILES["image"]["tmp_name"])){
                $image = $_FILES['image'];
                print_r($image);
    
                $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
                $jpgArray = ["image/jpeg", "image/jpg"];
                //checar tipo de image
    
                if(in_array($image["type"], $imageTypes)){
                    if(in_array($image['type'], $jpgArray)){
                        $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                        echo "enviou um jpg";
                    }else{
                        $imageFile = imagecreatefrompng($image["tmp_name"]);
                        echo "enviou um png";
                    }
    
                    $imageName = $movie->imageGenerateName();
    
                    imagejpeg($imageFile, "./img/movies/" . $imageName, 100);
    
                    $movie->image = $imageName;
                }else{
                    $message->setMessage("Tipo da imagem não suportado", "msg-error", 'back');
                }
            }

            print_r($movie);
            echo "<br>";
            print_r($_FILES['image']);

            $movieDAO->create($movie);
            

        }
        else{
            $message->setMessage("precisa de pelo menosos dados minimos", "msg-error", "back");
        }
        

        echo "TITULO: " . $title . "<br>";
        echo "DESCRICAO: " . $description . "<br>";
        echo "TRAILER: " . $trailer . "<br>";
        echo "CATEGORIA: " . $category . "<br>";
        echo "DURACAO: " . $length . "<br>";

    }
    elseif($type==="delete"){

        $id = filter_input(INPUT_POST, "id");

        $movie = $movieDAO->findByMovieId($id);
        $userId = $userData->id;

        if($movie){

            if($movie->users_id===$userId){
                $movieDAO->destroy($id);
            }else{
                $message->setMessage("Você não é o dono desse filme", "msg-error", "back");
            }

        }else{
            $message->setMessage("Esse filme não pode ser deletado no momento", "msg-error", "index.php");
        }

        
        
    }
    elseif ($type==="update") {

        $title = filter_input(INPUT_POST, "title");
        $description = filter_input(INPUT_POST, "description");
        $trailer = filter_input(INPUT_POST, "trailer");
        $category = filter_input(INPUT_POST, "category");
        $length = filter_input(INPUT_POST, "length");
        $id = filter_input(INPUT_POST, "id");


        $movieDB = $movieDAO->findByMovieId($id);

        if($movieDB){

            if($userData->id === $movieDB->users_id){
                echo $title . "<br>";
                echo $description . "<br>";
                echo $trailer . "<br>";
                echo $category . "<br>";
                echo $length . "<br>";

                echo $user_id;

                $movie = new Movie();

                $formatTrailer = $movie->convertYouTubeURL($trailer);

                if(!empty($title) && !empty($description) && !empty($category)){
                    $movie->title = $title;
                    $movie->description = $description;
                    $movie->trailer = $formatTrailer;
                    $movie->category = $category;
                    $movie->length = $length;
                    $movie->id = $movieDB->id;
                    $movie->image = $movieDB->image;

                    if(isset($_FILES['image']) && !empty($_FILES["image"]["tmp_name"])){
                        $image = $_FILES['image'];
                        print_r($image);
            
                        $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
                        $jpgArray = ["image/jpeg", "image/jpg"];
                        //checar tipo de image
            
                        if(in_array($image["type"], $imageTypes)){
                            if(in_array($image['type'], $jpgArray)){
                                $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                                echo "enviou um jpg";
                            }else{
                                $imageFile = imagecreatefrompng($image["tmp_name"]);
                                echo "enviou um png";
                            }
            
                            $imageName = $movie->imageGenerateName();
            
                            imagejpeg($imageFile, "./img/movies/" . $imageName, 100);
            
                            $movie->image = $imageName;
                        }else{
                            $message->setMessage("Tipo da imagem não suportado", "msg-error", 'back');
                        }
                    }
                    $movieDAO->updateMovie($movie);
                }
            }else{
                $message->setMessage("Você tem a permissão para isso ", "msg-error", "back");
            }

        }else{
            $message->setMessage("Não existe esse filme no banco de dados ", "msg-error", "back");
        }        
        
    }
    else{
        $message->setMessage("Tipo de ação não implementada no process de filmes ", "msg-error", "index.php");
    }

?>