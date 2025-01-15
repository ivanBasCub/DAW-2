<?php
    // Metemos el controlador para obtener los productos y la lógica del carrito
    require_once '../controlador/controlador.php';
    require_once '../modelo/producto.php';

    unset($_SESSION['carrito']);
    header('Location: ../vista/carrito.php');
   
?>