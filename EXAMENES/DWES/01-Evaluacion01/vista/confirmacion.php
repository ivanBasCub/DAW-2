<?php
    include "../config/encabezado.php";
    start_html("static/index.css");
?>
<h2>Estas seguro de eliminar este proyecto?</h2>
<?php
    echo "<form method='post' action='index.php'>";
        echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
        echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
        echo "<button class = 'btn'>No</button>";
    echo "</form>";
    echo "<form method='post' action='../controlador/eliminarPDO.php'>";
        echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
        echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
        echo "<input type='hidden' name='id' value='".$_POST["id"]."'>";
        echo "<button class = 'btn'>Si</button>";
    echo "</form>";

    include "../config/pie.php";
    fin_html();
?>