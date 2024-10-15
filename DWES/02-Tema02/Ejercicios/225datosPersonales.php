<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Datos Personales Tabla</title>
    </head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Email</th>
                <th>Año de Nacimiento</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    // Recogemos la informacion del formulario y lo mostramos por pantalla
                    echo "<td>". $_POST['name'] ."</td>";
                    echo "<td>". $_POST['subname1'] ."</td>";
                    echo "<td>". $_POST['subname2'] ."</td>";
                    echo "<td>". $_POST['email'] ."</td>";
                    echo "<td>". $_POST['year'] ."</td>";
                    echo "<td>". $_POST['phone'] ."</td>";
                ?>
            </tr>
        </tbody>
    </table>
</body>
</html>