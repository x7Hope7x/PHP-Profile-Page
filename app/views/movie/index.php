    <?php
    if (!isset($_SESSION['auth'])) {
        header('Location: /login');
        exit;
    }
    if ($_SESSION['username'] == "Admin") {
        require_once 'app/views/templates/headerAdmin.php';
    } else {
        require_once 'app/views/templates/header.php';
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Movie</title>
        <!-- Include Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f0f0f0;
            }
            .search-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 600px;
                margin-top: 100px; /* Space for the header */
                text-align: center;
            }
            .search-container h1 {
                margin-bottom: 20px;
                color: #ff69b4; /* Pink */
            }
            .search-container form {
                margin: 10px 0;
                font-family: Arial, sans-serif;
                font-size: 16px;
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
    <main role="main" class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="search-container">
            <h1>What movie are you looking for?</h1>
            <form action="/movie/search" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="movie" class="sr-only">Movie</label>
                        <input required type="text" class="form-control" name="movie" id="movie" placeholder="Search for a movie...">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Search</button>
                </fieldset>
            </form> 
        </div>
    </main>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php require_once 'app/views/templates/footer.php'; ?>
    </body>
    </html>
