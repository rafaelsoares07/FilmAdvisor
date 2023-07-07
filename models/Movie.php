<?php 

    class Movie{
        public $id;
        public $title;
        public $description;
        public $image;
        public $trailer;
        public $category;
        public $length;
        public $users_id;
    
        public function imageGenerateName(){
            return bin2hex(random_bytes(60)).".jpeg";
        }
    }

    interface MovieDAOInterface{
        
        public function buildMovie($data);
        public function findAll();
        public function create(Movie $movie);
        public function findByUserId($id);
        public function findByMovieId($id);

    }

?>