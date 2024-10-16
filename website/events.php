<?php
require ('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <header>
        <a href="http://localhost/Php-opdrachten/website/inlogpage.php">Inlog</a>
        <a href="http://localhost/Php-opdrachten/website/Programma.php">Programma</a>
        <a href="http://localhost/Php-opdrachten/website/bands.php">Bands</a>
    </header>
    <title>Evenementen</title>
</head>
<body>
    <method="post" action="http://localhost/Php-opdrachten/website/programma.php"></method>
    <h1><strong>Evenementen</strong></h1>

    <form method="post" action= "http://localhost/Php-opdrachten/website/events.php" >
        <p>Vul hier de naam van het event in:</p>
        <input type="text" name="eventname" required>
        <br>
        <p>Event datum</p>
        <input type="date" name="date" required>
        <p>Start tijd </p>
        <input type="time" name="starttime" required>
        <p>Eind tijd </p>
        <input type="time" name="endtime">
        <p>Prijs</p>
        <input type="number" step="any" name="price" >
        <br>
        <input type="submit" value="Create Event" >
    </form>
</body>
</html>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventname = $_POST['eventname'];
    $date = $_POST['date'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    $price = $_POST['price'];

    $stmt = $conn ->prepare("INSERT INTO events (eventname, date, starttime, endtime, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $eventname, $date, $starttime, $endtime, $price);

    if ($stmt->execute()) {
        echo "Nieuw event gemaakt!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt -> close();
}

?>

