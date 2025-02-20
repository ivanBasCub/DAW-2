<?php
    include "../config/encabezado.php";
    include "../config/conexionPDO.php";
    
    start_html("static/index.css");
?>
    <form method="post" action="">
        <label>Descripcion de la tarea</label><br>
        <input type="text" name="descripcion"><br>
        <label>Estado de la tarea</label><br>
        <select name="realizada">
            <option value="1">Terminada</option>
            <option value="0">Sin Terminar</option>
        </select><br>
        <?php
        echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
        echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
        echo "<input type='hidden' name='pass' value='".$_POST["id"]."'>";
        ?>
        <button class="btn">Subir Nueva tarea</button>
    </form>
<?php



    include "../config/pie.php";
    fin_html();
?>