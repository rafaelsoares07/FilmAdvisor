<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");
require_once("dao/MovieDAO.php");



$movieDao = new MovieDAO($conn, $BASE_URL);


$movie = $movieDao->findByMovieId($_GET['id']);



?>


<?php include_once("templates/header.php")?>

<div id="main-container" class="container-fluid">

<div class="dashboard-container">
    <div class="dashboard-info">
    <img src="<?=$BASE_URL?>img/movies/<?=$movie->image?>" alt="" srcset="" style="margin-rigth:10px;">

        <div class="dashboard-text">
            <h1><?=$movie->title?></h1>
            <p><strong>Descrição:</strong>  <?=$movie->description?></p>

            <div class="area-stars">
                <p><strong>Duração:</strong> <?=$movie->length?> min</p>
                <div>
                <i class="fa-solid fa-star" style="color: #e4f312;"></i>
                <i class="fa-solid fa-star" style="color: #e4f312;"></i>
                <i class="fa-solid fa-star" style="color: #e4f312;"></i>
                <i class="fa-solid fa-star" style="color: #e4f312;"></i>
                <i class="fa-solid fa-star" style="color: #e4f312;"></i>
                </div>
            </div>

        </div>

    </div>

    <div>
        <iframe width="420" height="315"
            src="<?=$movie->trailer?>">
        </iframe>
    </div>
</div>





</div>

<?php include_once("templates/footer.php")?>




