<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");?>

<?php 
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/MovieDAO.php");

    

    $user = new User();
    $userDao = new UserDAO($conn, $BASE_URL);
    $movieDao = new MovieDAO($conn, $BASE_URL);
    $userData = $userDao->verifyToken(true);


    $id = filter_input(INPUT_GET, "id");

    if(empty($id)){
        
        if(!empty($userData->id)){
            $id=$userData->id;
        }
        else{
            $message->setMessage("Usuario nao encontrado", "msg-error", "index.php");
        }


    }else{

    
        $userData = $userDao->findById($id);    


        if(!$userData){
           $message->setMessage("Usuario nao encontrdo", "msg-error", "index.php");
        }
    
    }

    

    $fullName = $user->getFullName($userData);

    if($userData->image === null || !file_exists("img/users/" . $userData->image)){
        
        $userData->image = "user.png";
    }

   $userMovies = $movieDao->findByUserId($id);

   


?>

<div id="main-container-profile" class="container-fluid">
    <h3><?=$fullName?></h3>
    <div id="profile-image-container" style="background-image: url(<?= $BASE_URL ?>img/users/<?=$userData->image?>)"></div>
    
   <div class="profile-bio">
        <p>
            <i class="fa-solid fa-quote-left"></i>
            <?=$userData->bio?>dasdsadsadsa
            <i class="fa-solid fa-quote-right"></i>
        </p>
   </div>
    


    <div class="d-flex section-profile-movies">
        
        <?php foreach($userMovies as $movie):?>
            <div>
                <div class="movie-container-profile" style="margin-bottom:50px; background-image: url('<?=$BASE_URL?>img/movies/<?=$movie->image?>');">
                </div>

                <div class="movie-info">
                    <div class="rating">
                    
                    <span>7</span>
                    <i class="fa-solid fa-star" style="color: #e4f312;"></i>
                    
                    </div>
                    <div class="details profile">
                        <p class="movie-title"><?=$movie->title?></p>
                        <a href="<?=$BASE_URL?>moviereview.php?id=<?=$movie->id?>" class="movie-btn movie-btn-solid">Conhecer</a>
                    </div>
                    
                </div>

            </div>
            
        <?php endforeach;?>
    </div>

</div>

<?php
    require_once("templates/footer.php");
?>