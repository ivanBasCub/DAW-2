<?php
    session_start();

    // Incluimos el modelo
    require_once "../modelo/producto.php";

    // Lista de productos
    $productos = [
        new Producto("Champú",10),
        new Producto("Jabón",5),
        new Producto("Pasta de dientes",2),
    ];

    // Crear el carrito si no existe
    if(!isset($_SESSION["carrito"])){
        $_SESSION['carrito'] = [];
    }

    // Agregamos el producto al carrito si se ha enviado el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar'])){
        $indice = $_POST['indice'];
        // Guardamos el objeto producto correspondiente al índice
        $_SESSION['carrito'][]= serialize($productos[$indice]);
        header('Location: ../vista/productos.php');
        exit;
    }
?>