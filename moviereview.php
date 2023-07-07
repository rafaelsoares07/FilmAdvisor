<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");
require_once("dao/MovieDAO.php");



$movieDao = new MovieDAO($conn, $BASE_URL);


$movie = $movieDao->findByMovieId($_GET['id']);



?>


<?php include_once("templates/header.php")?>

<div id="main-container" class="container-fluid">

<h1><?=$movie->title?></h1>
<img src="<?=$BASE_URL?>img/movies/<?=$movie->image?>" alt="" srcset="">


</div>

<?php include_once("templates/footer.php")?>




