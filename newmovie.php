<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");?>

<?php 
    require_once("templates/header.php");
    require_once("models/User.php");
    
    $userData = $userDao->verifyToken(true); // true fala que a rota é protegida e precisa se autenticar para acessar!!
    



?>

<div id="main-container" class="container-fluid">
    <div class="col-md-12 ">
        <form action="<?=$BASE_URL?>movie_process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="type" value="create"> <!--Indicar a ação desse form-->
            <h1 >Cadastrar Novo Filme</h1>
            <div class="row">
                <div class="col-md-7 ">
                    
                    <div class="form-group" >
                        <label for="name" class="label-description">Título</label>
                        <input class="form-control" type="text" name="title" id="title" value="">
                    </div>

                    <div class="form-group">
                        <label for="description" class="label-description">Fale um pouco sobre o filme</label>
                        <textarea id="movie-description" name="description" id="description" rows="4"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="image" class="label-description">Imagem do filme:</label>
                        <br>
                        <input class="form-control-file" type="file" name="image" id="image">
                    </div>

                    <input class="card-btn" type="submit" value="Cadastrar Filme">
                </div>
                <div class="col-md-4 ">

                    <div class="form-group">
                        <label for="name" class="label-description">Trailer</label>
                        <input class="form-control" type="text" name="trailer" id="trailer" value="">
                    </div>

                    <div class="form-group">
                        <label for="lenth">Duração</label>
                        <input class="range-input" id="pi_input" type="range" min="0" max="200" step="1" name="length" />
                        <p><output id="value-range"></output> min</p>
                    </div>

                    <div class="form-group">
                        <label for="category" class="label-description">Categorias</label>
                        <br>
                        <select id="select-category" name="category">
                            <option value="Ação">Ação</option>
                            <option value="Comédia">Comédia</option>
                            <option value="Drama">Drama</option>
                            <option value="Terror">Terror</option>
                            <option value="Animação">Animação</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Drama">Drama</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção">Ficção Científica</option>
                            <option value="Musical">Musical</option>
                            <option value="Romance">Romance</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Documentário">Documentário</option>
                        </select>
                    </div>
                </div> 

            </div>
     </div>
        </form>
    </div>
</div>



<?php include_once("templates/footer.php")?>
