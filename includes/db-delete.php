<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 08.04.2017
 * Time: 23:32
 */
$auftrag_id = $_GET["id"];

//Datenbanverbindung
require ("db-connection.php");

//Datenbankabfrage
$abfrage  = mysqli_query($conn, "SELECT datum_signierung 
                                  FROM auftrag 
                                  WHERE auftrag_id = $auftrag_id ");

//Variabeln definieren
foreach ($abfrage as $row)
{
    $datum_signierung   = $row["datum_signierung"];
}

//Softdelet durch aktuallisierung von Datum Wert
$update = "UPDATE auftrag SET datum_signierung = '2' WHERE auftrag_id = $auftrag_id";

$dateneintragen = mysqli_query($conn, $update);

if($dateneintragen == false)
{
    echo "Eintrag konnte nicht hinzugefügt werden!";
}
mysqli_close($conn);

//Umleitung auf Startseite
header("location: /ipa-pss-ordersheet/index.php");

?>