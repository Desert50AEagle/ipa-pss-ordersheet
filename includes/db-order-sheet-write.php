<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 05.04.2017
 * Time: 13:21
 */

//Variabeln setzen
$order                      = "";
$auftragsnummer             = "";
$termin                     = "";
$bearbeiter                 = "";
$zuataendig_int             = "";
$zuataendig_ext             = "";
$kunde                      = "";
$material                   = "";
$produktnummer              = "";
$seriennummer               = "";
$betriebssystem             = "";
$edition_betriebsys         = "";
$architektur                = "";
$sprache                    = "";
$office                     = "";
$edition_office             = "";
$vierenschutz               = "";
$vorh_image                 = "";
$image_erst                 = "";
$textarea_datenuebernahme1  = "";
$zusatzauftraege            = "";


if (isset($_POST["order"],
            $_POST["auftragsnummer"],
            $_POST["termin"],
            $_POST["bearbeiter"],
            $_POST["zust-int"],
            $_POST["zust-ext"],
            $_POST["kunde"],
            $_POST["material"],
            $_POST["produktnummer"],
            $_POST["seriennummer"],
            $_POST["betriebssystem"],
            $_POST["edition-betriebsys"],
            $_POST["architektur"],
            $_POST["sprache"],
            $_POST["office"],
            $_POST["edition-office"],
            $_POST["vierenschutz"],
            $_POST["vorh-image"],
            $_POST["image-erst"],
            $_POST["textarea-datenuebernahme1"],
            $_POST["zusatzauftraege"])){

    //Variabeln definieren
    $order                      = $_POST["order"];
    $auftragsnummer             = $_POST["auftragsnummer"];
    $termin                     = $_POST["termin"];
    $bearbeiter                 = $_POST["bearbeiter"];
    $zustaendig_int             = $_POST["zust-int"];
    $zustaendig_ext             = $_POST["zust-ext"];
    $kunde                      = $_POST["kunde"];
    $material                   = $_POST["material"];
    $produktnummer              = $_POST["produktnummer"];
    $seriennummer               = $_POST["seriennummer"];
    $betriebssystem             = $_POST["betriebssystem"];
    $edition_betriebsys         = $_POST["edition-betriebsys"];
    $architektur                = $_POST["architektur"];
    $sprache                    = $_POST["sprache"];
    $office                     = $_POST["office"];
    $edition_office             = $_POST["edition-office"];
    $vierenschutz               = $_POST["vierenschutz"];
    $vorh_image                 = $_POST["vorh-image"];
    $image_erst                 = $_POST["image-erst"];
    $textarea_datenuebernahme1  = $_POST["textarea-datenuebernahme1"];
    $zusatzauftraege            = $_POST["zusatzauftraege"];


    //Werte in Datenbank schreiben
    $daten = "INSERT INTO auftrag(
              `order`,
              auftragsnummer,
              termin,
              bearbeiter,
              zustaendig_int,
              zustaendig_ext,
              kunde, 
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
              ) 
              VALUES(
              '$order', 
              '$auftragsnummer', 
              '$termin', 
              '$bearbeiter', 
              '$zustaendig_int', 
              '$zustaendig_ext', 
              '$kunde', 
              '$material',
              '$produktnummer',
              '$seriennummer',
              '$betriebssystem',
              '$edition_betriebsys',
              '$architektur',
              '$sprache',
              '$office',
              '$edition_office',
              '$vierenschutz',
              '$vorh_image',
              '$image_erst',
              '$textarea_datenuebernahme1',
              '$zusatzauftraege'
              )";

    $dateneintragen = mysqli_query($conn, $daten);

    if ($dateneintragen == false){
        echo "Eintrag konnte nicht hinzugefügt werden!";
    }
    mysqli_close($conn);
}

?>

