<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="403fondo.css">
    <title>Cambio de Fondo</title>
</head>

<?php
    $cookieName = "fondo";

    // Comrpobamos que si existe la cookie y si es el caso creala
    if(!isset($_COOKIE[$cookieName])){
        setcookie($cookieName,"claro",time()+3600*48);
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }

    // Cambiamos la informacion de la cookie
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        setcookie($cookieName,$_POST["bg-color"],time()+3600*48);
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }

?>

<body class="<?= $_COOKIE[$cookieName] ?>">
    <form action="<?= $_SERVER["PHP_SELF"]?>" method="post">
        <select name="bg-color">
            <option value="claro">Claro</option>
            <option value="oscuro">Oscuro</option>
        </select>
       
        <input type="submit" name="cambio" value="Cambiar Fondo">
    </form>
    <a href="403cookiesfondoBorrado.php">Borrar la Cookie</a>
</body>
</html>