<?php
    // Uso de un condicional simple
    $nota = 7;
    if ($nota >= 5){
        echo "Has aprobado el examen";
    }
    if ($nota < 5){
        echo "Has suspendido el examen";
    }

    // Uso de un condicional compuesto
    if($nota >= 5){
        echo "Has aprobado el examen";
    }else{
        echo "Has suspendido el examen";
    }

    // Uso de condiciones anidadas
    if($nota < 5){
        echo "Suspenso";
    }elseif ($nota >= 5 && $nota < 6){
        echo "Aprobado Raspado";
    }elseif ($nota >= 6 && $nota < 7){
        echo "Bien";
    }elseif ($nota >= 7 && $nota < 9){
        echo "Notable";
    }else{
        echo "Sobresaliente";
    }
    
    // Uso de condiciones multiples
    $dia_semana = 0;
    switch($dia_semana){
        case 0:
            echo "Lunes";
        break;
        case 1:
            echo "Martes";
        break;
        case 2:
            echo "Miercoles";
        break;
        case 3:
            echo "Jueves";
        break;
        case 4:
            echo "Viernes";
        break;
        case 5:
            echo "Sabado";
        break;
        case 6:
            echo "Domingo";
        break;
        default:
            echo "El rango de dias esta entre 0 y 6";
    }

    // Uso del operador ternario
    $hora = 14;
    $formato = ($hora > 12) ? 24 : 12;
    echo "El formato es de $formato horas";
?>