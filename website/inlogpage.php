<?php
session_start();
require('database.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['psw'])) {
        if ($stmt = $conn->prepare('SELECT id, psw FROM accounts WHERE username = ?')) {
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $hashed_password);
                $stmt->fetch();

                if (password_verify($_POST['psw'], $hashed_password)) {
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['id'] = $id;
                    header('Location: bands.php');
                    exit;
                } else {
                    $error = 'Incorrect username or password';
                }
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <header>
        <a href="http://localhost/Php-opdrachten/website/Programma.php">Programma</a>
    </header>

    <h1>Login</h1>

    <div class="form-container">
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>

            <label for="password">Password:</label>
            <input type="password" id="psw" name="psw" required>
            <br><br>

            <button type="submit">Login</button>
        </form>

        <?php
        if (isset($error)) {
            echo '<p style="color: red;">' . $error . '</p>';
        }
        ?>
    </div>
</body>
</html>

