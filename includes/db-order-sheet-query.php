<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 04.04.2017
 * Time: 11:14
 */

//Datenbank Abfrage
$abfrage  = mysqli_query($conn, "SELECT username, betriebssystem FROM pss_os_user, betriebssystem ");

foreach ($abfrage as $row)
{
    $username = $row["username"];
    $betriebssystem = $row["betriebssystem"];
}





?>

