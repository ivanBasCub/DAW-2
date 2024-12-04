<?php

require "../../fpdf/fpdf.php";

class PDF extends FPDF{
    
    // Cabecera
    function Header(){
        $this -> Image('logo.jpg',10,8,33);

        $this -> SetFont("Arial","B",12);

        $this -> Cell(30,10,"Encabezado",1,0,'C');
        $this -> Ln(100);
    }

    function Footer(){
        $this -> SetY(-10);
        $this -> SetFont("Arial","I",8);
        $this -> Cell(0,10,"Pie de Pagina",$this -> PageNo(),"{nb}",0,0,"C");
        // Enlace del pdf
        $link = $this -> AddLink();
        $this -> SetLink($link);
    }
}

// Creacion del objeto de la clase
$pdf = new PDF();


$file = fopen("listadoPersonas.txt","r");
while(!feof($file)){
    $pdf -> AddPage();
    $pdf -> SetFont("Times","",12);
    $linea = fgets($file);
    $pdf -> Cell(30,10,$linea,0,1,'C');
    $linea = fgets($file);
    $pdf -> Cell(30,10,$linea,0,1,'C');
    $linea = fgets($file);
    $pdf -> Cell(30,10,$linea,0,1,'C');
}

fclose($file);


$pdf -> Output();