<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 31.03.2017
 * Time: 10:21
 */

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

                    <form class="form-inline" method="post">
                        <div class="row">
                            <div class="row-div">
                                <!--Fieldset-Information-->
                                <fieldset disabled class="fieldset">
                                    <legend>Information</legend>
                                    <div class="form-group">
                                        <label class="sr-only" for="order">Order</label>
                                        <input type="hidden" class="form-control" id="order" placeholder="Order">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="sr-only" for="termin">Termin</label>
                                            <input type="date" class="form-control" id="termin" placeholder="Termin">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control col-lg-3" id="bearbeiter">
                                                <option>Bearbeiter</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            <select class="form-control" id="zust-int">
                                                <option>Zuständig int</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="zust-ext">Zuständig ext</label>
                                            <input type="text" class="form-control" id="zust-ext" placeholder="Zuständig ext">
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="sr-only" for="kunde">Kunde</label>
                                            <input type="text" class="form-control" id="kunde" placeholder="Kunde">
                                        </div><br><br>
                                    </div><!--/.col-md-8-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="sr-only" for="material">Materiel</label>
                                            <input type="text" class="form-control" id="material" placeholder="Material">
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="sr-only" for="produktnummer">Produktnummer</label>
                                            <input type="text" class="form-control" id="produktnummer" placeholder="Produktnummer">
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="sr-only" for="seriennummer">Seriennummer</label>
                                            <input type="text" class="form-control" id="seriennummer" placeholder="Seriennummer">
                                        </div><br><br>
                                    </div><!--/.col-md-4-->
                                </fieldset><!--/Information-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="row-div">
                                <!--Fieldset-TO DO-->
                                <fieldset disabled class="fieldset">
                                    <legend>TO DO</legend>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" id="betriebssystem">
                                                <option>Betriebssystem</option>
                                                <option>Windows</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="edition-betriebsys">
                                                <option>Edition</option>
                                                <option>Professional</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="architektur">
                                                <option>Architektur</option>
                                                <option>32</option>
                                                <option>64 Bit</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="sprache">
                                                <option>Sprache</option>
                                                <option>Deutsch</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            <select class="form-control" id="office">
                                                <option>Office</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="edition-office">
                                                <option>Edition</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            <select class="form-control" id="vierenschutz">
                                                <option>Vierenschutz</option>
                                                <option>Antivirus</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="sr-only" for="datenuebernahme">Datenübernahme</label>
                                            <input type="text" class="form-control" id="datenuebernahme" placeholder="Datenübernahme">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="vorh-image">Vorhandenes Image</label>
                                            <input type="text" class="form-control" id="vorh-image" placeholder="Vorhandenes Image">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="image-erst">Image erstellen auf</label>
                                            <input type="text" class="form-control" id="image-erst" placeholder="Image erstellen auf">
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="sr-only" for="zusatzauftraege">Zusatzaufträge</label>
                                            <input type="text" class="form-control" id="zusatzauftraege" placeholder="Zusatzaufträge">
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
                                                <input type="checkbox" class="checkrequired" id="check-geraetepruefung"> Geräteprüfung
                                            </label>
                                        </div>
                                        <textarea class="form-control textarea-geraetepruefung" id="textarea-geraetepruefung" rows="1" placeholder="Info"></textarea><br><br>
                                        <div class="radio">
                                            <label>
                                                <input type="checkbox" name="hardware-reparatur" id="hardware-reparatur" value="">
                                                Hardware Reparatur
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="case-id">Case ID</label>
                                            <input type="text" class="form-control" id="case-id" placeholder="Case ID">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="termin-techniker">Termin Techniker</label>
                                            <input type="date" class="form-control" id="termin-techniker" placeholder="Termin Techniker">
                                        </div><br><br>
                                        <div class="radio">
                                            <label>
                                                <input type="checkbox" name="entsorgung-altgeraet" id="entsorgung-altgeraet" value="">
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
                                                <input type="checkbox" id="check-liefer-rapport" value="">
                                                Lieferschein/Rapport
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox-reihe-signierung">
                                                <input type="checkbox" id="check-trackit-erfasst" value="">
                                                Hardware in Trackit erfasst
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox-reihe-signierung">
                                                <input type="checkbox"  id="system-doku-blatt" value="">
                                                Systemdoku/Dokublatt
                                            </label>
                                        </div>
                                    </div><!--./col-md-12-->
                                    <div class="form-group">
                                        <label class="sr-only" for="datum-signierung">Datum</label>
                                        <input type="hidden" class="form-control" id="datum-signierung" placeholder="Datum">
                                    </div><br><br>
                                    <div class="form-group">
                                        <select class="form-control" id="signatur-bearbeiter">
                                            <option>Bearbeiter</option>
                                            <option>KRM</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <textarea class="form-control" id="textarea-signatur" rows="1" placeholder="Info"></textarea><br><br><br>


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
