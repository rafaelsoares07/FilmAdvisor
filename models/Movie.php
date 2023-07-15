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
        
            // Verifique se a chave 'query' existe no array antes de acessá-la
            if (isset($parsedURL['query'])) {
                parse_str($parsedURL['query'], $query);
        
                // Verifique se a chave 'v' existe no array antes de acessá-la
                if (isset($query['v'])) {
                    $videoID = $query['v'];
                    $embedURL = "https://www.youtube.com/embed/" . $videoID;
                    return $embedURL;
                } else {
                    return $parsedURL['query'];
                }
            } else {
                return $url;
            }
        }
        
    }

    interface MovieDAOInterface{
        
        public function buildMovie($data);
        public function findAll();
        public function create(Movie $movie);
        public function findByUserId($id);
        public function findByMovieId($id);
        public function updateMovie(Movie $movie);

    }

?>