<?php
        include '../../config/funciones/fpdf/fpdf.php';
        include '../../config/funciones/conexionBBDD.php';

        class PDF extends FPDF{

            // Cabecera
            function Header(){
                $this -> SetFont("Arial","B",18);
                $this -> Cell(150,10,"Informe de Tutores",1,0,'C');
                $this -> Ln(20);
            }
            
        }

        // Funciones 
        function dataTutores($pdf,$tutor){
            $pdf -> AddPage();
            $pdf -> SetFont("Arial","",10);
            $pdf -> Cell(95,10,"Nombre: ".$tutor -> nombre,1,1,'C');
            $pdf -> Cell(95,10,"Apellidos: ".$tutor -> apellidos,1,0,'C');
            $pdf -> Cell(95,10,"Correo Electronico: ".$tutor -> correo,1,1,'C');
            $pdf -> Cell(95,10,"Nombre de Usuario: ".$tutor -> login,1,0,'C');
            if($tutor -> baja == 1){
                $pdf -> Cell(95,10,"El Tutor esta dado de baja",1,1,'C');
            }else{
                $pdf -> Cell(95,10,"El Tutor no esta dado de baja",1,1,'C');
            }
            if($tutor -> activar == 1){
                $pdf -> Cell(95,10,"Activado",1,0,'C');
            }else{
                $pdf -> Cell(95,10,"Desactivado",1,0,'C');
            }
        }

        // MAIN
        // Nos unimos a la sesion para recoger información sobre el usuario
        session_start();

        // Creamos la conexion a la Base de Datos
        $con = connectBBDD();

        $pdf = new PDF();
        try{
            // Preparamos la consulta sql
            $sql = "select * from tutores where tipo_usu = 2";
            $stmt = $con -> prepare($sql);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            
            if($stmt -> execute()){
                $tutores = $stmt -> fetchAll();
                foreach($tutores as $tutor){
                    dataTutores($pdf,$tutor);
                }
            }


            // Cerramos la conexion 
            $con = null;

            // Preparamos la ruta del pdf y lo mostramos
            $routepdf = "../../data/informes/". $_SESSION["id"] . "_" . $_SESSION["user"] . "_Tutores_" . time(). ".pdf";
            echo $routepdf;
            $pdf -> Output("F", $routepdf);
            header("Location: $routepdf");

        }catch(PDOException $e){
            echo "Error: " . $e -> getMessage();
        }
        