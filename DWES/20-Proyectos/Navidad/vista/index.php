<?php
    include_once "../config/html/encabezado.php";
    include_once "../config/html/pie.php";

    startHtmlIndex("static/css/index.css");
    if(isset($_GET["loginIndex"])){
        echo "<h3 class='error'>".$_GET["loginIndex"]."</h3>";
    }
?>

<form method="post" action="../controlador/login.php">
    <label>Usuario</label><br>
    <input type="text" name="username"><br>
    <label for="">Contraseña</label><br>
    <input type="password" name="userpass"><br>
    <input type="submit" name="enviar" value="Iniciar Sesion" class="btn">
</form>
<a href="registrar.php" class="btn">Registrar nuevo usuario</a>

<?php
    endHtml();
?>