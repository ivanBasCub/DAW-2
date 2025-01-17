<?php
    session_start();

    // Incluimos el modelo
    require_once "../modelo/producto.php";

    // Comprobamos si queremos eliminar producto del array
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quitar'])){
        $pos = $_POST['position'];

        if(count($_SESSION['carrito']) == 1){
            header("Location: vaciar_carrito.php");
        }else{
            unset($_SESSION['carrito'][$pos]);
        }   
        header("Location: ../vista/carrito.php");
    }

    // Comprobamos si solo quiere quitar uno a la cantidad de un producto
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar'])){
        $pos = $_POST['position'];
        $producto = unserialize($_SESSION['carrito'][$pos]);

        // En el caso de que haya solamente uno en el carrito
        if($producto -> getCantidad() == 1){
            unset($_SESSION['carrito'][$pos]);
            header("Location: ../vista/carrito.php");
        }else{
            $result = $producto -> getCantidad() - 1;
            $producto -> setCantidad($result);

            $_SESSION['carrito'][$pos] = serialize($producto);
            header("Location: ../vista/carrito.php");
        }
    }
?>