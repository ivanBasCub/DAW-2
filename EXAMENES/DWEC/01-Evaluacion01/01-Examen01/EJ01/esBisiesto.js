"use strict";

function esBisiesto(anio){
    if(anio % 100 == 0){
        if(anio % 400 == 0){
            return true;
        }else{
            return false;
        }
    }else if (anio % 4 == 0){
        return true;
    }else{
        return false;
    }
}
