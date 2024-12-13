<!-- Insertamos los datos de los dos usuarios en el caso de que no exista ninguno en la BBDD -->
<?php
    include_once "../config/conexionPDO.php";
    include_once "../controlador/users.php";

    $con = conexion();

    $sql = "select * from users";

    try {
        $stmt1 = $con -> prepare($sql);
        $stmt1 -> setFetchMode(PDO::FETCH_OBJ);
        $stmt1 -> execute();

        if($stmt1 -> rowCount() == 0){
            createUsers($con);
        }
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }
    $con = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuarios</title>
</head>
<body>
    <?php
        if(isset($error)){
            // En el caso de que ocurra un error lo imprimimos
            echo $error;
        }
        if(isset($_GET["loginIndex"])){
            // Se ha intentado entrar en alguna de las web sin logear
            echo "Haz login para entrar en esta página";
        }
    ?>
    <form method="post" action="../controlador/login.php">
        <label for="user">Usuario</label><br>
        <input type="text" name="user" id = "user"><br>
        <label for="pass">Contraseña</label><br>
        <input type="password" name="pass" id = "pass"><br>
        <input type="submit" name="enviar" value="login">
    </form>
</body>
</html>