<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 06.04.2017
 * Time: 15:31
 */
$auftrag_id = $_GET["id"];

//Variabeln setzen
$check_geraetepuefung       = "";
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

if (isset($_POST["check_geraetepuefung"],
    $_POST["textarea_geraetepruefung"],
    $_POST["check_hardware_reparatur"],
    $_POST["case_id"],
    $_POST["termin_techniker"],
    $_POST["check_entsorgung_altgeraet"],
    $_POST["textarea_entsorgung_altgeraet"],
    $_POST["check_liefer_rapport"],
    $_POST["check_trackit_erfasst"],
    $_POST["check_system_doku_blatt"],
    $_POST["datum_signierung"],
    $_POST["signatur_bearbeiter"],
    $_POST["textarea_signatur"])){

    //Variabeln definieren
    $check_geraetepuefung       = $_POST["check_geraetepuefung"];
    $textarea_geraetepruefung   = $_POST["textarea_geraetepruefung"];
    $check_hardware_reparatur   = $_POST["check_hardware_reparatur"];
    $case_id                    = $_POST["case_id"];
    $termin_techniker           = $_POST["termin_techniker"];
    $check_entsorgung_altgeraet = $_POST["check_entsorgung_altgeraet"];
    $check_liefer_rapport       = $_POST["check_liefer_rapport"];
    $check_trackit_erfasst      = $_POST["check_trackit_erfasst"];
    $check_system_doku_blatt    = $_POST["check_system_doku_blatt"];
    $datum_signierung           = $_POST["datum_signierung"];
    $signatur_bearbeiter        = $_POST["signatur_bearbeiter"];
    $textarea_signatur          = $_POST["textarea_signatur"];


    //Werte in Datenbank schreiben
    $daten = "INSERT INTO auftrag(
              check_geraetepuefung,
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
              edition_betriebsys,
              textarea_signatur
              ) 
              VALUES(
              '$check_geraetepuefung', 
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
              WHERE auftrag_id = $auftrag_id)";

    $dateneintragen = mysqli_query($conn, $daten);

    if ($dateneintragen == false){
        echo "Eintrag konnte nicht hinzugefügt werden!";
    }
    mysqli_close($conn);
}

?>