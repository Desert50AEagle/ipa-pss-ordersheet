<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 07.04.2017
 * Time: 11:37
 */

require ("assets/lib/fpdf/fpdf.php");

$auftrag_id = $_GET['id'];

//Datenbankverbindung
require ("includes/db-connection.php");

//Datenbankabfrage
require ("includes/db-pdf-query.php");

//Checkboxprüfen "Geräteprüfung"
if (isset($check_geraetepruefung)){
    $check_geraetepruefung = "Ja";
}
else{
    $check_geraetepruefung = "Nein";
}

//Checkboxprüfen "Hardware Reparatur"
if (isset($check_hardware_reparatur)){
    $check_hardware_reparatur = "Ja";
}
else{
    $check_hardware_reparatur = "Nein";
}

//Checkboxprüfen "Entsorgung Altgerät"
if (isset($check_entsorgung_altgeraet)){
    $check_entsorgung_altgeraet = "Ja";
}
else{
    $check_entsorgung_altgeraet = "Nein";
}

//Checkboxprüfen "Lieferschein/Rapport"
if (isset($check_liefer_rapport)){
    $check_liefer_rapport = "Ja";
}
else{
    $check_liefer_rapport = "Nein";
}

//Checkboxprüfen "Hardware in Trackit erfasst"
if (isset($check_trackit_erfasst)){
    $check_trackit_erfasst = "Ja";
}
else{
    $check_trackit_erfasst = "Nein";
}

//Checkboxprüfen "Systemdoku/Dokublatt"
if (isset($check_system_doku_blatt)){
    $check_system_doku_blatt = "Ja";
}
else{
    $check_system_doku_blatt = "Nein";
}


class PDF extends FPDF {
    // Kopfzeile
    public function Header()
    {
        // Arial fett 15
        $this->SetFont("Arial","B",15);
        $this -> Cell(9);
        $this -> Cell(62, 5, "PSS-Order Sheet", 0, 0);


        $this->Ln(6);
        $this->SetFont("Arial","", 8);
        $this -> Cell(9);
        $this -> Cell(62, 5, utf8_decode("(PSS-Ordersheet begleitet Material, bei Auftragsende mit Rapport/Lieferschein ins Büro)"), 0, 0);


        $this->Ln(20);

        $this -> SetLineWidth(0.3);
        $this -> Line(20, 25, 191, 25);

        // Logo
        $this->Image("assets/img/Inovatec_Logo.png",150,12,33);
    }

    // Fusszeile
    public function Footer()
    {
        // Position 1,5 cm von unten
        $this->SetY(-15);
        // Arial kursiv 8
        $this->SetFont('Arial','I',8);
        // Seitenzahl
        $this->Cell(0, 10, "Seite " . $this->PageNo() . " von {nb}", 0, 0, "C");
    }
}

//Seite 1-----------------------------------------------------------------------------------------

$pdf = new PDF();

$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('Arial','B',12);

