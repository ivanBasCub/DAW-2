<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Tabla Pitagoras</title>
    </head>
    <body>
        <h1>Tabla Pitagoras</h1>
        <table border="1">
            <?php
                for($i= 0; $i <= 10; $i++){
                    echo "<tr>";
                        for($j=0; $j <= 10; $j++){
                            if($i == 0){
                                if($j== 0){
                                    echo "<th>X</th>";
                                }else{
                                    echo "<th>$j</th>";
                                }
                            }else{
                                if($j== 0){
                                    echo "<th>$i</th>";
                                }else{
                                    echo "<td>".$j*$i."</td>";
                                } 
                            }
                        }
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>