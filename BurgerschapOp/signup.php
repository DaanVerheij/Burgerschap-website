<?php
echo "<pre>";
var_dump($_POST);



$database_lokatie     = 'localhost';
$database_naam        = 'burgerschap';
$database_gebruiker   = 'root';
$database_wachtwoord  = '';

$database_connectie = new PDO("mysql:host=$database_lokatie;dbname=$database_naam", $database_gebruiker, $database_wachtwoord);




//gegevens uit een formulier ophalen met de post method.
$email = $_POST['form_email'];
$wachtwoord = $_POST['form_wachtwoord'];
$naam = $_POST['form_naam'];
$telefoonnummer = $_POST['form_telefoonnummer'];
$woonplaats = $_POST['form_woonplaats'];
$geslacht = $_POST['form_geslacht'];
$geboortedatum = $_POST["form_geboortedatum'"];
$nationaliteit = $_POST['form_nationaliteit'];


// !! De onderstaande code voegt gebruikers toe en geen producten. Pas de code aan.!!
$sql = "INSERT INTO users (email, wachtwoord, naam, telefoonnummer, woonplaats, geslacht, geboortedatum, nationaliteit) VALUES (:ph_email , :ph_wachtwoord , :ph_naam , :ph_telefoonnummer , :ph_woonplaats , :ph_geslacht , :ph_geboortedatum , :ph_nationaliteit)" ;//sql query met PLACEHOLDERS
//een ID slaan we niet op, deze wordt automatisch aangemaakt door MySQL
$stmt = $database_connectie->prepare($sql); //stuur naar mysql.
$stmt->bindParam(":ph_email", $email ); //verbind de waardes
$stmt->bindParam(":ph_wachtwoord", $wachtwoord );
$stmt->bindParam(":ph_naam", $naam );
$stmt->bindParam(":ph_telefoonnummer", $telefoonnummer ); 
$stmt->bindParam(":ph_woonplaats", $woonplaats );
$stmt->bindParam(":ph_geslacht", $geslacht ); 
$stmt->bindParam(":ph_geboortedatum", $geboortedatum ); 
$stmt->bindParam(":ph_nationaliteit", $nationaliteit );

$stmt->execute();



if (!isset($_SESSION['user_id']))
{
header("Location: index.html");
}


?>