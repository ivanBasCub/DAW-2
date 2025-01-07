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
// Comprobamos si el usuario es un tutor
startHtmlTables("../static/css/index.css",2);
?>

<form method="post" action="../../controlador/proyecto/modProyecto.php" enctype='multipart/form-data'>
    <?php
        renderFormMod($_GET["id"],$_SESSION["type"]);
    ?>
</form>

<a href="index.php" class="btn">Volver a la página principal</a>
<?php

endHtml();
?>