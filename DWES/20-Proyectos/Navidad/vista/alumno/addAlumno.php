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

    if(isset($_GET["loginIndex"])){
        echo "<h3 class='error'>".$_GET["loginIndex"]."</h3>";
    }
?>
<form action="../../controlador/alumnos/insertAlumno.php" method="post">
    <label>DNI:</label><br>
    <input type="text" name="dni" required><br>
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>
    <label>Apellido 1:</label><br>
    <input type="text" name="apellido1" required><br>
    <label>Apellido 2:</label><br>
    <input type="text" name="apellido2" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Telefono:</label><br>
    <input type="text" name="telefono" required><br>
    <label>Curso:</label><br>
    <input type="number" name="curso" required><br>
    <input type="submit" value="Añadir Alumno" class="btn"><br>
</form>

<a href="index.php" class="btn">Volver a Alumnos</a>
<?php
    endHtml();
?>