
<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");?>

<?php 
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/MovieDAO.php");
    require_once("models/Message.php");

    $movieDao = new MovieDAO($conn, $BASE_URL);

    $userData = $userDao->verifyToken();


    $title = filter_input(INPUT_POST, "search");

    if(!$title==""){
        $movies = $movieDao->findMoviesByTitleName($title);
    }
    
?>


<div>
<h3>Resultados da Busca</h3>
    <p class="category-description">Aqui estão todos os filmes que contém <strong> "<?=$title?>" </strong> </p>
    <div class="movies-view-container">
        <?php foreach($movies as $movie):?>
            <div class="movie-container" style="margin-bottom:50px;">
                <img class="movie-img" src="<?=$BASE_URL?>img/movies/<?=$movie->image?>" alt="" srcset="">
                <div class="movie-info">
                    <div class="rating">
                    
                    <span>7</span>
                    <i class="fa-solid fa-star" style="color: #e4f312;"></i>
                    
                    </div>
                    <div class="details">
                        <p class="movie-title"><?=$movie->title?></p>
                    </div>
                    <div class="movie-btn-container">
                        <a href="<?=$BASE_URL?>moviereview.php?id=<?=$movie->id?>" class="movie-btn movie-btn-solid">Avaliar</a>
                        
                        <a href="#" class="movie-btn movie-btn-solid">Conhecer</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>



<?php include_once("templates/footer.php")?>



