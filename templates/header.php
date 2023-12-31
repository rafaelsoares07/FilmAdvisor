<?php 
    require_once("globals.php");
    require_once("db.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");
    $message = new Message($BASE_URL);

    $flashMessage = $message->getMessage();

    if(!empty($flashMessage["msg"])){
        $message->clearMessage();
    }

    $userDao = new UserDAO($conn, $BASE_URL);

    $userData = $userDao->verifyToken(false);

?>

<body>
<header>
    <nav class="navbar navbar-light">
        <div class="container-fluid header-container">
            <a class="navbar-brand" href="<?=$BASE_URL?>index.php">
                <img src="<?=$BASE_URL?>img/logo.png" alt="">
            </a>
            <form class="d-flex" action="movieseach.php" method="POST">
                <input class="form-control me-2 input-busca" type="text" name="search" placeholder="Nome do filme" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
            <?php if($userData):?>
                <a href="<?=$BASE_URL?>newmovie.php" class="link-secondary">Incluir Filme</a>
                <a href="<?=$BASE_URL?>dashboard.php" class="link-secondary">Meus Filmes</a>
                <a href="<?=$BASE_URL?>editprofile.php" class="link-secondary">Perfil</a>
                <a href="<?=$BASE_URL?>logout.php" class="link-secondary">Sair</a>
            <?php else:?>
                <a href="<?=$BASE_URL?>auth.php" class="link-secondary">Entar/Cadastrar</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<?php if(!empty($flashMessage['msg'])):?>
    <div class="msg-container <?=$flashMessage["type"]?>">
        <span class="msg"><?=$flashMessage['msg']?></span>
    </div>
<?php endif;?>
