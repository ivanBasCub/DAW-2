<?php
include_once "../config/html/encabezado.php";
include_once "../config/html/pie.php";

// Nos unimos a la sesion
session_start();

// Comprobamos si han logeado en la aplicacion
if(!isset($_SESSION["user"])){
    // Si no se ha autenticado, redirigimos al login
    $error = "Debes autenticarte para acceder a la aplicacion";
    header("Location:index.php?loginIndex=$error");
}
if($_SESSION["type"] != 1){
    // Si no se ha autenticado, redirigimos al login
    $error = "No tienes permisos para acceder a esta pagina";
    header("Location:index_tutor.php?loginIndex=$error");
}
startHtml("static/css/index.css",$_SESSION["type"]);
?>

<div class="menu">
    <a href="alumno/index.php" class="btn-menu">Modificar los Alumnos</a>
    <a href="proyecto/index.php" class="btn-menu">Modificar los Proyectos</a>
    <a href="tutor/index.php" class="btn-menu">Modificar los Tutores</a>
</div>
<?php
endHtml();
?>