<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 07.04.2017
 * Time: 13:39
 */

//Datenbankabfrage
$abfrage  = mysqli_query($conn, "SELECT * FROM auftrag WHERE auftrag_id = $auftrag_id");

//Variabeln definieren
foreach ($abfrage as $row)
{
    $order                          = $row["order"];
    $auftragsnummer                 = $row["auftragsnummer"];
    $termin                         = $row["termin"];
    $kunde                          = $row["kunde"];
    $bearbeiter                     = $row["bearbeiter"];
    $zustaendig_int                 = $row["zustaendig_int"];
    $zustaendig_ext                 = $row["zustaendig_ext"];
    $material                       = $row["material"];
    $produktnummer                  = $row["produktnummer"];
    $seriennummer                   = $row["seriennummer"];
    $betriebssystem                 = $row["betriebssystem"];
    $edition_betriebsys             = $row["edition_betriebsys"];
    $architektur                    = $row["architektur"];
    $sprache                        = $row["sprache"];
    $office                         = $row["office"];
    $edition_office                 = $row["edition_office"];
    $vierenschutz                   = $row["vierenschutz"];
    $vorh_image                     = $row["vorh_image"];
    $image_erst                     = $row["image_erst"];
    $textarea_zusatzauftraege1      = $row["textarea_zusatzauftraege1"];
    $textarea_datenuebernahme1      = $row["textarea_datenuebernahme1"];
    $check_geraetepruefung          = $row["check_geraetepruefung"];
    $textarea_geraetepruefung       = $row["textarea_geraetepruefung"];
    $check_hardware_reparatur       = $row["check_hardware_reparatur"];
    $case_id                        = $row["case_id"];
    $termin_techniker               = $row["termin_techniker"];
    $check_entsorgung_altgeraet     = $row["check_entsorgung_altgeraet"];
    $textarea_entsorgung_altgeraet  = $row["textarea_entsorgung_altgeraet"];
    $check_liefer_rapport           = $row["check_liefer_rapport"];
    $check_trackit_erfasst          = $row["check_trackit_erfasst"];
    $check_system_doku_blatt        = $row["check_system_doku_blatt"];
    $datum_signierung               = $row["datum_signierung"];
    $signatur_bearbeiter            = $row["signatur_bearbeiter"];
    $textarea_signatur              = $row["textarea_signatur"];
}

?>