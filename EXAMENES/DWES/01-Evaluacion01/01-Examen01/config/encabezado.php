<?php
function start_html($css){
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' href='". $css . "'>";
            echo "<meta name='author' content='Ivan Bascones Cubillo'>";
            echo "<title>Gestor de Tareas</title>";
        echo "</head>";
    echo "<body>";
        echo "<header>";
            echo "<h1>Gestor de Tareas</h1>";
        echo"</header>";
        echo "<main>";

}

