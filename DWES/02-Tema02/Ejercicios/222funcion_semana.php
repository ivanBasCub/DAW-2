<?php
    function dia_semana (){
        $dia = random_int(0,6);
        $semana = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];

        return $semana[$dia];
    } 
    echo "Hoy es ".dia_semana();
?>