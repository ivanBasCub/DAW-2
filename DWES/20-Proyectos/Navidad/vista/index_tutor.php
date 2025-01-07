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

startHtml("static/css/index.css",$_SESSION["type"]);

if(isset($_GET["loginIndex"])){
    echo "<h3 class='error'>".$_GET["loginIndex"]."</h3>";
}
?>
<!-- Meter todos los botones que van a redirigir a las diferentes paginas -->
<div class="menu">
    <a href="alumno/index.php" class="btn-menu">Ver Lista de Alumnos</a>
    <a href="proyecto/index.php" class="btn-menu">Ver Lista de Proyectos</a>
    <a href="tutor/index.php" class="btn-menu">Editar tus Datos</a>
</div>
<?php
endHtml();
?>