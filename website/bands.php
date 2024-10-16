<?php
session_start();
require ('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <a href="http://localhost/Php-opdrachten/website/Programma.php">Programma</a>
    </header>

    <h1><strong>Maak bands and evenementen</strong></h1>

    <div class="flexcontainer">
        <div>
    <form method="post" action="http://localhost/Php-opdrachten/website/bands.php">
        <p><strong>Vul hier de band naam in:</strong></p>
        <input type="text" name="bandname" required>
        <br>
        <p><strong>Selecteer genre:</strong></p>
        <select name="genre" id="genre" required>
            <option value="rock">rock</option>
            <option value="pop">pop</option>
            <option value="hip-hop">hip-hop</option>
            <option value="jazz">jazz</option>
        </select>  <br>
        <button type="submit">Voer band in</button>
    </form>
    </div>
    <div>
    <form method="post" action="http://localhost/Php-opdrachten/website/bands.php" class="eventform">
    <p><strong>Vul hier de naam van het evenement in:</strong></p>
    <input type="text" name="eventname" required>
    <br>
    <p><strong>Event datum:</strong></p>
    <input type="date" name="date" required>
    <p><strong>Start tijd:</strong></p>
    <input type="time" name="starttime" required>
    <p><strong>Eind tijd:</strong></p>
    <input type="time" name="endtime">
    <p><strong>Prijs:</strong></p>
    <input type="number" step="any" name="price">
    <br>
    <p><strong>Selecteer bands voor dit evenement:</strong></p>
    <select name="band_ids[]" multiple required>
        <?php
        $result = $conn->query("SELECT id, bandname FROM bands");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['bandname'] . "</option>";
            }
        } else {
            echo "<option value=''>Geen bands beschikbaar</option>";
        }
        ?>
    </select>
    <br>
    <button type="submit">Maak evenement</button>
</form>
    </div>
    </div>
</body>
</html>

<?php
if (!empty($_POST['bandname']) && !empty($_POST['genre'])) {
    $bandname = $_POST['bandname'];
    $genre = $_POST['genre'];

    $stmt = $conn->prepare("INSERT INTO bands (bandname, genre) VALUES (?, ?)");
    $stmt->bind_param("ss", $bandname, $genre);

    if ($stmt->execute()) {
        echo "Band inserted into database";
    } else {
        echo "Something went wrong, please contact support";
    }

    $stmt->close();

    $query = $conn->query("SELECT * FROM bands");
    while ($row = $query->fetch_assoc()) {
        echo "<p>Band: " . $row['bandname'] . " | Genre: " . $row['genre'] . "</p>";
    }
}



if (!empty($_POST['eventname']) && !empty($_POST['band_ids'])) {
    $eventname = $_POST['eventname'];
    $date = $_POST['date'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    $price = $_POST['price'];
    $band_ids = $_POST['band_ids'];

    $stmt = $conn->prepare("INSERT INTO events (eventname, date, starttime, endtime, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $eventname, $date, $starttime, $endtime, $price);

    if ($stmt->execute()) {
        $event_id = $conn->insert_id;

        foreach ($band_ids as $band_id) {
            $stmt = $conn->prepare("INSERT INTO event_bands (event_id, band_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $event_id, $band_id);
            $stmt->execute();
        }

        echo "Nieuw event gemaakt met geselecteerde bands!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

?>
