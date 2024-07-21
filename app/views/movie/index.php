<?php if($_SESSION['username'] == "Admin"){
    require_once 'app/views/templates/headerAdmin.php';
}else{
    require_once 'app/views/templates/header.php';
}?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>What movie are you looking for?</h1>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-sm-auto">
    <form action="/movie/search" method="post" >
    <fieldset>
      <div class="form-group">
        <label for="movie"></label>
        <input required type="text" class="form-control" name="movie" id="movie" placeholder="Search for a movie...">
      </div>
            <br>
        <button type="submit" class="btn btn-primary">Search</button>
    </fieldset>
    </form> 
  </div>
</div>
  <br>
    <?php require_once 'app/views/templates/footer.php' ?>
