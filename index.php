<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");
require_once("dao/MovieDAO.php");



$movieDao = new MovieDAO($conn, $BASE_URL);

$movies = $movieDao->findAll();

$movies_acao = $movieDao->findByCategory("Ação");
$movies_comedia = $movieDao->findByCategory("Comédia");
$movies_terror = $movieDao->findByCategory("Terror");
$movies_drama = $movieDao->findByCategory("Drama");
$movies_musical = $movieDao->findByCategory("Musical");
$movies_romance = $movieDao->findByCategory("Romance");


?>


<?php include_once("templates/header.php")?>

<div id="main-container" class="container-fluid">

    <h3>Últimos Lançamentos</h3>
    <p class="category-description">Aqui estão os ultimos filmes lançados</p>
    <div class="movies-view-container">
        <?php foreach($movies as $movie):?>
            <div class="movie-container" style="margin-bottom:50px;">
                <img class="movie-img" src="<?=$BASE_URL?>img/movies/<?=$movie->image?>" alt="" srcset="">
                <div class="movie-info">

                    <div class="rating">
                    
                        <?php if(!is_string($movie->rating)):?>

                            <?php for ($i = 0; $i <= $movie->rating-1; $i++): ?>
                                <i class="fa-solid fa-star banner-starts" style="color: #e4f312;"></i>
                            <?php endfor; ?>

                            <?php else: ?>
                            Avalie

                        <?php endif; ?>
                    
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

    <?php if(!empty($movies_acao)):?>
    <h3>Filmes de Ação</h3>
    <p class="category-description">Aqui você encontra tudo em dose dupla</p>
    <div class="movies-view-container">
        <?php foreach($movies_acao as $movie):?>
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
                        <a href="<?=$BASE_URL?>moviereview.php?id=<?=$movie->id?>" class="movie-btn movie-btn-solid">Avaliar</a>
                        
                        <a href="<?=$BASE_URL?>moviereview.php?id=<?=$movie->id?>" class="movie-btn movie-btn-solid">Conhecer</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <?php endif;?>

    <?php if(!empty($movies_comedia)):?>
    <h3>Filmes de Comédia</h3>
    <p class="category-description">Aqui você vai gargalhar!</p>
    <div class="movies-view-container">
        <?php foreach($movies_comedia as $movie):?>
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
    <?php endif;?>

    <?php if(!empty($movies_terror)):?>
    <h3>Filmes de Terror</h3>
    <p class="category-description">Aqui é onde você fica com medo!</p>
    <div class="movies-view-container">
        <?php foreach($movies_terror as $movie):?>
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
    <?php endif;?>

    <?php if(!empty($movies_drama)):?>
    <h3>Filmes de Drama</h3>
    <p class="category-description">Aqui você chora junto com o protagonista</p>
    <div class="movies-view-container">
        <?php foreach($movies_drama as $movie):?>
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
    <?php endif;?>

    <?php if(!empty($movies_musical)):?>
    <h3>Filmes Musicais</h3>
    <p class="category-description">Aqui você canta e dança</p>
    <div class="movies-view-container">
        <?php foreach($movies_musical as $movie):?>
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
    <?php endif;?>

    <?php if(!empty($movies_romance)):?>
    <h3>Filmes de Romance</h3>
    <p class="category-description">Aqui você se apaixona por lindas histórias</p>
    <div class="movies-view-container">
        <?php foreach($movies_romance as $movie):?>
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
    <?php endif;?>

    

</div>

<?php include_once("templates/footer.php")?>




