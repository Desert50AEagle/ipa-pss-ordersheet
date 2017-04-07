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

class PDF extends FPDF {
    // Kopfzeile
    public function Header()
    {
        // Arial fett 15
        $this->SetFont("Arial","B",15);
        $this -> Cell(9);
        $this -> Cell(62, 5, "PSS-Order Sheet", 0, 0);

        // Zeilenumbruch
        $this->Ln(6);
        $this->SetFont("Arial","", 8);
        $this -> Cell(9);
        $this -> Cell(62, 5, utf8_decode("(PSS-Ordersheet begleitet Material, bei Auftragsende mit Rapport/Lieferschein ins Büro)"), 0, 0);

        // Zeilenumbruch
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
$pdf -> Ln(2);
$pdf -> SetLineWidth(0.5);
$pdf -> Line(80, 38, 130, 38);
$pdf -> SetLineWidth(0.3);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Auftragsnummer: ", 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(20, 10, utf8_decode($auftragsnummer), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(19, 10, "Order: ", 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(23, 10, utf8_decode($order), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(28, 10, utf8_decode("Zuständig ext: "), 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(44, 10, utf8_decode($zustaendig_ext), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(28, 10, utf8_decode("Zuständig int: "), 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(12, 10, utf8_decode($zustaendig_int), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(19, 10, "Termin: ", 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(23, 10, utf8_decode($termin), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(28, 10, utf8_decode("Kunde: "), 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(44, 10, utf8_decode($kunde), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(19, 10, "Material: ", 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(66, 10, utf8_decode($material), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Produktnummer: ", 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($produktnummer), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Seriennummer: ", 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(45, 10, utf8_decode($seriennummer), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> SetFont('Arial','BU',12);
$pdf -> Cell(80);
$pdf -> Cell(30, 0, "To Do", 0, 0, "C");
$pdf -> Ln(2);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(35, 10, "Betriebssystem: ", 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(33, 10, utf8_decode($betriebssystem), 1, 0, "L", 0, 0);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(17, 10, "Edition: ", 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(32, 10, utf8_decode($edition_betriebsys), 1, 0, "L", 0, 0);
$pdf -> Ln(10);

$pdf -> Cell(10);
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(25, 10, "Architektur: ", 1, 0, "L", 0, 0);
$pdf -> SetFont("", "I");
$pdf -> Cell(1);
$pdf -> Cell(15, 10, utf8_decode($architektur), 1, 0, "L", 0, 0);

$pdf -> Ln(10);

//Seite 1 Ende-------------------------------------------------------------------------------------
//Seite 2------------------------------------------------------------------------------------------

$pdf -> AddPage();
$pdf -> SetFont("Times", "", 12);


//Seite 2 Ende-------------------------------------------------------------------------------------
$pdf -> Output();

?>