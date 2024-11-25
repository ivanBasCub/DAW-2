<?php
    //creamos un directorio
    chdir('C:\Users\pablo.poligl.1\Documents\xampp\htdocs\misPHP\UD3\4.Archivosampp\htdocs\misPHP');
    $directorio = "nuevo";
    if(is_dir($directorio)){
        rmdir($directorio);
        echo "borramos directorio";
    }else{
        mkdir($directorio);
        echo "creamos directorio";
    }

?>