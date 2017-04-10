<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 06.04.2017
 * Time: 09:08
 */

//Datenbankabfrage
$abfrage  = mysqli_query($conn, "SELECT auftrag_id, 
                                        auftragsnummer, 
                                        termin, 
                                        kunde, 
                                        zustaendig_int, 
                                        bearbeiter,
                                        datum_signierung
                                        FROM auftrag");

//Variabeln definieren
foreach ($abfrage as $row)
{
    $auftrag_id         = $row["auftrag_id"];
    $auftragsnummer     = $row["auftragsnummer"];
    $termin             = $row["termin"];
    $kunde              = $row["kunde"];
    $zustaendig_int     = $row["zustaendig_int"];
    $bearbeiter         = $row["bearbeiter"];
    $datum_signierung   = $row["datum_signierung"];
}
?>