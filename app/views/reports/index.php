<?php require_once 'app/views/templates/headerAdmin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin-top: 100px; /* Space for the header */
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .reminders ul {
            list-style-type: none;
            padding: 0;
        }
        .reminders li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .reminders li:last-child {
            border-bottom: none;
        }
        .reminder-item {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
        }
        .reminders form {
            display: inline;
        }
        .reminders button {
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .reminders button:hover {
            background-color: #0056b3;
        }
        .add-reminder input[type="text"] {
            width: calc(100% - 22px);
            padding: 20px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .add-reminder button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .add-reminder button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <?php include 'app/views/templates/headerAdmin.php'; ?>
        </div>
    </div>
    <div class="container">
        <main>
            <section class="all-reminders">
                <h2>All Reports</h2>
                <?php
                    foreach ($data['reminders'] as $reminder) {

                ?>
                    <div class="reminder-item">
                        <?php echo "<p>" .htmlspecialchars($reminder['user_id']) . '</p>'; ?>
                    </div>
                <?php
                    }
                ?>
            </section>
        </main>
    </div>
</body>
</html>
