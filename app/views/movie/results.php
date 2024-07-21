<?php if($_SESSION['username'] == "Admin"){
    require_once 'app/views/templates/headerAdmin.php';
}else if(isset($_SESSION['auth'])){
    require_once 'app/views/templates/header.php';
}else{
    require_once 'app/views/templates/headerPublic.php';
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['movie']['Title']; ?> (<?php echo $data['movie']['Year']; ?>)</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
        }
        .details {
            margin-bottom: 20px;
        }
        .ratings {
            margin-top: 20px;
        }
        .rating-item {
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #ff69b4; /* Pink */
            border: none;
        }
        .btn-primary:hover {
            background-color: #ff1493; /* Darker Pink */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/movie/index" class="btn btn-primary mb-3">Back to search</a>
        <?php if(isset($_SESSION['rate_success'])){?>
            <p>
                <?php echo "<p>". htmlspecialchars($_SESSION['rate_success'])."</p>"; ?>
                <?php unset($_SESSION['rate_success']); ?>
            </p>
            
        <?php } ?>
        <h1><?php echo $data['movie']['Title']; ?> (<?php echo $data['movie']['Year']; ?>)</h1>
        <img src="<?php echo $data['movie']['Poster']; ?>" alt="<?php echo $data['movie']['Title']; ?> Poster">
        
        <?php if (!isset($_SESSION['reviewFlag'])) { ?>
            <form action="/movie/get_review" method="post">
                <div class="btn-group btn-group-custom" role="group" aria-label="Basic example">
                    <button type="submit" class="btn btn-primary">Get a critic's review </button>
                </div>
            </form>
        <?php } ?>

        <?php if (isset($_SESSION['reviewFlag'])) { 
            echo "<p>" . htmlspecialchars($_SESSION['review']) . "</p>";
        } ?>

        <?php if (isset($_SESSION['auth'])) { ?>
            <form action="/movie/rate" method="post" class="mb-3">
                <div class="btn-group btn-group-custom" role="group" aria-label="Basic example">
                    Rate This Movie:  
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <input type="hidden" name="rating" value="<?php echo $i; ?>">
                        <button type="submit" class="btn btn-primary"><?php echo $i; ?></button>
                    <?php } ?>
                </div>
            </form>
        <?php } ?>
        
        <div class="details">
            <h2>Movie Details</h2>
            <p><strong>Rated:</strong> <?php echo $data['movie']['Rated']; ?></p>
            <p><strong>Released:</strong> <?php echo $data['movie']['Released']; ?></p>
            <p><strong>Runtime:</strong> <?php echo $data['movie']['Runtime']; ?></p>
            <p><strong>Genre:</strong> <?php echo $data['movie']['Genre']; ?></p>
            <p><strong>Director:</strong> <?php echo $data['movie']['Director']; ?></p>
            <p><strong>Writer:</strong> <?php echo $data['movie']['Writer']; ?></p>
            <p><strong>Actors:</strong> <?php echo $data['movie']['Actors']; ?></p>
            <p><strong>Plot:</strong> <?php echo $data['movie']['Plot']; ?></p>
            <p><strong>Language:</strong> <?php echo $data['movie']['Language']; ?></p>
            <p><strong>Country:</strong> <?php echo $data['movie']['Country']; ?></p>
            <p><strong>Awards:</strong> <?php echo $data['movie']['Awards']; ?></p>
        </div>

        <div class="ratings">
            <h2>Ratings</h2>
            <?php foreach ($movie['Ratings'] as $rating): ?>
                <div class="rating-item">
                    <p><strong><?php echo $rating['Source']; ?>:</strong> <?php echo $rating['Value']; ?></p>
                </div>
            <?php endforeach; ?>
            <p><strong>Metascore:</strong> <?php echo $data['movie']['Metascore']; ?></p>
            <p><strong>IMDB Rating:</strong> <?php echo $data['movie']['imdbRating']; ?></p>
            <p><strong>IMDB Votes:</strong> <?php echo $data['movie']['imdbVotes']; ?></p>
        </div>

        <p><strong>IMDB ID:</strong> <?php echo $data['movie']['imdbID']; ?></p>
        <p><strong>Type:</strong> <?php echo $data['movie']['Type']; ?></p>
        <p><strong>DVD:</strong> <?php echo $data['movie']['DVD']; ?></p>
        <p><strong>Box Office:</strong> <?php echo $data['movie']['BoxOffice']; ?></p>
        <p><strong>Production:</strong> <?php echo $data['movie']['Production']; ?></p>
        <p><strong>Website:</strong> <?php echo $data['movie']['Website']; ?></p>
    </div>
</body>
</html>
