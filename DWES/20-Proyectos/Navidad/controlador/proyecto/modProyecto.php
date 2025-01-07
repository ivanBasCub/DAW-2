<?php

    include "../../config/funciones/conexionBBDD.php";
    include "../../config/funciones/funcionesProyecto.php";
    $con = connectBBDD();

    function prepareData($con,$sql,$data,$logo,$pdf,$case){
        $stmt = $con->prepare($sql);
        switch($case){
            case 1:
                $stmt->bindValue(":titulo", $data["titulo"], PDO::PARAM_STR);
                $stmt->bindValue(":descripcion", $data["descripcion"], PDO::PARAM_STR);
                $stmt->bindValue(":periodo", $data["periodo"], PDO::PARAM_STR);
                $stmt->bindValue(":curso", $data["curso"], PDO::PARAM_STR);
                $stmt->bindValue(":fecha", $data["fecha"], PDO::PARAM_STR);
                $stmt->bindValue(":nota", $data["nota"], PDO::PARAM_STR);
                $stmt->bindValue(":modulo1", $data["mod1"], PDO::PARAM_INT);
                $stmt->bindValue(":modulo2", $data["mod2"], PDO::PARAM_INT);
                $stmt->bindValue(":modulo3", $data["mod3"], PDO::PARAM_INT);
                $stmt->bindValue(":alumno", $data["alumno"], PDO::PARAM_INT);
                $stmt->bindValue(":tutor", $data["tutor"], PDO::PARAM_INT);
                $stmt->bindValue(":id", $data["id"], PDO::PARAM_INT);

                if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == UPLOAD_ERR_OK) {
                    $stmt->bindValue(":logotipo", file_get_contents($_FILES["logo"]["tmp_name"]), PDO::PARAM_LOB);
                } else {
                    $stmt->bindValue(":logotipo", $logo, PDO::PARAM_STR);
                }
    
                if (isset($_FILES["pdf"]) && $_FILES["pdf"]["error"] == UPLOAD_ERR_OK) {
                    $stmt->bindValue(":pdf", pdf_conversion($con, $_FILES, $_POST), PDO::PARAM_STR);
                } else {
                    $stmt->bindValue(":pdf", $pdf, PDO::PARAM_STR);
                }
            break;
            case 2:
                $stmt->bindValue(":nota", $data["nota"], PDO::PARAM_STR);
                $stmt->bindValue(":id", $data["id"], PDO::PARAM_INT);
            break;
        }
        

        return $stmt;
    }

    if(isset($_POST["enviar"])){
        // Preparamos las consultas para actualizar los datos del proyecto
        $sql = "update proyecto set titulo = :titulo, descripcion = :descripcion, periodo = :periodo, curso = :curso, fecha_presentacion = :fecha, nota = :nota, logotipo = :logotipo, pdf = :pdf, modulo1 = :modulo1, modulo2 = :modulo2, modulo3 = :modulo3, alumno = :alumno, tutor = :tutor where id_proyecto = :id";
        $sqlNota = "update proyecto set nota = :nota where id_proyecto = :id";
        $sqlData = "select logotipo, pdf from proyecto where id_proyecto = :id";
        // Comprobamos que los datos se han enviado correctamente
        try{
            if(isset($_POST["enviar"])){

                $stmtData = $con->prepare($sqlData);
                $stmtData->bindValue(":id", $_POST["id"], PDO::PARAM_INT);
                $stmtData -> setFetchMode(PDO::FETCH_OBJ);
                $stmtData->execute();
                $data = $stmtData->fetch();
                $pdf = $data->pdf;
                $logo = $data->logotipo;

                if($_POST["type"] == 1){
                    $stmt = prepareData($con,$sql,$_POST,$logo,$pdf,1);
                }else{
                    $stmt = prepareData($con,$sql,$_POST,$logo,$pdf,2);
                }
                    
                

                if($stmt -> execute()){
                    echo "Se ha realizado correctamente la consulta";
                    header("Location: ../../vista/proyecto/index.php");
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
?>