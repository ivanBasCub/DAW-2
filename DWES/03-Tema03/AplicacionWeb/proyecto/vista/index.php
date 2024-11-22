<?php
    /* 
    include "../config/conexionPDO.php";
    include "../config/encabezado.php";
    include "../config/pie.php";
    */
    include "../config/encabezado.php";
    start_html("static/index.css");
?>
<table>
    <thead>
        <th>Titulo</th>
        <th>Descripción</th>
        <th>Periodo</th>
        <th>Curso</th>
        <th>Fecha de Presentación</th>
        <th>Nota</th>
        <th>Logotipo</th>
        <th>PDF</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </thead>
    <?php 
        include "../config/conexionPDO.php";
        $con = conexion();
            
        $sql = "select * from proyecto";

        try{
            $sentencia = $con -> prepare($sql);
            $sentencia -> setFetchMode(PDO::FETCH_OBJ);
            $sentencia -> execute();

            if($sentencia -> rowCount() != 0){
                for ($i=0; $i < $sentencia -> rowCount(); $i++) { 
                    $proyecto = $sentencia -> fetch();
                    echo "<tr>";
                        echo "<td>". $proyecto -> titulo ."</td>";
                        echo "<td>". $proyecto -> descripcion ."</td>"; 
                        echo "<td>". $proyecto -> periodo ."</td>"; 
                        echo "<td>". $proyecto -> curso ."</td>"; 
                        echo "<td>". $proyecto -> fecha_presentacion ."</td>"; 
                        echo "<td>". $proyecto -> nota ."</td>"; 
                        echo "<td> <img src='data:image/png;base64, ".base64_encode($proyecto -> logotipo)."' width = '50px' height='50px'></td>"; 
                        echo "<td>"."</td>";
                        echo "<td> <a href= '#' class='btn'><img src='img/pencil.svg'></a> </td>";
                        echo "<td>  <a href= 'confirmacion.php?id=".$proyecto -> id_proyecto."' class='btn'><img src='img/trash.svg'></a>  </td>";
                    echo "</tr>";
                }
            }else{
                echo "<td colspan='10'><h1>No hay registros</h1></td>";
            }
        }catch(PDOException $e){
            echo "<td colspan='10'><h1>ERROR</h1></td>";
            echo $e -> getMessage();
        }
        $con = null;

    ?>
</table>
<?php
    include "../config/pie.php";

    echo "<a href='insertar.php' class='btn'> <img src='img/plus-circle.svg'> Agregar </a>";
    fin_html();
?>