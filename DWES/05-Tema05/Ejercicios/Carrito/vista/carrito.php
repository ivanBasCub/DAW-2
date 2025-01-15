<?php
    // Metemos el controlador para obtener los productos y la lógica del carrito
    require_once '../controlador/controlador.php';
    require_once '../modelo/producto.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
</head>
<body>
    <?php
        if(empty($_SESSION['carrito'])){
            echo "<p> El carrito esta vacio</p>";
        }else{
            echo "<h1>Carrito de productos:</h1>";
            echo "<ul>";
            foreach($_SESSION['carrito'] as $productos){
                $producto = unserialize($productos);
                echo "<li>".$producto -> getCantidad() ." - ". $producto -> getNombre() ." - ". $producto -> getPrecio() * $producto -> getCantidad(). " &euro;</li>";
            }
            echo "</ul>";
            echo "<p><a href='realizar_pago.php'>Comprar</a> / <a href='../controlador/vaciar_carrito.php'>Vaciar Carrito</a> </p>";
        }

    ?>
    <p><a href="productos.php">Volver a la lista de productos</a></p>
    
</body>
</html>