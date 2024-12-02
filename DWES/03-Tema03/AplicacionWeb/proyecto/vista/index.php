<?php
    include "../config/funciones.php";
    include "../config/encabezado.php";
    include "../config/pie.php";
    start_html("static/index.css");
?>
<table>
    <thead>
        <th>Titulo</th>
        <th>Descripción</th>
        <th>Periodo</th>
        <th>Curso</th>
        <th>Fecha de Presentación</th>
        <th>Alumno</th>
        <th>Modulos</th>
        <th>Logotipo</th>
        <th>PDF</th>
        <th>Nota</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </thead>
    <?php 
        renderContentTable();
    ?>
</table>
<a href='insertar.php' class='btn'> <img src='img/plus-circle.svg'> Agregar </a>
<?php
    fin_html();
?>