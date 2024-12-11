<?php
    include "../config/funciones.php";
    include "../config/encabezado.php";
    include "../config/pie.php";
    start_html("static/index.css");
?>
<table>
    <thead>
        <th>Prenda</th>
        <th>Precio</th>
        <th>Rebajada</th>
        <th>Rebaja</th>
        <th>Precio Rebajado</th>
        <th>Precio Final</th>
        <th>Foto</th>
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

