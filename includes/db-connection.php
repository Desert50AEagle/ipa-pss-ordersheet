<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 29.03.2017
 * Time: 16:56
 */
$servername	= "localhost";
$username 	= "root";
$password 	= "root";
$dbname		= "pss_order_sheet";

// Verbindung zur Datenbank
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verbindung überprüfen
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
//echo "OK";
?>