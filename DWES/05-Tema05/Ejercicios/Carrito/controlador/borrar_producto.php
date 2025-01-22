<?php
    session_start();

    // Incluimos el modelo
    require_once "../modelo/producto.php";

    // Comprobamos si queremos eliminar producto del array
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quitar'])){
        $id = $_POST["id"];
        if(count($_SESSION['carrito']) == 1){
            header("Location: vaciar_carrito.php");
        }else{
            $aux = 0;
            foreach($_SESSION['carrito'] as $productos){
                $producto = unserialize($productos);
                echo $_SESSION['carrito'][$aux]."<br>";
                if($producto -> getId() == $id){
                    unset($_SESSION['carrito'][$aux]);
                    // Reoganizacion de los index del array
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                    header("Location: ../vista/carrito.php");
                }
                $aux ++;
            }
            
        }   
        //header("Location: ../vista/carrito.php");
    }

    // Comprobamos si solo quiere quitar uno a la cantidad de un producto
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar'])){
        $id = $_POST['id'];
        $aux = 0;
        foreach($_SESSION['carrito'] as $productos){
            $producto = unserialize($productos);
            if($producto -> getId() == $id){
                echo $producto -> getCantidad();
                if($producto -> getCantidad() != 1){
                    $result = $producto -> getCantidad() - 1;
                    $producto -> setCantidad($result);
                    $_SESSION["carrito"][$aux] = serialize($producto);
                    header("Location: ../vista/carrito.php");
                }else{
                    unset($_SESSION['carrito'][$aux]);
                    // Reoganizacion de los index del array
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                    header("Location: ../vista/carrito.php");
                }
            }
            
            
            $aux++;
        }
    }
?>