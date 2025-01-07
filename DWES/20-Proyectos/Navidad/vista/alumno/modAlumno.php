<?php
include_once "../../config/html/encabezado.php";
include_once "../../config/html/pie.php";
include_once "../../config/funciones/funcionesAlumno.php";

// Nos unimos a la sesion
session_start();

// Comprobamos si han logeado en la aplicacion
if(!isset($_SESSION["user"])){
    // Si no se ha autenticado, redirigimos al login
    $error = "Debes autenticarte para acceder a la aplicacion";
    header("Location:../index.php?loginIndex=$error");
}

if($_SESSION["type"] != 1){
    // Si no se ha autenticado, redirigimos al login
    $error = "No tienes permisos para acceder a esta pagina";
    header("Location:../index_tutor.php?loginIndex=$error");
}

startHtmlTables("../static/css/index.css",1);

formModAlumno($_GET["id"]);

endHtml();
?>