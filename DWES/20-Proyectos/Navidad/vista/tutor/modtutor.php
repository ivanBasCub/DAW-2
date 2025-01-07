<?php
include_once "../../config/html/encabezado.php";
include_once "../../config/html/pie.php";
include_once "../../config/funciones/funcionesTutor.php";

// Nos unimos a la sesion
session_start();

// Comprobamos si han logeado en la aplicacion
if(!isset($_SESSION["user"])){
    // Si no se ha autenticado, redirigimos al login
    $error = "Debes autenticarte para acceder a la aplicacion";
    header("Location:index.php?loginIndex=$error");
}

startHtmlTables("../static/css/index.css",3);

formDataTutor($_GET["id"],$_SESSION["type"]);
?>

<?php
endHtml();
?>