<?php require_once 'app/views/templates/headerAdmin.php'; ?>
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
            width: 90%;
            max-width: 800px;
            margin-top: 100px; /* Space for the header */
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
            color: #ff69b4; /* Pink */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f8f8;
        }
        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
        .reminders button, .add-reminder button, .button {
            padding: 10px;
            background-color: #ff69b4; /* Pink */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .reminders button:hover, .add-reminder button:hover, .button:hover {
            background-color: #ff1493; /* Darker Pink */
        }
        .add-reminder input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .section-title {
            color: #ff69b4; /* Pink */
            margin-bottom: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <h2 class="section-title">All Reports</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Subject</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['reminders'] as $reminder): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($reminder['username']); ?></td>
                                <td><?php echo htmlspecialchars($reminder['subject']); ?></td>
                                <td><?php echo htmlspecialchars($reminder['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="chart-container">
                    <canvas id="remindersChart"></canvas>
                </div>
                <section class="most-reminders">
                    <h2 class="section-title">Most reminders: <?php echo $_SESSION['mostReminders']; ?></h2>
                </section>
                <section class="total-logins">
                    <h2 class="section-title">Total logins: <?php echo htmlspecialchars($_SESSION['loginUsername']) . "\t" . htmlspecialchars($_SESSION['tLogins']); ?></h2>
                </section>
                <form action="/reports/totalLogin" method="post" style="margin: 0;">
                    <input type="text" name="subject" required style="flex: 1; margin-right: 10px;">
                    <input type="hidden" name="total-logins">
                    <button type="submit" class="button">Total Logins</button>
                </form>
            </section>
        </main>
    </div>
    <script>
        // Data for the chart
        const reminderData = <?php echo json_encode($data['reminders']); ?>;

        // Process data to get number of reminders per user
        const userReminderCounts = {};
        reminderData.forEach(reminder => {
            if (userReminderCounts[reminder.username]) {
                userReminderCounts[reminder.username]++;
            } else {
                userReminderCounts[reminder.username] = 1;
            }
        });

        // Prepare data for Chart.js
        const labels = Object.keys(userReminderCounts);
        const data = Object.values(userReminderCounts);

        // Create the chart
        const ctx = document.getElementById('remindersChart').getContext('2d');
        const remindersChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Reminders',
                    data: data,
                    backgroundColor: 'rgba(255, 105, 180, 0.2)', // Pink
                    borderColor: 'rgba(255, 105, 180, 1)', // Pink
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
