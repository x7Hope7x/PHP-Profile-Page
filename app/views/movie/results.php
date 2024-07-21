<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['movie']['Title']; ?> (<?php echo $data['movie']['Year']; ?>)</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $data['movie']['Title']; ?> (<?php echo $data['movie']['Year']; ?>)</h1>
        <img src="<?php echo $data['movie']['Poster']; ?>" alt="<?php echo $data['movie']['Title']; ?> Poster">

        <form action="/movie/review" method="post">
        <div class="btn-group btn-group-custom" role="group" aria-label="Basic example">
            Rate This Movie:
            <input type="hidden" name="rating" value="1">
            <button type="submit" class="btn">1</button>
        </form>  
        
        <form action="/movie/review" method="post">
            <input type="hidden" name="rating" value="2">
            <button type="submit" class="btn">2</button>
        </form>
        
        <form action="/movie/review" method="post">
            <input type="hidden" name="rating" value="3">
            <button type="submit" class="btn">3</button>
        </form>
            
        <form action="/movie/review" method="post">
            <input type="hidden" name="rating" value="4">
            <button type="submit" class="btn">4</button>
        </form>
            
        <form action="/movie/review" method="post">
            <input type="hidden" name="rating" value="5">
            <button type="submit" class="btn">5</button>
        </form>
            
        </div>
        </form>
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