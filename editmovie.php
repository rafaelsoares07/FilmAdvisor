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


<div>
    <h1>edit</h1>
</div>



<?php include_once("templates/footer.php")?>
