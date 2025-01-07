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

startHtmlTables("../static/css/index.css",1);
if($_SESSION["type"] == 1){
    echo "<a href='addAlumno.php' class='btn'><img src='../static/img/plus-circle.svg' >Añadir Alumno</a>";
}
?>
<a href="../../controlador/alumnos/informeAlumno.php" class="btn">Crear un formulario</a>
<?php
renderTableAlumnos($_SESSION["type"],$_SESSION["id"]);

endHtml();
?>