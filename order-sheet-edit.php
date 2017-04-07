<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 31.03.2017
 * Time: 10:21
 */

//Datenbanverbindung
require ("includes/db-connection.php");

//Datenbankabfrage
require ("includes/db-order-sheet-edit-query.php");

//Datenbank schreiben
require ("includes/db-order-sheet-edit-write.php");

?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>PSS Order Sheet</title>

    <!-- Bootstrap -->
    <link href="assets/lib/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/custom.css" rel="stylesheet">


    <!-- Unterstützung für Media Queries und HTML5-Elemente in IE8 über HTML5 shim und Respond.js -->
    <!-- ACHTUNG: Respond.js funktioniert nicht, wenn du die Seite über file:// aufrufst -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid">
    <?php include ("header.php")?>
    <div class="row">
        <div class="row-div">
            <!--Leeres Div für die Unterstützung des zentrieren vom Div "form-well"-->
            <div class="col-md-4 form-well"></div>
            <div class="col-md-4 form-well">
                <div class="well">
                    <h1 class="form-title">PSS - Order Sheet</h1>
                    <h4 class="form-second-title">(PSS-Ordersheet begleitet Material, bei Auftragsende mit Rapport/Lieferschein ins Büro)</h4><br>

                    <form class="form-inline"  method="post">
                        <div class="row">
                            <div class="row-div">
                                <!--Fieldset-Information-->
                                <fieldset disabled class="fieldset">
                                    <legend>Information</legend>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            Order<br>
                                            <label class="sr-only" for="order">Order</label>
                                            <input type="date" class="form-control" id="order" value="<?php echo $order; ?>">
                                        </div>
                                        <div class="form-group">
                                            Auftragsnummer<br>
                                            <label class="sr-only" for="auftragsnummer">Auftragsnummer</label>
                                            <input type="date" class="form-control" id="auftragsnummer" value="<?php echo $auftragsnummer; ?>">
                                        </div><br><br>
                                        <div class="form-group">
                                            Termin<br>
                                            <label class="sr-only" for="termin">Termin</label>
                                            <input type="date" class="form-control" id="termin" value="<?php echo $termin; ?>">
                                        </div>
                                        <div class="form-group">
                                            Bearbeiter<br>
                                            <select class="form-control col-lg-3" id="bearbeiter">
                                                <option><?php echo $bearbeiter; ?></option>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            Zuständig int<br>
                                            <select class="form-control" id="zust-int">
                                                <option><?php echo $zustaendig_int; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            Zuständig ext<br>
                                            <label class="sr-only" for="zust-ext">Zuständig ext</label>
                                            <input type="text" class="form-control" id="zust-ext" value="<?php echo $zustaendig_ext; ?>">
                                        </div><br><br>
                                        <div class="form-group">
                                            Kunde<br>
                                            <label class="sr-only" for="kunde">Kunde</label>
                                            <input type="text" class="form-control" id="kunde" value="<?php echo $kunde; ?>">
                                        </div><br><br>
                                    </div><!--/.col-md-8-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            Material<br>
                                            <label class="sr-only" for="material">Material</label>
                                            <input type="text" class="form-control" id="material" value="<?php echo $material; ?>">
                                        </div><br><br>
                                        <div class="form-group">
                                            Produktnummer<br>
                                            <label class="sr-only" for="produktnummer">Produktnummer</label>
                                            <input type="text" class="form-control" id="produktnummer" value="<?php echo $produktnummer; ?>">
                                        </div><br><br>
                                        <div class="form-group">
                                            Seriennummer<br>
                                            <label class="sr-only" for="seriennummer">Seriennummer</label>
                                            <input type="text" class="form-control" id="seriennummer" value="<?php echo $seriennummer; ?>">
                                        </div><br><br>
                                    </div><!--/.col-md-4-->
                                </fieldset><!--/Information-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="row-div">
                                <!--Fieldset-TO DO-->
                                <fieldset disabled class="fieldset">
                                    <legend>To Do</legend>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            Betriebssystem<br>
                                            <select class="form-control" id="betriebssystem">
                                                <option><?php echo $betriebssystem; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            Edition<br>
                                            <select class="form-control" id="edition-betriebsys">
                                                <option><?php echo $edition_betriebsys; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            Architektur<br>
                                            <select class="form-control" id="architektur">
                                                <option><?php echo $architektur; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            Sprache<br>
                                            <select class="form-control" id="sprache">
                                                <option><?php echo $sprache; ?></option>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            Office<br>
                                            <select class="form-control" id="office">
                                                <option><?php echo $office; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            Edition<br>
                                            <select class="form-control" id="edition-office">
                                                <option><?php echo $edition_office; ?></option>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            Vierenschutz<br>
                                            <select class="form-control" id="vierenschutz">
                                                <option><?php echo $vierenschutz; ?></option>
                                            </select>
                                        </div><br><br>
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        Vorhandenes Image<br>
                                                        <label class="sr-only" for="vorh-image">Vorhandenes Image</label>
                                                        <input type="text" class="form-control" id="vorh-image" value="<?php echo $vorh_image; ?>">
                                                    </div><br><br>
                                                    <div class="form-group">
                                                        Image erstellen auf<br>
                                                        <label class="sr-only" for="image-erst">Image erstellen auf</label>
                                                        <input type="text" class="form-control" id="image-erst" value="<?php echo $image_erst; ?>">
                                                    </div><br><br>
                                                </div><!--/.col-md-6-->
                                                <div class="col-md-6">
                                                    Datenübernahme<br>
                                                    <textarea class="form-control textarea-datenuebernahme2" id="textarea-datenuebernahme2" rows="1" placeholder="<?php echo $textarea_datenuebernahme1; ?>"></textarea><br><br>
                                                </div><!--/.col-md-6-->
                                        </div><!--/.row-->
                                        <div class="form-group">
                                            Zusatzaufträge<br>
                                            <label class="sr-only" for="zusatzauftraege1">Zusatzaufträge</label>
                                            <input type="text" class="form-control" id="zusatzauftraege1" value="<?php echo $zusatzauftraege; ?>">
                                        </div><br><br>
                                    </div><!--/.col-md-12-->
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row-div">
                                <!--Fieldset-Weitere Arbeiten-->
                                <fieldset class="fieldset">
                                    <legend>Weitere Arbeiten</legend>
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"  id="check-geraetepruefung" name="check-geraetepruefung" value="">
                                                Geräteprüfung
                                            </label>
                                        </div>
                                        <textarea class="form-control textarea-geraetepruefung" id="textarea-geraetepruefung" name="textarea-geraetepruefung" rows="1" placeholder="Info"></textarea><br><br>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="check-hardware-reparatur" id="check-hardware-reparatur" value="">
                                                Hardware Reparatur
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="case-id">Case ID</label>
                                            <input type="text" class="form-control" id="case-id" name="case-id" placeholder="Case ID">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="termin-techniker">Termin Techniker</label>
                                            <input type="date" class="form-control" id="termin-techniker" name="termin-techniker" placeholder="Termin Techniker">
                                        </div><br><br>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="check-entsorgung-altgeraet" id="check-entsorgung-altgeraet" value="">
                                                Entsorgung von Altgerät
                                            </label>
                                        </div>
                                        <textarea class="form-control" id="textarea-entsorgung-altgeraet" rows="1" placeholder="Info"></textarea><br><br>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row-div">
                                <!--Fieldset-Signierung-->
                                <fieldset class="fieldset">
                                    <legend>Signierung</legend>
                                    <div class="col-md-12 arbeiten-checkboxen">
                                        <div class="checkbox">
                                            <label class="checkbox-reihe-signierung">
                                                <input type="checkbox" id="check-liefer-rapport" name="check-liefer-rapport" value="">
                                                Lieferschein/Rapport
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox-reihe-signierung">
                                                <input type="checkbox" id="check-trackit-erfasst" name="check-trackit-erfasst" value="">
                                                Hardware in Trackit erfasst
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox-reihe-signierung">
                                                <input type="checkbox"  id="check-system-doku-blatt" name="check-system-doku-blatt" value="">
                                                Systemdoku/Dokublatt
                                            </label>
                                        </div>
                                    </div><!--./col-md-12-->
                                    <div class="form-group">
                                        <label class="sr-only" for="datum-signierung">Datum</label>
                                        <input type="hidden" class="form-control" id="datum-signierung" name="datum-signierung" placeholder="Datum">
                                    </div><br><br>
                                    <div class="form-group">
                                        <select class="form-control" id="signatur-bearbeiter" name="signatur-bearbeiter">
                                            <option class="option-title" value="">Bearbeiter</option>
                                            <?php foreach($abfrage2 AS $row): ?>
                                                <option><?php echo $row["username"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <textarea class="form-control" id="textarea-signatur" name="textarea-signatur" rows="1" placeholder="Info"></textarea><br><br><br>


                                    <div class="buttons-form">
                                        <button type="submit" class="btn btn-default form-submit">Signieren</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>


                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div><!--/.well-->
            </div>
            <!--Leeres Div für die Unterstützung des zentrieren vom Div "form-well"-->
            <div class="col-md-4 form-well"></div>
        </div><!--/.row-div-->
    </div><!--/.row-->
    <?php include ("footer.php")?>
</div><!--/.container-fluid-->

<!-- jQuery -->
<script type="text/javascript" src="assets/lib/jquery"></script>
<!-- jQuery UI -->
<script type="text/javascript" src="assets/lib/jquery-ui"></script>
<script type="text/javascript" src="assets/js/add-formfield.js"></script>
<script type="text/javascript" src="assets/js/custom-jquery.js"></script>
<!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
<script src="assets/lib/bootstrap/js/bootstrap.js"></script>
</body>
</html>
