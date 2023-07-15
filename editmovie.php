<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");?>

<?php 
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/MovieDAO.php");

    $movie_image = true;

    $message = new Message($BASE_URL);

    $movieDao = new MovieDAO($conn, $BASE_URL);

    $userData = $userDao->verifyToken(true);
    $user = new User($userData);
    
    $movie_id = filter_input(INPUT_POST, "id");

    $movie = $movieDao->findByMovieId($movie_id);

    
    if(empty($movie)){
        $message->setMessage("Não existe esse filme", "msg-error", "back");
    }
    elseif($movie->users_id != $userData->id){
        $message->setMessage("Você não tem permissão para modificar esse filme", "msg-error", "back");
    }
    else{
        if(empty($movie->image)){
            $movie->image = "movie_cover.jpg";
            $movie_image=false;
        }
    }
    
?>


<div id="main-container" class="container-fluid">
    <h2>Edição de Filme</h2>
    <div class="col-md-12 ">
        <form action="<?=$BASE_URL?>movie_process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$movie->id?>">
            <input type="hidden" name="type" value="update"> <!--Indicar a ação desse form-->
            <div class="row">
                <div class="col-md-7 ">
                    
                    <div class="form-group" >
                        <label for="name" class="label-description">Título</label>
                        <input class="form-control" type="text" name="title" id="title" value="<?=$movie->title?>">
                    </div>

                    <div class="form-group">
                        <label for="description" class="label-description">Fale um pouco sobre o filme</label>
                        <textarea id="movie-description" name="description" id="description" rows="4"><?=$movie->description?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="image" class="label-description">Imagem do filme:<?= $movie_image ? '<span class="have_image"> Já possui imagem cadastrada</span>' : '<span class="nohave_image"> Não possui nenhuma imagem cadastrada</span>' ?></label>
                        <br>
                        <input class="form-control-file" type="file" name="image" id="image" >
                    </div>

                    <input class="card-btn" type="submit" value="Atualizar Filme">
                </div>
                <div class="col-md-4 ">

                    <div class="form-group">
                        <label for="name" class="label-description">Trailer</label>
                        <input class="form-control" type="text" name="trailer" id="trailer" value="<?=$movie->trailer?>">
                    </div>

                    <div class="form-group">
                        <label for="lenth">Duração</label>
                        <input class="range-input" id="pi_input" type="range" min="0" max="200" step="1" name="length" value="<?=$movie->length?>"/>
                        <p><output id="value-range"></output> min</p>
                    </div>

                    <div class="form-group">
                        <label for="category" class="label-description">Categorias</label>
                        <br>
                        <select id="select-category" name="category" value="<?=$movie->category?>">
                            <option value="Ação" <?= ($movie->category === 'Ação') ? 'selected' : '' ?>>Ação</option>
                            <option value="Comédia" <?= ($movie->category === 'Comédia') ? 'selected' : '' ?>>Comédia</option>
                            <option value="Drama" <?= ($movie->category === 'Drama') ? 'selected' : '' ?>>Drama</option>
                            <option value="Terror" <?= ($movie->category === 'Terror') ? 'selected' : '' ?>>Terror</option>
                            <option value="Animação" <?= ($movie->category === 'Animação') ? 'selected' : '' ?>>Animação</option>
                            <option value="Aventura" <?= ($movie->category === 'Aventura') ? 'selected' : '' ?>>Aventura</option>
                            <option value="Fantasia" <?= ($movie->category === 'Fantasia') ? 'selected' : '' ?>>Fantasia</option>
                            <option value="Ficção" <?= ($movie->category === 'Ficção') ? 'selected' : '' ?>>Ficção Científica</option>
                            <option value="Musical" <?= ($movie->category === 'Musical') ? 'selected' : '' ?>>Musical</option>
                            <option value="Romance" <?= ($movie->category === 'Romance') ? 'selected' : '' ?>>Romance</option>
                            <option value="Thriller" <?= ($movie->category === 'Thriller') ? 'selected' : '' ?>>Thriller</option>
                            <option value="Documentário" <?= ($movie->category === 'Documentário') ? 'selected' : '' ?>>Documentário</option>
                        </select>
                    </div>
                </div> 

            </div>
     </div>
        </form>
    </div>
</div>



<?php include_once("templates/footer.php")?>
