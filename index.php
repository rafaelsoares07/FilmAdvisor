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

    <h3>Lançamentos</h3>
    <p class="category-description">Aqui estão os ultimos filmes lançados</p>
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

    <?php if(!empty($movies_acao)):?>
    <h3>Filmes de Ação</h3>
    <p class="category-description">Aqui você encontra tudo em dose dupla</p>
    <div class="movies-view-container">
        <?php foreach($movies_acao as $movie):?>
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

    <?php if(!empty($movies_comedia)):?>
    <h3>Para Rir Muito</h3>
    <p class="category-description">Aqui você encontra tudo em dose dupla</p>
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
    <h3>Medo e pipoca</h3>
    <p class="category-description">Aqui você encontra tudo em dose dupla</p>
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
    <h3>Para chorar junto com o protagoonista</h3>
    <p class="category-description">Aqui você encontra tudo em dose dupla</p>
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
    <?php endif;?>

    <?php if(!empty($movies_musical)):?>
    <h3>Para soltar a voz</h3>
    <p class="category-description">Aqui você encontra tudo em dose dupla</p>
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
    <h3>Para se Apaixonar</h3>
    <p class="category-description">Aqui você encontra tudo em dose dupla</p>
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




