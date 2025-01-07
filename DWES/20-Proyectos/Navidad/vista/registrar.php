<?php
    include "../config/html/encabezado.php";
    include "../config/html/pie.php";

    startHtmlIndex("static/css/index.css");
?>
<h2>Insertar un nuevo Tutor</h2>

<?php
    // Mostramos un mensaje de error en el caso de que el usuario se haya equivocado
    if(isset($_GET["error"])){
        echo "<h3 class='error'>".$_GET["error"]."</h3>";
    }
    
?>
<form action="../controlador/tutor/insertutor.php" method="post">
    <label>Nombre</label><br>
    <input type="text" name="userName"><br>
    <label>Apellidos</label><br>
    <input type="text" name="subName"><br>
    <label>Nombre de usuario</label><br>
    <input type="text" name="login"><br>
    <label>Contraseña</label><br>
    <input type="password" name="password"><br>
    <label>Correo Electronico</label><br>
    <input type="email" name="email"><br>
    <input type="submit" name="enviar" value="Crear Nuevo Usuario" class="btn">
</form>
<a href="index.php" class="btn">Inicar Sesion</a>
<?php
    endHtml();
?>