<?php
session_start();
require('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Programma</title>
</head>
<body>

    <div class="top-right">
        <a href="inlogpage.php">
            <button id="Login">Inlog</button>
        </a>
    </div>

    <h1><strong>Event Program</strong></h1>

    <div class="flexcontainer">
        <div class="program-container">
            <?php
            $query = $conn->query("
                SELECT e.*, GROUP_CONCAT(b.bandname SEPARATOR ', ') AS bands
                FROM events e
                LEFT JOIN event_bands eb ON e.id = eb.event_id
                LEFT JOIN bands b ON eb.band_id = b.id
                GROUP BY e.id
            ");

            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    echo "<p><strong>Event:</strong> " . $row['eventname'] . "<br>";
                    echo "<strong>Date:</strong> " . $row['date'] . "<br>";
                    echo "<strong>Start Time:</strong> " . $row['starttime'] . "<br>";
                    echo "<strong>End Time:</strong> " . $row['endtime'] . "<br>";
                    echo "<strong>Price:</strong> " . $row['price'] . "<br>";
                    echo "<strong>Bands:</strong> " . (!empty($row['bands']) ? $row['bands'] : 'No bands yet') . "</p>";
                    echo "<hr>";
                }
            } else {
                echo "<p>No events found.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
