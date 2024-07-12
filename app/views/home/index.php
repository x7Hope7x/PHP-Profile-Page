<?php if($_SESSION['username'] == "Admin"){
    require_once 'app/views/templates/headerAdmin.php';
}else{
    require_once 'app/views/templates/header.php';
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .welcome-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-top: 100px; /* Space for the header */
            text-align: center;
        }
        .welcome-container h2 {
            margin-bottom: 20px;
            color: #ff69b4; /* Pink */
        }
        .welcome-container p {
            margin: 10px 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
        .welcome-container a {
            color: #007BFF;
            text-decoration: none;
        }
        .welcome-container a:hover {
            text-decoration: underline;
        }
        .card {
            border: none;
        }
        .card-header {
            background-color: #ff69b4; /* Pink */
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        .card-body {
            background-color: #f0f0f0; /* Grey */
        }
        .alert-custom {
            background-color: #ff69b4; /* Pink */
            color: white;
        }
        .btn-group-custom .btn {
            background-color: #ff69b4; /* Pink */
            color: white;
        }
        .btn-group-custom .btn:hover {
            background-color: #ff1493; /* Darker Pink */
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <!--- Card Component, Button component, Alert componenet. -->
        <div class="card welcome-container">
            <div class="card-header">
                Welcome, <span style="color: #fff; font-style: italic;"><?= $_SESSION['username'] ?>!</span>
            </div>
            <div class="card-body">
                <p>Today's date is: <?php echo date("Y/m/d"); ?></p>
                <div class="alert alert-custom" role="alert">
                    This is the last assignment of COSC-4806.
                </div>
                <div class="btn-group btn-group-custom" role="group" aria-label="Basic example">
                    <button type="button" class="btn">Useless No.1</button>
                    <button type="button" class="btn">Useless No.2</button>
                    <button type="button" class="btn">Useless No.3</button>
                </div>
                <p><a href="/logout" class="btn btn-outline-primary">Logout</a></p>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
