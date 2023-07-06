<?php 
require_once("globals.php");
require_once("models/User.php");
require_once("db.php");
require_once("dao/UserDAO.php");
require_once("models/Message.php");

$message = new Message($BASE_URL);

$userDao = new UserDAO($conn, $BASE_URL);

//Resgata tipo do formulário que mando a requisição
$type = filter_input(INPUT_POST, "type");


//Verificação do tipo do formulário
if($type === "register"){

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmPassword = filter_input(INPUT_POST, "confirmPassword");

    

    if($name && $lastname && $email && $password && $confirmPassword ){

        if($password === $confirmPassword){
            
            if($userDao->findByEmail($email)===false){// false quer dizer que nao retornou nenhum usuario
                $user = new User();

                //Criação de token e senha
                $userToken = $user->generateToken();
                $finalPassword = $user->generatePassword($password);

                $user->name = $name;
                $user->lastname = $lastname;
                $user->email = $email;
                $user->password = $finalPassword;
                $user->token = $userToken;

                $userDao->create($user, true);
            

            }else{
                $message->setMessage("Usuário já possui cadastro", "msg-error","back");
                
            }

        }else{
            $message->setMessage("As senhas digitadas não são iguais", "msg-error","back");
        }

    }else{
        //Envair uma mensagem de erro caso o usuario nao tenha digitado os campos obrigatorios

        $message->setMessage("Porfavor digite todos os campos", "msg-error","back");
    }

}
else if($type==="login"){

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    
    //tenta autenticar usuario

    if($userDao->authenticateUser($email, $password)){
    
        $message->setMessage("Seja bem vindo deu certo a autenticacao","msg-sucess", "editprofile.php");
    }
    else{
        $message->setMessage("Usuário ou senha incorretos","msg-error", "back");
    }

    
}

?>