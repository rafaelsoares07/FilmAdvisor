<!-- Meta Dados HTML-->
<?php 
require_once("meta-html.php");
require_once("templates/header.php");


$userData = $userDao->verifyToken(false);
print_r($userData);



?>

<p>Edição de perfil</p>
<?php include_once("templates/footer.php")?>
