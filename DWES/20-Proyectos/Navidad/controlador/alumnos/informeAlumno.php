<?php
    // Librerias y archivos necesarios
    include '../../config/funciones/fpdf/fpdf.php';
    include '../../config/funciones/conexionBBDD.php';

    // Creamos una clase que hereda de FPDF
    class PDF extends FPDF{

        // Cabecera
        function Header(){
            $this -> SetFont("Arial","B",18);
            $this -> Cell(150,10,"Informe de Alumnos",1,0,'C');
            $this -> Ln(20);
        }
        
    }

    // Funciones
    function dataAlumnos($pdf,$alumno){
        $pdf -> AddPage();
        $pdf -> SetFont("Arial","",10);
        $pdf -> Cell(95,10,"DNI: ".$alumno -> dni,1,1,'C');
        $pdf -> Cell(95,10,"Nombre: ".$alumno -> nombre,1,0,'C');
        $pdf -> Cell(95,10,"Apellidos: ". $alumno -> apellido1 . " " . $alumno -> apellido2,1,1,'C');
        $pdf -> Cell(95,10,"Correo Electronico: ". $alumno -> email,1,0,'C');
        $pdf -> Cell(95,10,"Telefono: ". $alumno -> telefono,1,1,'C');
        $pdf -> Cell(95,10,"Curso: ". $alumno -> curso,1,0,'C');
    }

    // Nos unimos a la sesion para recoger informacion sobre el tutor
    session_start();

    // Creamos una conexion a la Base de Datos
    $con = connectBBDD();

    try{

        // Creamos un objeto PDF
        $pdf = new PDF();

        if($_SESSION["type"] == 1){
            // Preparamos la consulta sql
            $sql = "select * from alumnos";
            $stmt = $con -> prepare($sql);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);

            if($stmt -> execute()){
                $alumnos = $stmt -> fetchAll();
                // Imprimimos los datos de los alumnos en cada pagina
                foreach($alumnos as $alumno){
                    dataAlumnos($pdf,$alumno);
                }

            }
        }else{
            $sqlAlumnos = "select distinct alumno from proyecto where tutor = :id";
            $sql = "select * from alumnos where id_alumn = :id";
            $stmtAlumnos = $con -> prepare($sqlAlumnos);
            $stmtAlumnos -> setFetchMode(PDO::FETCH_OBJ);
            $stmtAlumnos -> bindValue(":id",$_SESSION["id"],PDO::PARAM_INT);

            if($stmtAlumnos -> execute()){
                $alumnos = $stmtAlumnos -> fetchAll();
                foreach($alumnos as $alumno){
                    $stmt = $con -> prepare($sql);
                    $stmt -> setFetchMode(PDO::FETCH_OBJ);
                    $stmt -> bindValue(":id",$alumno -> alumno,PDO::PARAM_INT);
                    $stmt -> execute();
                    $alumno = $stmt -> fetch();
                    dataAlumnos($pdf,$alumno);
                }
            }
        }

        // Cerramos la conexion
        $con = null;

        // Mostramos el pdf
        $routepdf = "../../data/informes/". $_SESSION["id"] . "_" . $_SESSION["user"] . "_Alumnos_" . time(). ".pdf";
        echo $routepdf;
        $pdf -> Output("F", $routepdf);
        header("Location: $routepdf");
    }catch(PDOException $e){
        echo "Error: " . $e -> getMessage();
    }

?>
