<?php
    include "../config/encabezado.php";
    start_html("static/index.css");
?>

<h2>Introducir una nueva tarea</h2>
<form method="post" action="../controlador/insertarPDO.php" enctype="multipart/form-data">
    <label>Titulo de la tarea</label><br>
    <input type="text" name="titulo"><br>
    <label>Descripcion de la tarea</label><br>
    <input type="text" name="descripcion"><br>
    <label>Fecha de la tarea</label><br>
    <input type="date" name="fecha" pattern="\d{4}-\d{2}-\d{2}"><br>
    <label>Prioridad de la tarea</label><br>
    <select name="prioridad">
        <option value="1">Muy Importante</option>
        <option value="2">Importante</option>
        <option value="3">Poco Importante</option>
    </select><br>
    <label>Imangen de la tarea</label><br>
    <input type="file" name="img_tarea" accept="image/png"><br>
    <label>Realizada de la tarea</label><br>
    <select name="realizada">
        <option value="1">Terminada</option>
        <option value="0">Sin Terminar</option>
    </select><br>

    <?php
        echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
        echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
    ?>

    <button class="btn">Subir Nueva tarea</button>
</form>
<?php
    echo "<form method='post' action='index.php'>";
    echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
    echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
    echo "<input type='submit' value='Volver a la página principal' class='btn'>";
    echo "</form>";

    include "../config/pie.php";
    fin_html();
    
?>