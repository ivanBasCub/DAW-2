<?php
    include "../config/encabezado.php";
    start_html("static/index.css");
?>
<form method="post" action="index.php">
    <label>Usuario</label><br>
    <input type="text" name="user" placeholder="Usuario" required><br>
    <label>Contraseña</label><br>
    <input type="password" name="pass" placeholder="Contraseña" required><br>
    <input type="submit" class="btn" value="Iniciar sesion">
</form>
<?php
    include "../config/pie.php";
    fin_html();
?>