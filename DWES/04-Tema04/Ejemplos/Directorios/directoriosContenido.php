<?php
//Contenido del directorio
chdir('C:\Users\pablo.poligl.1\Documents\xampp\htdocs');
$directorio = "misPHP";
if($gestor = opendir($directorio)){
    echo "Gestor de directorio: $gestor\n<br/>";
    echo "Entradas:\n<br/>";
    //Iteramos sobre el directorio:
    while(false !== ($entrada = readdir($gestor))){
        echo "$entrada\n <br/>";
    }
    closedir($gestor);
}
?>