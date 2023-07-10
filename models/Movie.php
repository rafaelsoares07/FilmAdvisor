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

        function convertYouTubeURL($url) {
            $parsedURL = parse_url($url);
            print_r($parsedURL);
            parse_str($parsedURL['query'], $query);
            print_r($query);
            if (isset($query['v'])) {
                $videoID = $query['v'];
                echo $videoID;
                $embedURL = "https://www.youtube.com/embed/" . $videoID;
                return $embedURL;
            }
        
            return $url;
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