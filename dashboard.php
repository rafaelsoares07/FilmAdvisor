<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");
require_once("dao/MovieDAO.php");
require_once("dao/UserDAO.php");

$userDao = new UserDAO($conn, $BASE_URL);
$userData = $userDao->verifyToken();


$movieDao = new MovieDAO($conn, $BASE_URL);

$movies = $movieDao->findByUserId($userData->id);


if($userData->image === null || !file_exists("img/users/" . $userData->image)){
        
    $userData->image = "user.png";
}

?>


<?php include_once("templates/header.php")?>

<div id="main-container-edit" class="container-fluid">

    <div class="section-dashboard-movies">
        <div>
            <h3>Seus Filmes</h3>
            <p class="category-description">Aqui estão todos os filmes que você cadastrou</p>
        </div>
        
        <a href="<?=$BASE_URL?>profile.php?id=<?=$userData->id?>">
            <div id="profile-image-movies" style="background-image: url(<?= $BASE_URL ?>img/users/<?=$userData->image?>)"></div>
        </a>

        

    </div>
    
   

    <div class="d-flex">
        <?php foreach($movies as $movie):?>
        
            <div class="movie-container" style="margin-bottom:50px;">
                <img class="movie-img" src="<?=$BASE_URL?>img/movies/<?=$movie->image?>" alt="" srcset="">
                <div class="movie-info">
                    <div class="rating">
                    
                    <span><?=$movie->rating?></span>
                    <i class="fa-solid fa-star" style="color: #e4f312;"></i>
                    
                    </div>
                    <div class="details">
                        <p class="movie-title"><?=$movie->title?></p>
                    </div>
                    <div class="movie-btn-container">
                       
                        <form action="<?=$BASE_URL?>editmovie.php" method="post">
                            <input type="hidden" name="type" value="edit">
                            <input type="hidden" name="id" value="<?=$movie->id?>">
                            <button type="submit" class="btn-bu">
                            <i class="fa-solid fa-pen-to-square icon"></i>
                            </button>
                        </form>

                        
                        <form action="<?=$BASE_URL?>movie_process.php" method="post">
                            <input type="hidden" name="type" value="delete">
                            <input type="hidden" name="id" value="<?=$movie->id?>">
                            <button type="submit" class="btn-bu">
                            <i class="fa-solid fa-trash icon"></i>
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
            
        <?php endforeach;?>
    </div>
    
    </div>



<?php include_once("templates/footer.php")?>


