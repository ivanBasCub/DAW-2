<?php
    //creamos un directorio
    chdir('C:\Users\ivan.bascub\Documents\xampp\htdocs\misphp');
    $directorio = "nuevo";
    if(is_dir($directorio)){
        rmdir($directorio);
        echo "borramos directorio";
    }else{
        mkdir($directorio);
        echo "creamos directorio";
    }

?>