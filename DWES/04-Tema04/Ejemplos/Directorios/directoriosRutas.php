<?php
//Directorio: /directorio/actual
echo getcwd()."\n";

//Directorio: /directorio/actual/carpeta
chdir('401crearFicheroTXT');
echo getcwd()."\n";

echo "<hr>";
//Directorio: /xampp/htdocs
chdir('C:\Users\ivan.bascub\Documents\xampp\htdocs\misphp');
echo getcwd()."\n";
?>
