<?php 
    
    class User{
        public $id;
        public $name;
        public $lastname;
        public $email;
        public $password;
        public $image;
        public $bio;
        public $token;

        public function generateToken(){
            return bin2hex(random_bytes(50));
        }

        public function generatePassword($password){
            return password_hash($password, PASSWORD_DEFAULT);
        }


        /*public function __construct($id, $name, $lastname, $email, $password, $image, $bio, $token) {
            $this->id = $id;
            $this->name = $name;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->password = $password;
            $this->image = $image;
            $this->bio = $bio;
            $this->token = $token;
        } como fazer um cosntruct com parametros opcionais??*/

    }

    interface UserDAOInterface{
        public function buildUser($data);
        public function create(User $user, $authUser = false);
        public function update(User $user, $redirect = true);
        public function verifyToken($protected = false);
        public function setTokenToSession($token, $redirect = true);
        public function authenticateUser($email, $password);
        public function findByEmail($email);
        public function findById($id);
        public function findByToken($token);
        public function destroyToken();
        public function changePassword(User $user);

    }
?>