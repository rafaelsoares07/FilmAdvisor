<!-- Meta Dados HTML-->
<?php require_once("meta-html.php")?>

<?php include_once("templates/header.php")?>

<div id="main-container" class="container-fluid" >
    <div class="col-md-12">
        <div class="row" id="auth-row">
            <div class="col-md-4" id="login-container">
                <h2 class="title-form-auth">Entrar</h2>
                <hr class="line-divisor">
                <form action="<?=$BASE_URL?>auth_process.php" method="POST">
                <input type="hidden" name="type" value="login">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Digite seu email" require>
                    </div>
                    <div class="form-group">
                        <label for="email">Senha:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha" require>
                    </div>
                    <input type="submit" class="btn card-btn" value="Entrar">
                </form>
            </div>
            <div class="col-md-4" id="register-container">
                <h2 class="title-form-auth">Registrar</h2>
                <hr class="line-divisor">
                <form action="<?=$BASE_URL?>auth_process.php" method="POST">
                    <input type="hidden" name="type" value="register">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome" require>
                    </div>
                    <div class="form-group">
                        <label for="name">Sobrenome:</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Digite seu sobrenome" require>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" require>
                    </div>
                    <div class="form-group">
                        <label for="email">Senha:</label>
                        <input type="password" class="form-control" name="password" id="email" placeholder="Digite sua senha" require>
                    </div>
                    <div class="form-group">
                        <label for="email">Confirmação de senha:</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Digite novamente sua senha" require>
                    </div>
                    <input type="submit" class="btn card-btn" value="Cadastrar">
                </form>
            </div>


        </div>
    </div>
</div>
<?php include_once("templates/footer.php")?>


