<?php
/**
 * Created by PhpStorm.
 * User: mario.krstic
 * Date: 29.03.2017
 * Time: 16:11
 */

?>
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Titel und Schalter werden für eine bessere mobile Ansicht zusammengefasst -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Navigation ein-/ausblenden</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"> <img id="nav-logo" src="assets/img/Inovatec_Logo.png" alt="INOVATEC AG"></a>
                </div>

                <!-- Alle Navigationslinks, Formulare und anderer Inhalt werden hier zusammengefasst und können dann ein- und ausgeblendet werden -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Übersicht <span class="sr-only">(aktuell)</span></a></li>
                        <li><a href="order-sheet.php">Order Sheet</a></li>
                        <li><a href="info.php">Info</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div><!--/.col-md-12-->
</div><!--/.row-->
