<?php
    include "../config/encabezado.php";
    include "../config/funciones.php";
    include "../config/pie.php";
    start_html("static/index.css");
?>
<h2>Introducir nueva prenda</h2>
<form method="post" action="../controlador/insertarPDO.php" enctype="multipart/form-data">
    <input type="text" name="prenda" placeholder="Nombre de la prenda"><br>
    <input type="number" name="precio" placeholder="Precio de la prenda"><br>
    <label>Esta rebajada la prendra</label><br>
    <select name="rebajada">
        <option value="1">Si</option>
        <option value="0">No</option>
    </select><br>
    <input type="number" name="rebaja" placeholder="Porcentaje de la rebaja"><br>
    <label>Imagen de la prenda</label><br>
    <input type="file" name="imagen" accept="image/png"><br>
    <button class="btn">Subir nueva prenda</button>

</form>
<a href="index.php" class="btn">Volver a la página principal</a>
<?php
    fin_html();
?>