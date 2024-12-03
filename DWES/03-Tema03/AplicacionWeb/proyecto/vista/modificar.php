<?php
    include "../config/encabezado.php";
    include "../config/pie.php";
    include "../config/funciones.php";

    start_html("static/index.css");
?>
<form method="post" acction="../controlador/modificarPDO.php" enctype="multipart/form-data">
    <?php
    renderFormMod($_GET["id"]);
    ?>
</form>
<a href="index.php" class="btn">Volver a la página principal</a>
<?php
    fin_html();
?>