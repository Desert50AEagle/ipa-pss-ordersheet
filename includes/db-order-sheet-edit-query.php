<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 06.04.2017
 * Time: 11:55
 */

$auftrag_id = $_GET["id"];

//Datenbankabfrage Order Shee Input-------------------------------------------------------------------------------------------------
$abfrage1  = mysqli_query($conn, "SELECT `order`,
                                        auftragsnummer, 
                                        termin, 
                                        kunde, 
                                        zustaendig_int,
                                        zustaendig_ext,
                                        bearbeiter, 
                                        material, 
                                        produktnummer, 
                                        seriennummer, 
                                        betriebssystem, 
                                        edition_betriebsys, 
                                        architektur, 
                                        sprache, 
                                        office, 
                                        edition_office, 
                                        vierenschutz, 
                                        vorh_image, 
                                        image_erst, 
                                        textarea_datenuebernahme1, 
                                        zusatzauftraege 
                                        FROM auftrag 
                                        WHERE auftrag_id = $auftrag_id");


foreach ($abfrage1 as $row)
{
    $order                      = $row["order"];
    $auftragsnummer             = $row["auftragsnummer"];
    $termin                     = $row["termin"];
    $kunde                      = $row["kunde"];
    $zustaendig_int             = $row["zustaendig_int"];
    $zustaendig_ext             = $row["zustaendig_ext"];
    $bearbeiter                 = $row["bearbeiter"];
    $material                   = $row["material"];
    $produktnummer              = $row["produktnummer"];
    $seriennummer               = $row["seriennummer"];
    $betriebssystem             = $row["betriebssystem"];
    $edition_betriebsys         = $row["edition_betriebsys"];
    $architektur                = $row["architektur"];
    $sprache                    = $row["sprache"];
    $office                     = $row["office"];
    $edition_office             = $row["edition_office"];
    $vierenschutz               = $row["vierenschutz"];
    $vorh_image                 = $row["vorh_image"];
    $image_erst                 = $row["image_erst"];
    $textarea_datenuebernahme1  = $row["textarea_datenuebernahme1"];
    $zusatzauftraege            = $row["zusatzauftraege"];
}
//Datenbankabfrage Order Shee Input Ende---------------------------------------------------------------------------------------------

//Datenbank Abfrage username---------------------------------------------------------------------------------------------------------
$abfrage2  = mysqli_query($conn, "SELECT username FROM pss_os_user ORDER BY username ASC");

foreach ($abfrage2 as $row)
{
    $username = $row["username"];
}
//-----------------------------------------------------------------------------------------------------------------------------------

?>