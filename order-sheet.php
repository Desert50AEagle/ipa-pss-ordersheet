<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 29.03.2017
 * Time: 15:49
 */

//Datenbanverbindung
require ("includes/db-connection.php");

//Datenbankabfrage
require ("includes/db-order-sheet-query.php");

//Objekt Datum erstellen
$today = new DateTime();
$today ->getTimestamp();


//Datenbank schreiben
require ("includes/db-order-sheet-write.php");


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

                    <form class="form-inline" action="order-sheet.php" method="post">
                        <div class="form-group">
                            <label class="sr-only" for="order">Order</label>
                            <input type="text" class="form-control" id="order" name="order" value="1491396993" placeholder="<?php echo $today ->getTimestamp(); ?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="auftragsnummer">Auftragsnummer</label>
                            <input type="text" class="form-control" id="auftragsnummer" name="auftragsnummer" placeholder="Auftragsnummer">
                        </div>
                        <div class="row">
                            <div class="row-div">
                                <!--Fieldset-Information-->
                                <fieldset class="fieldset">
                                    <legend>Information</legend>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="sr-only" for="termin">Termin</label>
                                            <input type="date" class="form-control" id="termin" name="termin" placeholder="Termin">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control col-lg-3" id="bearbeiter" name="bearbeiter">
                                                <option class="option-title" value="">Bearbeiter</option>
                                                <?php foreach($abfrage1 AS $row): ?>
                                                    <option><?php echo $row["username"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            <select class="form-control" id="zust-int" name="zust-int">
                                                <option class="option-title" value="">Zuständig int</option>
                                                    <?php foreach($abfrage1 AS $row): ?>
                                                        <option><?php echo $row["username"]; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="zust-ext">Zuständig ext</label>
                                            <input type="text" class="form-control" id="zust-ext" name="zust-ext" placeholder="Zuständig ext">
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="sr-only" for="kunde">Kunde</label>
                                            <input type="text" class="form-control" id="kunde" name="kunde" placeholder="Kunde">
                                        </div><br><br>
                                    </div><!--/.col-md-8-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="sr-only" for="material">Material</label>
                                            <input type="text" class="form-control" id="material" name="material" placeholder="Material">
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="sr-only" for="produktnummer">Produktnummer</label>
                                            <input type="text" class="form-control" id="produktnummer" name="produktnummer" placeholder="Produktnummer">
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="sr-only" for="seriennummer">Seriennummer</label>
                                            <input type="text" class="form-control" id="seriennummer" name="seriennummer" placeholder="Seriennummer">
                                        </div><br><br>
                                    </div><!--/.col-md-4-->
                                </fieldset><!--/Information-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="row-div">
                                <!--Fieldset-TO DO-->
                                <fieldset class="fieldset">
                                    <legend>To Do</legend>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" id="betriebssystem" name="betriebssystem">
                                                <option class="option-title" value="">Betriebssystem</option>
                                                <?php foreach($abfrage2 AS $row): ?>
                                                    <option><?php echo $row["betriebssystem"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="edition-betriebsys" name="edition-betriebsys">
                                                <option class="option-title" value="">Edition</option>
                                                <?php foreach($abfrage3 AS $row): ?>
                                                    <option><?php echo $row["betriebssystem_edition"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="architektur" name="architektur">
                                                <option class="option-title" value="">Architektur</option>
                                                <?php foreach($abfrage4 AS $row): ?>
                                                    <option><?php echo $row["architektur"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="sprache" name="sprache">
                                                <option class="option-title" value="">Sprache</option>
                                                <?php foreach($abfrage5 AS $row): ?>
                                                    <option><?php echo utf8_encode($row["sprache"]); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            <select class="form-control" id="office" name="office">
                                                <option class="option-title" value="">Office</option>
                                                <?php foreach($abfrage6 AS $row): ?>
                                                    <option><?php echo $row["office"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="edition-office" name="edition-office">
                                                <option class="option-title" value="">Edition</option>
                                                <?php foreach($abfrage7 AS $row): ?>
                                                    <option><?php echo $row["office_edition"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div><br><br>
                                        <div class="form-group">
                                            <select class="form-control" id="vierenschutz" name="vierenschutz">
                                                <option class="option-title" value="">Virenschutz</option>
                                                <?php foreach($abfrage8 AS $row): ?>
                                                    <option><?php echo $row["virenschutz"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div><br><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="sr-only" for="vorh-image">Vorhandenes Image</label>
                                                    <input type="text" class="form-control" id="vorh-image" name="vorh-image" placeholder="Vorhandenes Image">
                                                </div><br><br>
                                                <div class="form-group">
                                                    <label class="sr-only" for="image-erst">Image erstellen auf</label>
                                                    <input type="text" class="form-control" id="image-erst" name="image-erst" placeholder="Image erstellen auf">
                                                </div><br><br>
                                            </div><!--/.col-md-6-->
                                            <div class="col-md-6">
                                                <textarea class="form-control textarea-datenuebernahme1" id="textarea-datenuebernahme1" name="textarea-datenuebernahme1" rows="1" placeholder="Datenübernahme"></textarea><br><br>
                                            </div><!--/.col-md-6-->
                                        </div><!--/.row-->
                                        <div class="form-group">
                                            <label class="sr-only" for="zusatzauftraege">Zusatzaufträge</label>
                                            <input type="text" class="form-control" id="zusatzauftraege" name="zusatzauftraege" placeholder="Zusatzaufträge">
                                        </div><br><br>
                                        <div class="buttons-form">
                                            <button type="submit" class="btn btn-default form-submit">Auftrag erstellen</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div><!--/.col-md-12-->
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
<!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
<script src="assets/lib/bootstrap/js/bootstrap.js"></script>
</body>
</html>
