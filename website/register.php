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
    <title>Registration</title>
</head>
<body>
    <header>
        <a href="Programma.php">Programma</a>
        <a href="events.php">Evenementen</a>
    </header>

    <form action="inlogpage.php" method="post">
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" id="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

        <hr>
        <button type="submit" class="registerbtn">Register</button>
        
        <div class="container signin">
            <p>Already have an account? <a href="inlogpage.php">Sign in</a>.</p>
        </div>
    </form>
</body>
</html>

<?php 

    $email = $_GET['email']; 
    $psw = $_GET['psw'];
                                               
    if($conn->connect_error){    
    die('Connection failed : '.$conn->connect_error);
     } else {    
        $sql = "INSERT INTO accounts (email, psw)
                VALUES ($email, $psw)";
    } 

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
    
?>