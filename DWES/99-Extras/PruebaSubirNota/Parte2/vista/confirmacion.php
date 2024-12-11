<?php
    include "../config/encabezado.php";
    start_html("static/index.css");
?>
<h2>Estas seguro de eliminar este proyecto?</h2>
<a class="btn" href="index.php">No</a>
<?php
    echo "<a class='btn' href='../controlador/eliminarPDO.php/?id=".$_GET["id"]."'>Si</a>";

    include "../config/pie.php";
    fin_html();
?>