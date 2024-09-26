<?php
session_start();
require ('database.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $psw = htmlspecialchars($psw);

    $hashed_psw = password_hash($psw, PASSWORD_DEFAULT);

   

    $stmt = $conn->prepare("INSERT INTO accounts (email, psw) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashed_psw);

    if ($stmt->execute()) {
        echo "New account created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>inlog</title>
</head>
<body>
    <header>
    <a href="http://localhost/Php-opdrachten/website/Programma.php">Programma</a>
    <a href="http://localhost/Php-opdrachten/website/events.php">Evenementen</a>
    </header>
<method="post" action="http://localhost/Php-opdrachten/website/inlogpage.php"></method>
    <form methode="post">
        <p><strong>Vul hier je email in.</strong></p>
        <input type="text" name="gnaam">
        <p><strong>Vul hier je wachtwoord in.</strong></p>
        <input type="password" naam="ww"> 

        <div class="container signin">
    <p>Don't have an account? <a href="http://localhost/Php-opdrachten/website/register.php">Make one here</a>.</p>
  </div>
    </form>
    
</body>
</html>