$pdf -> Cell(80);
$pdf -> Cell(30, 0, "Information", 0, 0, "C");
$pdf -> Ln(3);
$pdf -> SetLineWidth(0.5);
$pdf -> Line(80, 38, 130, 38);
$pdf -> SetLineWidth(0.3);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Auftragsnummer: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(20, 10, $auftragsnummer, 0, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Order: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, date("d.m.Y", $order), 0, 0, "L", 0, 0);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, utf8_decode("Zuständig int: "), 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(12, 10, utf8_decode($zustaendig_int), 0, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Termin: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, date("d.m.Y", $termin), 0, 0, "L", 0, 0);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, utf8_decode("Zuständig ext: "), 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(44, 10, utf8_decode($zustaendig_ext), 0, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Kunde: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($kunde), 0, 0, "L", 0, 0);
$pdf -> Ln(15);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Material: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(66, 10, utf8_decode($material), 0, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Produktnummer: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $produktnummer, 0, 0, "L", 0, 0);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Seriennummer: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $seriennummer, 0, 0, "L", 0, 0);
$pdf -> Ln(15);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(80);
$pdf -> Cell(30, 0, "To Do", 0, 0, "C");
$pdf -> Ln(3);
$pdf -> SetLineWidth(0.5);
$pdf -> Line(80, 111, 130, 111);
$pdf -> SetLineWidth(0.3);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Betriebssystem: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $betriebssystem, 0, 0, "L", 0, 0);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Edition: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $edition_betriebsys, 0, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Architektur: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $architektur, 0, 0, "L", 0, 0);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Sprache: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($sprache), 0, 0, "L", 0, 0);
$pdf -> Ln(15);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Office: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $office, 0, 0, "L", 0, 0);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Edition: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $edition_office, 0, 0, "L", 0, 0);
$pdf -> Ln(15);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Vierenschutz: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $vierenschutz, 0, 0, "L", 0, 0);
$pdf -> Ln(15);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(40, 10, "Vorhandenes Image: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($vorh_image), 0, 0, "L", 0, 0);

$pdf -> Cell(5);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Image erstellen: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($image_erst), 0, 0, "L", 0, 0);
$pdf -> Ln(15);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, utf8_decode("Datenübernahme: "), 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($textarea_datenuebernahme1), 0, 0, "L", 0, 0);
$pdf -> Ln(35);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, utf8_decode("Zusatzaufträge: "), 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($textarea_zusatzauftraege1), 0, 0, "L", 0, 0);
$pdf -> Ln(15);

//Seite 1 Ende-------------------------------------------------------------------------------------
//Seite 2------------------------------------------------------------------------------------------

$pdf -> AddPage();

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(80);
$pdf -> Cell(30, 0, utf8_decode("Weitere Arbeiten"), 0, 0, "C");
$pdf -> Ln(3);
$pdf -> SetLineWidth(0.5);
$pdf -> Line(80, 38, 130, 38);
$pdf -> SetLineWidth(0.3);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, utf8_decode("Geräteprüfung: "), 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $check_geraetepruefung, 0, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, "Kommentar: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($textarea_geraetepruefung), 0, 0, "L", 0, 0);
$pdf -> Ln(20);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, utf8_decode("Hardware Reparatur: "), 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $check_hardware_reparatur, 0, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, "Case ID: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $case_id, 0, 0, "L", 0, 0);

$pdf -> Cell(5);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(38, 10, "Termin Techniker: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, date("d.m.Y", $termin_techniker), 0, 0, "L", 0, 0);
$pdf -> Ln(15);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, utf8_decode("Entsorgung Altgerät: "), 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $check_entsorgung_altgeraet, 0, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, "Kommentar: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($textarea_entsorgung_altgeraet), 0, 0, "L", 0, 0);
$pdf -> Ln(20);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(80);
$pdf -> Cell(30, 0, "Signierung", 0, 0, "C");
$pdf -> Ln(3);
$pdf -> SetLineWidth(0.5);
$pdf -> Line(80, 127, 130, 127);
$pdf -> SetLineWidth(0.3);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, "Lieferschein/Rapport: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $check_liefer_rapport, 0, 0, "L", 0, 0);

$pdf -> Cell(5);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(55, 10, "Hardware in Trackit erfasst: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(20, 10, $check_trackit_erfasst, 0, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, "Systemdoku/Dokublatt: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $check_system_doku_blatt, 0, 0, "L", 0, 0);
$pdf -> Ln(15);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, "Signiert am: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, date("d.m.Y", $datum_signierung), 0, 0, "L", 0, 0);

$pdf -> Cell(5);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(38, 10, "Signiert von: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, $signatur_bearbeiter, 0, 0, "L", 0, 0);
$pdf -> Ln(15);
$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(45, 10, "Kommentar: ", 0, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($textarea_signatur), 0, 0, "L", 0, 0);
$pdf -> Ln(20);

//Seite 2 Ende-------------------------------------------------------------------------------------
$pdf -> Output();

?>