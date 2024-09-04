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