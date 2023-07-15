<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");
require_once("dao/MovieDAO.php");
require_once("dao/ReviewDAO.php");


$movieDao = new MovieDAO($conn, $BASE_URL);
$reviewDao = new ReviewDAO($conn, $BASE_URL);

$movie = $movieDao->findByMovieId($_GET['id']);
$reviewsMovie = $reviewDao->findAllReviewsByMovieId($_GET['id']);




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
                    <?php if(!is_string($movie->rating)):?>

                        <?php for ($i = 0; $i <= $movie->rating-1; $i++): ?>
                            <i class="fa-solid fa-star" style="color: #e4f312;"></i>
                        <?php endfor; ?>

                        <?php for ($i = $movie->rating; $i <= 4; $i++): ?>
                            <i class="fa-solid fa-star" style="color: #8a8e93;"></i>
                        <?php endfor; ?>

                    <?php else: ?>
                        <br>
                        <span>Sem Avaliações</span>

                    <?php endif; ?>
                    
                </div>
            </div>

        </div>
    </div>
    <div class="div-trailer">
        <iframe class="video-trailer" width="560" height="315" src="<?=$movie->trailer?>">
    </iframe>
    </div>
</div>



<div class="dashboard-review">

    <form action="review_process.php" method="POST">
        <input type="hidden" name="type" value="create">
        <input type="hidden" name="movie_id" value="<?=$movie->id?>">
        <label for="rating" class="label-description">Coloque sua Avaliação</label>
        <select name="rating" id="rating" class="h-select">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="review" class="label-description">Escreva sobre o Filme</label>
        <textarea name="review" id="review" rows="5"></textarea>
        
        <input class="card-btn" type="submit" value="Enviar Avaliação">
    </form>
</div>


<div class="reviews-users">

    <?php if(!empty($reviewsMovie)):?>
        
        <?php foreach($reviewsMovie as $review):?>
            <div class="review-container">

                <div class="review-infos">
                    <a href="<?=$BASE_URL?>profile.php?id=<?=$review->user->id?>">
                        <div id="profile-image-movies" style="background-image: url(<?= $BASE_URL ?>img/users/<?=$review->user->image?>)">
                        </div>
                    </a>
                    <div>
                        <span><?=$review->user->name?></span>
                        <br>
                        <span><?=$review->rating?><i class="fa-solid fa-star" style="color: #e4f312;"></i></span>
                    </div>
                </div>

                <div>
                    
                    <p> 
                        <i style="font-size:10px;" class="fa-solid fa-quote-left"></i>
                        <?=$review->review?>
                        <i  style="font-size:10px;" class="fa-solid fa-quote-right"></i>
                    </p>
                
                </div>
                
            </div>
            
        <?php endforeach ;?>

    <?php else: ?>
            <p>Ainda não foram feitas nenhuma avaliação para este filme...</p>
    <?php endif ;?>

</div>




</div>

<?php include_once("templates/footer.php")?>




