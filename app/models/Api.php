<?php

class Api {

    public function __construct() {

    }

    public function search_movie ($movie_title) {
      
      $query_url = "http://www.omdbapi.com/?apikey=".$_ENV['omdb_key']."&t=" . $movie_title;

      
      $json = file_get_contents($query_url);
      
      $phpObj = json_decode($json);
      
      $movie =  (array) $phpObj;
      return $movie;
    }

    public function get_movie_reviews ($movie_title){

      $movieTBR = $this -> search_movie($movie_title);

      $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=".$_ENV['GEMINI'];

      $data = array(
          "contents" => array(
              array(
                  "role" => "user",
                  "parts" => array(
                      array(
                          "text" => 'Please give a review of '.$movieTBR .'from someone that has an average of 4 out of 5.'
                      )
                  )
              )
          )
      );

      $json_data = json_encode($data);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);
      curl_close($ch);
      if(curl_errno($ch)) {
           echo 'Curl error: ' . curl_error($ch);
      }
      $review = "";
      $_SESSION['review'] = $response;
    }

    public function give_rating( $movie_title, $rating){
        $db = db_connect();
        if(isset($_SESSION['auth']))  {
            $userid = $_SESSION['userid'];
            $statement =$db -> prepare("INSERT INTO ratings (movie_title, rating, ratings_user_id) VALUES ('$movie_title', '$rating','$userid')");
            $statement->execute();
            header ('Location /movie');
        }
        else{
            
        }
       
        
    }
}
