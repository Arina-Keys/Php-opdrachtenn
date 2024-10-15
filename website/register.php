<?php
session_start();
require('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>REGISTER</title>
</head>
<f>
<method="POST" action="http://localhost/Php-opdrachten/website/register.php"></method>
<header>
   <a href="http://localhost/php-opdrachten/website/programma.php">Programma</a>
</header>

<h1>REGISTER</h1>
<form action="register.php" method="post">
  <label for="username">Username:</label> 
  <input id="username" name="username" type="text" />
  <br>
  <br>
  <label for="email">Email:</label>
  <input id="email" name="email" type="email" />
  <br>
  <br>
  <label for="psw">Password:</label>
  <input id="psw" name="psw" type="password" />
  <br>
  <br>
  <input name="register" type="submit" value="Register" />
</form>
<h2>
  <p1>Do you have an account already?<a href="http://localhost/php-opdrachten/website/inlogpage.php">Login here</a></p1> 
</h2>

<?php

 if (empty($_POST['username']) || empty($_POST['psw']) || empty($_POST['email'])) {
     exit();
 }

 if ($stmt = $conn->prepare('SELECT id, psw FROM accounts WHERE username = ?')) {
     $stmt->bind_param('s', $_POST['username']);
     $stmt->execute();
     $stmt->store_result();
     if ($stmt->num_rows > 0) {
         echo 'Username exists, please choose another!';
     } else {
     if ($stmt = $conn->prepare('INSERT INTO accounts (username, psw, email) VALUES (?, ?, ?)')) {
       $psw = password_hash($_POST['psw'], PASSWORD_DEFAULT);
       $stmt->bind_param('sss', $_POST['username'], $psw, $_POST['email']);
       $stmt->execute();
       echo 'You have successfully registered! You can now login!';
     } else {
       echo 'Could not prepare statement!';
     }
     }

     $stmt->close();
 } else {
     echo 'Could not prepare statement!';
 }
  $conn->close();
?>
</body>
</html>