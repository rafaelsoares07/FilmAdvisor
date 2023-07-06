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

    print_r($userData);


?>

<body>
<header>
    <nav class="navbar navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Nome do filme" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
            <?php if($userData):?>
                <a href="<?=$BASE_URL?>newmovie.php" class="link-secondary">Incluir Filme</a>
                <a href="<?=$BASE_URL?>dashboard.php" class="link-secondary">Meus Filmes</a>
                <a href="<?=$BASE_URL?>editprofile.php" class="link-secondary"><?=$userData->name?></a>
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
