<?php
include_once "../../config/html/encabezado.php";
include_once "../../config/html/pie.php";
include_once "../../config/funciones/funcionesProyecto.php";

// Nos unimos a la sesion
session_start();

// Comprobamos si han logeado en la aplicacion
if(!isset($_SESSION["user"])){
    // Si no se ha autenticado, redirigimos al login
    $error = "Debes autenticarte para acceder a la aplicacion";
    header("Location:index.php?loginIndex=$error");
}

startHtmlTables("../static/css/index.css",2);

if($_SESSION["type"] == 1){
    echo "<a href='insertProyecto.php' class='btn'><img src='../static/img/plus-circle.svg' >Introducir un nuevo proyecto</a>";
}

?>
<a href="../../controlador/proyecto/informeProyecto.php" class="btn">Crear un formulario</a>
<?php
renderTableProyecto($_SESSION["type"],$_SESSION["id"]); 

endHtml();
?>