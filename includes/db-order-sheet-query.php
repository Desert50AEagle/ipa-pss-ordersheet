<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 04.04.2017
 * Time: 11:14
 */

//Datenbank Abfrage username---------------------------------------------------------------------------------------------------------
$abfrage1  = mysqli_query($conn, "SELECT username FROM pss_os_user ORDER BY username ASC");

foreach ($abfrage1 as $row)
{
    $username = $row["username"];
}
//-----------------------------------------------------------------------------------------------------------------------------------

//Datenbank Abfrage Betriebssystem---------------------------------------------------------------------------------------------------
$abfrage2  = mysqli_query($conn, "SELECT betriebssystem FROM betriebssystem");
foreach ($abfrage2 as $row)
{
    $betriebssystem = $row["betriebssystem"];
}
//-----------------------------------------------------------------------------------------------------------------------------------

//Datenbank Abfrage Betriebssystem Edition-------------------------------------------------------------------------------------------
$abfrage3  = mysqli_query($conn, "SELECT betriebssystem_edition FROM betriebssystem_edition ORDER BY betriebssystem_edition ASC");
foreach ($abfrage3 as $row)
{
    $betriebsystemEdition = $row["betriebssystem_edition"];
}
//-----------------------------------------------------------------------------------------------------------------------------------

//Datenbank Abfrage Architektur------------------------------------------------------------------------------------------------------
$abfrage4  = mysqli_query($conn, "SELECT architektur FROM architektur ORDER BY architektur ASC");
foreach ($abfrage4 as $row)
{
    $architektur = $row["architektur"];
}
//-----------------------------------------------------------------------------------------------------------------------------------

//Datenbank Abfrage Sprache----------------------------------------------------------------------------------------------------------
$abfrage5  = mysqli_query($conn, "SELECT sprache FROM sprache ORDER BY sprache ASC");
foreach ($abfrage5 as $row)
{
    $sprache = $row["sprache"];
}
//-----------------------------------------------------------------------------------------------------------------------------------

//Datenbank Abfrage Office-----------------------------------------------------------------------------------------------------------
$abfrage6  = mysqli_query($conn, "SELECT office FROM office ORDER BY office ASC");
foreach ($abfrage6 as $row)
{
    $office = $row["office"];
}
//-----------------------------------------------------------------------------------------------------------------------------------

//Datenbank Abfrage Office Edition---------------------------------------------------------------------------------------------------
$abfrage7  = mysqli_query($conn, "SELECT office_edition FROM office_edition ORDER BY office_edition ASC");
foreach ($abfrage7 as $row)
{
    $officeEdition = $row["office_edition"];
}
//-----------------------------------------------------------------------------------------------------------------------------------

//Datenbank Abfrage Virenschutz------------------------------------------------------------------------------------------------------
$abfrage8  = mysqli_query($conn, "SELECT virenschutz FROM virenschutz ORDER BY virenschutz ASC");
foreach ($abfrage8 as $row)
{
    $virenschutz = $row["virenschutz"];
}
//-----------------------------------------------------------------------------------------------------------------------------------




?>

