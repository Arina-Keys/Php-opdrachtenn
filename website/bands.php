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
    <a href="http://localhost/Php-opdrachten/website/inlogpage.php">Inlog</a>
    <a href="http://localhost/Php-opdrachten/website/Programma.php">Programma</a>
    <a href="http://localhost/Php-opdrachten/website/events.php">Evenementen</a>
    </header>

    <titel>Bands</titel>

    <form method="post" action="http://localhost/Php-opdrachten/website/bands.php">
        <p><strong>vul hier band naam in. </p>
        <input type="text" name="bandnaam" > 
        <br>
        <p>selecteer genre </p></strong>
        <select name="genre" id="genre">
         <option value="rock">rock</option>
         <option value="pop">pop</option>
         <option value="hip-hop">hip-hop</option>
         <option value="jazz">jazz</option>
         </select>  
        <br>
        <input type="submit">
    </form>
</body>
</html>


<?php
if(!empty($_POST['naam'])){
echo "$_POST[naam]";
echo "$_POST[genre]";
$bandname = "$_POST[naam]"; 

$sql = "INSERT INTO Bands (bandname) VALUES ('$bandname')"; 

 $result = $conn->query($sql);
 if ($result) {
    echo "yipiiee";
 } else {
    echo "nope";
 }
 
$query=$conn->query("SELECT * FROM bandname");
}


?>