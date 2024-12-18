<?php
    include "../config/html/encabezado.php";
    include "../config/html/pie.php";

    startHtml("static/css/index.css");
?>

<form method="post" action="../controlador/login.php">
    <label>Usuario</label><br>
    <input type="text" name="username"><br>
    <label for="">Contraseña</label><br>
    <input type="password" name="userpass"><br>
    <button class="btn">Iniciar Sesion</button>
</form>
<a href="registrar.php">Registrar nuevo usuario</a>

<?php
    endHtml();
?>