<?php

class Movie extends Controller{
  

  public function index(){
    $this -> view('movie/index');
    unset($_SESSION['reviewFlag']);
  }

  public function search(){
    if(!isset($_REQUEST['movie'])){
      // if movie is blank redirect to /movie
      unset($_SESSION['reviewFlag']);
      header('location: /movie');
    }
  
    $api = $this -> model('Api');
    
    $movie_title = $_REQUEST['movie'];
    $_SESSION['movie_title'] = $movie_title;
    $movie_title = urlencode($movie_title);
    $movie = $api -> search_movie($movie_title);
    

    
    $this -> view('movie/results', ['movie' => $movie]);

    
    
  }

  public function rate($movie_title = '', $rating= ''){
    // if rating isnt 1,2,3,4,5... etc.
    $api = $this -> model('Api');

    $movie_title = $_SESSION['movie_title'];
    $movie_title = urlencode($movie_title);
    $rating = $_REQUEST['rating'];

    $review = $api -> give_rating($movie_title, $rating);

    $movie = $api -> search_movie($movie_title);
    $this -> view('movie/results', ['movie' => $movie,'review' => $review]);
    
  }

  public function get_review($movie_title = ''){
    $api = $this -> model('Api');
    $_SESSION['reviewFlag'] = 1;

    
    $movie_title = $_SESSION['movie_title'];
    
    $movie_encoded = urlencode($movie_title);
    
    $movie_title = $api -> get_movie_reviews($movie_title);
    
    
    $movie = $api -> search_movie($movie_encoded);
    $this -> view('movie/results', ['movie' => $movie]);
      
    }
  
}




?>