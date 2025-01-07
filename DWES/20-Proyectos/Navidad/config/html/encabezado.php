<?php
function startHtml($css,$case){
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' href='". $css . "'>";
            echo "<meta name='author' content='Ivan Bascones Cubillo'>";
            echo "<title>Proyecto Navidad</title>";
        echo "</head>";
    echo "<body>";
        echo "<header>";
        switch($case){
            case 1:
                echo "<h1>Bienvenido Administrador</h1>";
            break;
            case 2:
                echo "<h1>Bienvenido a tu zona privada</h1>";
            break;
        }
            echo "<a href='../controlador/logout.php' class='btn-logout'><img class='icono-size' src='static/img/box-arrow-right.svg'></a>";
        echo"</header>";
        echo "<main>";
}

function startHtmlTables($css,$case){
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' href='". $css . "'>";
            echo "<meta name='author' content='Ivan Bascones Cubillo'>";
            echo "<title>Proyecto Navidad</title>";
        echo "</head>";
    echo "<body>";
        echo "<header>";
            switch($case){
                case 1:
                    echo "<h1>Alumnos</h1>";
                break;
                case 2:
                    echo "<h1>Proyectos</h1>";
                break;
                case 3:
                    echo "<h1>Tutores</h1>";
                break;
            }
            echo "<a href='../../controlador/logout.php' class='btn-logout'><img class='icono-size' src='../static/img/box-arrow-right.svg'></a>";
        echo"</header>";
        echo "<main>";
}


function startHtmlIndex($css){
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' href='". $css . "'>";
            echo "<meta name='author' content='Ivan Bascones Cubillo'>";
            echo "<title>Proyecto Navidad</title>";
        echo "</head>";
    echo "<body>";
        echo "<header>";
            echo "<h1>Proyecto Navidad</h1>";
        echo"</header>";
        echo "<main>";
}