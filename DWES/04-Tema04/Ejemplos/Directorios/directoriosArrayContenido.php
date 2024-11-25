<?php
//Array de archivos y directorios
chdir('C:\Users\pablo.poligl.1\Documents\xampp\htdocs');
$directorio = "misPHP";
$archivos = scandir($directorio, 1);
print_r($archivos);
?>