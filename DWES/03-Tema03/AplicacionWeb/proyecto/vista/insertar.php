<?php
    include "../config/encabezado.php";
    include "../config/funciones.php";
    include "../config/pie.php";
    start_html("static/index.css");
?>

<h2>Introducir un nuevo proyecto</h2>
<form method="post" action="../controlador/insertarPDO.php" enctype="multipart/form-data">
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
    <label>Modulos que esta relacionado el proyecto</label><br>
    <label>Modulo 1:</label>
    <select name="mod1">
        <?php
            select_modulos();
        ?>
    </select>
    <label>Modulo 2:</label>
    <select name="mod2">
        <?php
            select_modulos();
        ?>
    </select>
    <label>Modulo 3:</label>
    <select name="mod3">
        <?php
            select_modulos();
        ?>
    </select><br>
    <label>Imagen png del lgotipo del proyecto</label><br>
    <input type="file" name="logo" accept="image/png"><br>
    <button class="btn">Subir Nuevo Proyecto</button>
</form>
    <a href="index.php" class="btn">Volver a la página principal</a>
<?php
    fin_html();
?>