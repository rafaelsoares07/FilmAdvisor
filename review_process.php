<?php 

require_once("globals.php");
require_once("models/User.php");
require_once("db.php");
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");
require_once("dao/ReviewDAO.php");
require_once("models/Message.php");
require_once("models/User.php");
require_once("models/Movie.php");


$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);
$movieDao = new MovieDAO($conn, $BASE_URL);
$ReviewDao = new ReviewDAO($conn, $BASE_URL);


$type = filter_input(INPUT_POST, "type");

$userData =$userDao->verifyToken(true);



if($type==="create"){

    if(!empty($userData)){
        $review = new Review();

        $review_text = filter_input(INPUT_POST , "review");
        $rating = filter_input(INPUT_POST, "rating");
        $movie_id = filter_input(INPUT_POST, "movie_id");
        $user_id = $userDao->verifyToken()->id;
    
        if(!empty($review_text) && !empty($rating)){
    
            if(strlen($review_text)>30){
                $review->review= $review_text;
                $review->rating = $rating;
                $review->movies_id = $movie_id;
                $review->users_id = $user_id;
    
                $ReviewDao->create($review);
    
                $message->setMessage("Avaliação adicionada com sucesso", "msg-sucess", "back");
            }else{
                $message->setMessage("Sua avaliação do filme deve conter mais de 30 caracteres", "msg-error", "back");
            }
    
            
        }
    }
    else{
        $message->setMessage("Você deve fazer o login antes de criar sua avaliação", "msg-error", "back");
    }
    


}
else{
    $message->setMessage("Funcionalidade ainda não está implementada no review_process.php", "msg-error", "index.php");
}


?>