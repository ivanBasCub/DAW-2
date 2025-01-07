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
if($_SESSION["type"] != 1){
    // Si no se ha autenticado, redirigimos al login
    $error = "No tienes permisos para acceder a esta pagina";
    header("Location:../index_tutor.php?loginIndex=$error");
}

startHtmlTables("../static/css/index.css",2);
?>

<h2>Introducir un nuevo proyecto</h2>
<form method="post" action="../../controlador/proyecto/insertProyecto.php" enctype="multipart/form-data">
    <input type="text" name="titulo" placeholder="Titulo del proyecto"><br>
    <label>Descripción del proyecto</label><br>
    <textarea name="descripcion"></textarea><br>
    <input type="text" name="periodo" placeholder="Periodo del proyecto"><br>
    <input type="text" name="curso" placeholder="Curso del proyecto"><br>
    <label>Fecha de presentación del proyecto</label><br>
    <input type="date" name="fecha" pattern="\d{4}-\d{2}-\d{2}"><br>
    <input type="number" name="nota" placeholder="Nota del proyecto" min="0"><br>
    <label>Alumno que hace el alumno</label><br>
    <select name="alumno">
        <?php
            select_alumnos();
        ?>
    </select><br>
    <label>Tutor encargado del proyecto</label><br>
    <select name='tutor'>
        <?php
            select_tutores();
        ?>
    </select><br>
    <label>Modulos que esta relacionado el proyecto</label><br>
    <label>Modulo 1:</label>
    <select name="mod1">
        <?php
            select_modulos();
        ?>
    </select><br>
    <label>Modulo 2:</label>
    <select name="mod2">
        <?php
            select_modulos();
        ?>
    </select><br>
    <label>Modulo 3:</label>
    <select name="mod3">
        <?php
            select_modulos();
        ?>
    </select><br>
    <label>Imagen png del logotipo del proyecto</label><br>
    <input type="file" name="logo" accept="image/png" required><br>
    <label>Documentacion del proyecto</label><br>
    <input type="file" name="pdf" accept="file/pdf" required><br>
    <input type="submit" name="enviar" value="Subir Nuevo Proyecto" class="btn"><br>

</form>
    <a href="index.php" class="btn">Volver a la página principal</a>
<?php
    endHtml();
?>