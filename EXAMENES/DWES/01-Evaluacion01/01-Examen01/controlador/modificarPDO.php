<?php

include "../config/encabezado.php";
include "../config/conexionPDO.php";

start_html("../vista/static/index.css");

$con = conexion();

$sql = "update tareas set descripcion = :descripcion, realizada = :realizada where id_tarea = :id";