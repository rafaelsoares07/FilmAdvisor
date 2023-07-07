<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");?>

<?php 
    require_once("templates/header.php");
    require_once("models/User.php");
    
    $userData = $userDao->verifyToken(true);
    $user = new User($userData);
    
    $fullName = $user->getFullName($userData);

    if($userData->image === null || !file_exists("img/users/" . $userData->image)){
        
        $userData->image = "user.png";
    }

?>

<div id="main-container" class="container-fluid">
    <div class="col-md-12">
        <form action="<?=$BASE_URL?>user_process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="type" value="update"> <!--Indicar a ação desse form-->
            <div class="row">
                <div class="col-md-7">
                    <h1><?=$fullName?></h1>
                    <p class="page-description">Altere seus dados no formulário abaixo</p>
                    <div class="form-group" >
                        <label for="name">Nome:</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?=$userData->name?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Sobrenome</label>
                        <input class="form-control" type="text" name="lastname" id="lastname" value="<?=$userData->lastname?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input class="form-control disable" readonly type="text" name="email" id="email" value="<?=$userData->email?>">
                    </div>

                    <input class="card-btn" type="submit" value="Alterar">
                </div>
                <div class="col-md-5">
                    <div id="profile-image-container" style="background-image: url(<?= $BASE_URL ?>img/users/<?=$userData->image?>)">
                        
                    </div>
                    <div class="form-group">
                        
                        <input class="form-control-file" type="file" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="bio" class="label-description">Fale um pouco sobre você</label>
                        <textarea name="bio" id="bio" rows="4"><?=$userData->bio?></textarea>
                    </div>
                </div>
            </div>
        </form>
        <div class="row" id="change-password-container">
            <div class="col-md-4">
                <h2>Alterar senha</h2>
                <p class="page-description">Digite nova senha e confirme</p>
                <form action="<?=$BASE_URL?>user_process.php" method="post">
                    <input type="hidden" name="type" value="changepassword">
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Digite sua nova senha">
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword">Confirmação senha</label>
                        <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirme sua nova senha">
                    </div>
                    <input class="card-btn" type="submit" value="Alterar senha">
                </form>
            </div>
        </div>
    </div>
</div>




<?php include_once("templates/footer.php")?>
