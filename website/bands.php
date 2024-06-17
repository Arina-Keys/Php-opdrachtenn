<?php
require ('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>form</title>
</head>
<body>

    <form method="post" action="http://localhost/Php-opdrachten/website/">
        <p><strong>vul hier band naam in. </p>
        <input type="text" name="naam" > 
        <br>
        <p>selecteer genre </p></strong>
        <select name="genre" id="genre" multiple>
         <option value="rock">rock</option>
         <option value="pop">pop</option>
         <option value="hip-hop">hip-hop</option>
         <option value="jazz">jaz</option>
        </select>
        <br>
        <input type="submit">
    </form>
</body>
</html>


<?php
echo "$_POST[naam] <br>";
echo "$_POST[genre] <br>";
$dbname = "$_POST[naam]" ; 

 $sql = "INSERT INTO MyGuests (bandname) VALUES ('$dbname')"; 

 $result = $conn -> query ($sql);
 if ($result) {
    echo "yipiiee";
 } else {
    echo "nope";
 }

 
$query = $mysqli-> query ("SELECT * FROM bandname");

?>