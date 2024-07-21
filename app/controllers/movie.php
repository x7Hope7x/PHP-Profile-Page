<?php

class Movie extends Controller{
  

  public function index(){
    $this -> view('movie/index');
  }

  public function search(){
    if(!isset($_REQUEST['movie'])){
      // if movie is blank redirect to /movie
      header('location: /movie');
    }
  
    $api = $this -> model('Api');
    
    $movie_title = $_REQUEST['movie'];
    $_SESSION['movie_title'] = $movie_title;
    $movie_title = urlencode($movie_title);
    $movie = $api -> search_movie($movie_title);
    

    
    
    $this -> view('movie/results', ['movie' => $movie]);

    // COSC Project
    //   movie [search....]
    // Search button

    // barbie rating : [1 , 2, 3, 4, 5] a href="/movie/review/barbie/1"
    
  }

  public function review($movie_title = '', $rating= ''){
    // if rating isnt 1,2,3,4,5... etc.
    $api = $this -> model('Api');

    $movie_title = $_SESSION['movie_title'];
    $movie_title = urlencode($movie_title);
    $rating = $_REQUEST['rating'];

    $review = $api -> give_rating($movie_title, $rating);

    $this -> view('movie/results', ['review' => $review]);
    
  }
}



?>