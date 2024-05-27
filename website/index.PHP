<?php

// $kleur = $objectauto["kleur"];
// $snelheid = $objectauto["snelheid"];
// $zitplaatsen = $objectauto["zitplaatsen"];

// echo "ik heb een auto die is $kleur. Hij rijdt $snelheid en de auto biedt plaats voor $zitplaatsen." ; 

// $mijninfo = array("naam" => "Danique", "geboortedatum" => "05-07-2007", "woonplaats" => "Almere");

// echo "Mijn naam is $mijninfo[naam].
// Ik ben geboren op $mijninfo[geboortedatum], 
// en woon in $mijninfo[woonplaats]."

//$objectauto = array ("kleur" => "geel", "snelheid" => 76, "zitplaatsen" => 4);

// if ($objectauto['snelheid'] < '50') {
//     echo "dit is een langzame auto";
// } elseif ($objectauto['snelheid'] >= 50 && $objectauto['snelheid'] <= 150){
//     echo "Dit is een normale auto";
// } elseif ($objectauto['snelheid'] > 150){
//     echo "Dit is een snelle auto";
// } else {
//     echo "Deze auto rijdt niet";
// }



// if ($objectauto['kleur'] == "rood") {
//     echo "Ik ben een rode auto!";
// } else {
//     echo "Ik ben een auto met een andere kleur.";
// }
// $sillycar = array ['sillycar.jpeg']
// echo '$sillycar[ 'sillycar.jpeg' ]'
// for ()

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
        <p><strong>vul hier je naam in. </strong></p>
        <input type="text" name="naam" > 
        <p><strong>vul hier je email in. </strong></p>
        <input type="email" name="email">
        <br>
        <input type="submit">
    </form>
</body>
</html>


<?php



echo "$_POST[naam] <br>";
echo "$_POST[email]";

if ($_POST['naam'] == "Quinn" ){
    echo "kut kindje";
}

?>

