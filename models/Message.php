<?php 

    class Message{
        private $url;

        public function __construct($url){
            $this->url = $url; //serve para redirecionar o usuario do dite
        }

        //funcao para setar uma mensagem
        public function setMessage($msg, $type, $redirect="index.php"){
            //nos parametros do metodo iremos receber a mesage, o tipo (sucesso ou ero) e para onde devemos redirecinar o usuario e nao expecificar nada ele ira para o index.php

            $_SESSION['msg'] = $msg;
            $_SESSION['type'] = $type;

            if($redirect !="back"){ // se for diferente da pagina anterior
                header("Location: $this->url".$redirect);
            }
            else{
                header("Location:" .$_SERVER["HTTP_REFERER"]);
            }

        }

        //funcao para mostar a imagem
        public function getMessage(){
            if(!empty($_SESSION["msg"])){
                return[
                    "msg"=>$_SESSION["msg"],
                    "type"=>$_SESSION["type"]
                ];
            }else{
                return false;
            }
        }

        //funcao para limpar a mensgem da tela se nao mesmo dando f5 ela nao vai sair da tela
        function clearMessage(){
            $_SESSION["msg"]="";
            $_SESSION["type"]="";
        }
    }
?>