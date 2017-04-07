<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 07.04.2017
 * Time: 13:39
 */

$abfrage  = mysqli_query($conn, "SELECT * FROM auftrag WHERE auftrag_id = $auftrag_id");
//Datenbankabfrage Ende

foreach ($abfrage as $row)
{
    $order                      = $row["order"];
    $auftragsnummer             = $row["auftragsnummer"];
    $termin                     = $row["termin"];
    $kunde                      = $row["kunde"];
    $bearbeiter                 = $row["bearbeiter"];
    $zustaendig_int             = $row["zustaendig_int"];
    $zustaendig_ext             = $row["zustaendig_ext"];
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

?>