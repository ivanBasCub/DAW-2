<?php

require("../../fpdf/fpdf.php");

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont("Arial","B",16);
$pdf -> Cell(40,10,"Es el PDF del proyecto de Ivan");
// Nombre del fichero y opcion de descarga
$pdf -> Output("proyecto.pdf","D");