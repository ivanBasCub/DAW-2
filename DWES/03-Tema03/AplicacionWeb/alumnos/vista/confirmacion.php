<?php
        include "../config/conexion.php";
        include "../config/encabezado.php";
        include "../config/pie.php";

        start_html("../static/index.css");
            echo "<h2>¿Estás seguro de eliminar este registro?</h2>";
            echo "<a href='../index.php' class='btn'>No</a>";
            echo "<a href='../../controlador/eliminar.php/?id=".$_GET["id"]."' class='btn'>Si</a>";
        fin_html();
?>