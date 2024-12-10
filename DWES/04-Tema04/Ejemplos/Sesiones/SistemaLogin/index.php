<form action="login.php" method="post">
    <fieldset>
        <legend>Login</legend>
        <?php
            if(isset($error)){
                // Si hay error al hacer login se muestra el error
                echo $error;
            }
            if(isset($_GET["loginIndex"])){
                // Si intentan entrar en el main directamente sin pasar por el login
                echo "Haz login para entrar en esta página";
            }
        ?>
        <br>
            <label for="user">Usuario:</label><br>
            <input type="text" name="user" id="user" maxlength="50"><br>
            <label for="pass">Contraseña:</label><br>
            <input type="password" name="pass" id="pass" maxlength="50"><br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </fieldset>
</form>