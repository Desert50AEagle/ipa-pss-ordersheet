<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 29.03.2017
 * Time: 15:47
 */
//Datenbanverbindung
require ("includes/db-connection.php");

//Datenbankabfrage
require ("includes/db-uebersicht-query.php");

//Objekt Datum erstellen
$today = new DateTime();
$today ->getTimestamp();



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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="well">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Auftragsnummer
                                </th>
                                <th>
                                    Termin
                                </th>
                                <th>
                                    Kunde
                                </th>
                                <th>
                                    Zuständig int
                                </th>
                                <th>
                                    Bearbeiter
                                </th>
                                <th>
                                    Aktion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($abfrage AS $row): ?>
                            <tr>
                                <?php if ($row["termin"] > $today): ?>
                                    <td id="status-ok">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </td>
                                <?php else: ?>
                                    <td id="status-alert">
                                        <span class="glyphicon glyphicon-alert"></span>
                                    </td>
                                <?php endif; ?>
                                <td>
                                    <?php echo $row['auftragsnummer']; ?>
                                    <input type="hidden" name="id-auftragsnummer" value="<?php echo $row['auftrag_id']; ?>">
                                </td>
                                <td>
                                    <?php echo date("d.m.Y", $row['termin']); ?>
                                </td>
                                <td>
                                    <?php echo $row['kunde']; ?>
                                </td>
                                <td>
                                    <?php echo $row['zustaendig_int']; ?>
                                </td>
                                <td>
                                    <?php echo $row['bearbeiter']; ?>
                                </td><td>
                                    <div class="btn-group uebersicht-buttons">
                                        <button type="button" class="btn btn-default glyphicon glyphicon-list-alt" data-toggle="tooltip" data-placement="top" title="PDF"></button>
                                        <button type="button" class="btn btn-default glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Bearbeiten"></button>
                                        <button type="button" class="btn btn-default glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Löschen"></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Leeres Div für die Unterstützung des zentrieren vom Div "form-well"-->
            <div class="col-md-2"></div>
        </div>
    </div>
    <?php include ("footer.php")?>
</div>

<!-- jQuery -->
<script type="text/javascript" src="assets/lib/jquery"></script>
<!-- jQuery UI -->
<script type="text/javascript" src="assets/lib/jquery-ui"></script>
<!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
<script src="assets/lib/bootstrap/js/bootstrap.js"></script>
</body>
</html>
