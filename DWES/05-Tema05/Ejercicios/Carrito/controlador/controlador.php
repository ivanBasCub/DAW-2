<?php
    session_start();

    // Incluimos el modelo
    require_once "../modelo/producto.php";

    // Lista de productos
    $productos = [
        new Producto(1,"Champú",10),
        new Producto(2,"Jabón",5),
        new Producto(3,"Pasta de dientes",2),
    ];

    // Crear el carrito si no existe
    if(!isset($_SESSION["carrito"])){
        $_SESSION['carrito'] = [];
    }

    // Agregamos el producto al carrito si se ha enviado el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar'])){
        $indice = $_POST['indice'];
        $id = $productos[$indice] -> getId();

        if(empty($_SESSION['carrito'])){
            $_SESSION['carrito'][]= serialize($productos[$indice]);
        }else{
            $aux = 0;
            // Comprobamos todos los objetos que hay dentro del array
            foreach($_SESSION['carrito'] as $pd){
                $producto = unserialize($pd);
                // Si en el caso de que exista le sumamos uno y salimos del bucle
                if($producto -> getId() == $id){
                    $cantidad = $producto -> getCantidad();
                    $producto -> setCantidad($cantidad +1);

                    $pd = serialize($producto);
                    $_SESSION['carrito'][$aux] = $pd;
                    header('Location: ../vista/productos.php');
                    exit;
                }
                $aux++;
            }
            // En el caso de q no exista en el array lo añadimos
            $_SESSION['carrito'][]= serialize($productos[$indice]);
        }

        header('Location: ../vista/productos.php');
        exit;
    }
?>