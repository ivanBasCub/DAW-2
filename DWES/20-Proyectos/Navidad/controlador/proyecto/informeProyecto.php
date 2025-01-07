<?php

    // Librerias y archivos necesarios
    include '../../config/funciones/fpdf/fpdf.php';
    include '../../config/funciones/conexionBBDD.php';

    // Creamos una clase que hereda de FPDF
    class PDF extends FPDF{

        // Cabecera
        function Header(){
            $this -> SetFont("Arial","B",18);
            $this -> Cell(150,10,"Informe de Proyectos",1,0,'C');
            $this -> Ln(20);
        }
        
    }

    // Funciones
    function dataProyecto($pdf,$con,$proyecto,$type){
        $pdf -> AddPage();
        $pdf -> SetFont("Arial","B",10);
        $pdf -> Cell(95,10,"Titulo: " . $proyecto -> titulo,1,1,'C');
        $pdf -> Cell(95,10,"Descripcion: " . $proyecto -> descripcion,1,1,'C');
        $pdf -> Cell(95,10,"Periodo: " . $proyecto -> periodo,1,1,'C');
        $pdf -> Cell(95,10,"Fecha de Presentacion: " . $proyecto -> fecha_presentacion,1,1,'C');
        $pdf -> Cell(95,10,"Nota: " . $proyecto -> nota,1,1,'C');

        // Modulos relacionados con el proyectos
        $pdf -> Cell(95,10,"Modulos: " . moduloName($con,$proyecto -> modulo1) . " / " . moduloName($con,$proyecto -> modulo2) . " / ". moduloName($con,$proyecto -> modulo3),1,1,'C');

        // Ponemos el nombre de alumno en vez del id
        $sqlAlumno = "select nombre from alumnos where id_alumn = :id";
        $stmt = $con -> prepare($sqlAlumno);
        $stmt -> setFetchMode(PDO::FETCH_OBJ);
        $stmt -> bindValue(":id",$proyecto -> alumno,PDO::PARAM_INT);
        

        if($stmt -> execute()){
            $alumno = $stmt -> fetch();
            $pdf -> Cell(95,10,"Alumno: " . $alumno -> nombre,1,1,'C');
        }
        // Ponemos el nombre del tutor solo para los administradores
        if($type == 1){
            $sqlTutor = "select nombre from tutores where id_tutor = :id";
            $stmt = $con -> prepare($sqlTutor);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            $stmt -> bindValue(":id",$proyecto -> tutor,PDO::PARAM_INT);

            if($stmt -> execute()){
                $tutor = $stmt -> fetch();
                $pdf -> Cell(95,10,"Tutor: " . $tutor -> nombre,1,1,'C');
            }
        }
        
        
    }

    // Una funcion para consegir las siglas de los modulos
    function moduloName($con,$id){
        $sql = "select siglas from modulos where id_modulo = :id";
        $stmt = $con -> prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_OBJ);
        $stmt -> bindValue(":id",$id,PDO::PARAM_INT);

        if($stmt -> execute()){
            $modulo = $stmt -> fetch();
            return $modulo -> siglas;
        }else{
            return " ";
        }
    }

    // Main

    // Nos unimos a la sesion 
    session_start();

    // Creamos la conexion a la BBDD
    $con = connectBBDD();

    try{
        // Creamos el archivo PDF
        $pdf = new PDF();
        if($_SESSION["type"] == 1){
            $sql = "select * from proyecto";
            $stmt = $con -> prepare($sql);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);

            if($stmt -> execute()){
                $proyectos = $stmt -> fetchAll();
                // Imprimimos los datos de los proyectos en cada página
                foreach($proyectos as $proyecto){
                    dataProyecto($pdf,$con,$proyecto,$_SESSION["type"]);
                }
            }
        }else{
            $sqlTutores = "select * from proyecto where tutor = :id";
            $stmt = $con -> prepare($sqlTutores);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            $stmt -> bindValue(":id",$_SESSION["id"],PDO::PARAM_INT);

            If($stmt -> execute()){
                $proyectos = $stmt -> fetchAll();
                foreach($proyectos as $proyecto){
                    dataProyecto($pdf,$con,$proyecto,$_SESSION["type"]);
                }
            }
        }

        $con = null;
        // Mostramos el pdf 
        $routepdf = "../../data/informes/". $_SESSION["id"] . "_" . $_SESSION["user"] . "_Proyectos_" . time(). ".pdf";
        $pdf -> Output("F", $routepdf);
        header("Location: $routepdf");
    }catch(PDOException $e){
        echo "Error: " . $e -> getMessage();
    }