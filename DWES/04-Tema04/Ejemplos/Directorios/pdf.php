<?php

require("");

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont("Arial","B",16);
$pdf -> Cell(40,10,"PDF con generado con PHP y FPDF");
// Nombre del fichero y opcion de descarga
$pdf -> Output("basico.pdf","D");