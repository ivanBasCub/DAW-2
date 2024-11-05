<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ivan Bascones Cubillo">
    <title>Mostrar datos</title>
</head>
<body>
    <div class="main">
        <h1>
            <?php echo $_POST['name'] . " " . $_POST['subname1']. " " .$_POST['subname2']; ?>
        </h1>
        <table border="1">
            <?php
                echo "<tr>";
                    echo "<th> DNI </th>";
                    echo "<td>". $_POST['dni']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th> Telefono </th>";
                    echo "<td>". $_POST['telfono']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th> Género </th>";
                    // Filtramos los datos que hay en el la variable genero o sex
                    switch($_POST['sex']){
                        case "H":
                            $gen = "Masculino";
                        break;
                        case "M":
                            $gen = "Femenino";
                        break;
                        default:
                            $gen = "Helicoptero Apache de combate";
                    }
                    echo "<td>". $gen ."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th> Fecha de Nacimiento </th>";
                    echo "<td>". $_POST['fechnac']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th> Estudios </th>";
                    // Filtramos los datos ingresados de los estudios
                    switch($_POST['estudios']){
                        case "eso":
                            $estudios = "Educación Secundaria";
                        break;
                        case "bach":
                            $estudios = "Bachillerato";
                        break;
                        case "fp1":
                            $estudios = "Formación Profesional Básica";
                        break;
                        case "fp2":
                            $estudios = "Formación Profesional Grado Medio";
                        break;
                        case "fp3":
                            $estudios = "Formación Profesional Grado Superior";
                        break;
                        case "uni":
                            $estudios =  "Estudios Universitarios";
                        break;
                    }
                    echo "<td>". $estudios ."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th> Idiomas </th>";
                    echo "<td>". $_POST['idiomas']."</td>";
                echo "</tr>";
            ?>
        </table>
    </div>
    <div class="archivos">
        <?php
            
            $filename = $_FILES['dnifile']['name'];
            $tempname = $_FILES['dnifile']['tmp_name'];
            $folder = "../Assets/" . $filename;

            move_uploaded_file($tempname,$folder);
            echo "<h2>Foto del DNI</h2>";
            echo "<img src = '". $folder ."' width = '100px' height='150px'>";

            $filename = $_FILES['curriculumfile']['name'];
            $tempname = $_FILES['curriculumfile']['tmp_name'];
            $folder = "../Assets/" . $filename;
            
            move_uploaded_file($tempname,$folder);

            echo "<h2>Curriculum</h2>";
            echo "<iframe height ='400px' width = '800px' src=".$folder."></iframe>"


        ?>
    </div>
</body>
</html>