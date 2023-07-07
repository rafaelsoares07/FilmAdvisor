<?php 
    require_once("globals.php");
    require_once("models/User.php");
    require_once("db.php");
    require_once("dao/UserDAO.php");
    require_once("models/Message.php");
    require_once("models/User.php");

    $user = new User();

    $message = new Message($BASE_URL);

    $userDao = new UserDAO($conn, $BASE_URL);

    //Resgata tipo do formulário que mando a requisição
    $type = filter_input(INPUT_POST, "type");

    if($type==="update"){
        //resgata dados do usuario pelo token da sua sessao
        $userData = $userDao->verifyToken();
        //print_r($userData);

        //receber dados do post
        $name = filter_input(INPUT_POST, "name");
        $lastname = filter_input(INPUT_POST, "lastname");
        $email = filter_input(INPUT_POST, "email");
        $bio = filter_input(INPUT_POST, "bio");

        $userData->name = $name;
        $userData->lastname = $lastname;
        $userData->email= $email;
        $userData->bio = $bio;

        //Upload Image
        if(isset($_FILES['image']) && !empty($_FILES["image"]["tmp_name"])){
            $image = $_FILES['image'];
            print_r($image);

            $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
            $jpgArray = ["image/jpeg", "image/jpg"];
            //checar tipo de image

            if(in_array($image["type"], $imageTypes)){
                if(in_array($image['type'], $jpgArray)){
                    $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                    echo "enviou um jpg";
                }else{
                    $imageFile = imagecreatefrompng($image["tmp_name"]);
                    echo "enviou um png";
                }

                $imageName = $user->imageGenerateName();

                imagejpeg($imageFile, "./img/users/" . $imageName, 100);

                $userData->image = $imageName;
            }else{
                $message->setMessage("Tipo da imagem não suportado", "msg-error", 'back');
            }
        }

        //atualizar usuario
        
        $userDao->update($userData);
       


    }else if($type==="changepassword"){

    }
    else{
        $message->setMessage("User malicioso", "msg-error", 'index.php');
    }


?>