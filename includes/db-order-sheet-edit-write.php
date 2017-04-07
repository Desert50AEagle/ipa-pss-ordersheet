<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 06.04.2017
 * Time: 15:31
 */
$auftrag_id = $_GET["id"];


//Variabeln setzen
$check_geraetepruefung      = "";
$textarea_geraetepruefung   = "";
$check_hardware_reparatur   = "";
$case_id                    = "";
$termin_techniker           = "";
$check_entsorgung_altgeraet = "";
$check_liefer_rapport       = "";
$check_trackit_erfasst      = "";
$check_system_doku_blatt    = "";
$datum_signierung           = "";
$signatur_bearbeiter        = "";
$textarea_signatur          = "";

if (isset($_POST["check-geraetepruefung"],
    $_POST["textarea-geraetepruefung"],
    $_POST["check-hardware-reparatur"],
    $_POST["case-id"],
    $_POST["termin-techniker"],
    $_POST["check-entsorgung-altgeraet"],
    $_POST["textarea-entsorgung-altgeraet"],
    $_POST["check-liefer-rapport"],
    $_POST["check-trackit-erfasst"],
    $_POST["check-system-doku-blatt"],
    $_POST["datum-signierung"],
    $_POST["signatur-bearbeiter"],
    $_POST["textarea-signatur"])){

    //Variabeln definieren
    $check_geraetepruefung      = $_POST["check-geraetepruefung"];
    $textarea_geraetepruefung   = $_POST["textarea-geraetepruefung"];
    $check_hardware_reparatur   = $_POST["check-hardware-reparatur"];
    $case_id                    = $_POST["case-id"];
    $termin_techniker           = $_POST["termin-techniker"];
    $check_entsorgung_altgeraet = $_POST["check-entsorgung-altgeraet"];
    $check_liefer_rapport       = $_POST["check-liefer-rapport"];
    $check_trackit_erfasst      = $_POST["check-trackit-erfasst"];
    $check_system_doku_blatt    = $_POST["check-system-doku-blatt"];
    $datum_signierung           = $_POST["datum-signierung"];
    $signatur_bearbeiter        = $_POST["signatur-bearbeiter"];
    $textarea_signatur          = $_POST["textarea-signatur"];

    //Werte in Datenbank schreiben
    $daten = "INSERT INTO auftrag(
              check_geraetepruefung,
              textarea_geraetepruefung,
              check_hardware_reparatur,
              case_id,
              termin_techniker,
              check_entsorgung_altgeraet,
              check_liefer_rapport, 
              check_trackit_erfasst,
              check_system_doku_blatt,
              datum_signierung,
              signatur_bearbeiter,
              textarea_signatur
              ) 
              VALUES(
              '$check_geraetepruefung', 
              '$textarea_geraetepruefung', 
              '$check_hardware_reparatur', 
              '$case_id', 
              '$termin_techniker', 
              '$check_entsorgung_altgeraet', 
              '$check_liefer_rapport', 
              '$check_trackit_erfasst',
              '$check_system_doku_blatt',
              '$datum_signierung',
              '$signatur_bearbeiter',
              '$textarea_signatur'
              WHERE auftrag_id = $auftrag_id
              )";

    $dateneintragen = mysqli_query($conn, $daten);

    if ($dateneintragen == false){
        echo "Eintrag konnte nicht hinzugefügt werden!";
    }
    mysqli_close($conn);
}

?>