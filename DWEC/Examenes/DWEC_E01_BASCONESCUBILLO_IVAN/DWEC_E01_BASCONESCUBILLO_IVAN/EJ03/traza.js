"use strict";

function traza(matriz){
    let total = 0;
    if(matriz.length == matriz[0].length){
        for (let i = 0; i < matriz.length; i++) {
            total += matriz[i][i];
        }

        return total;
    }else{
        return "No es una matriz cuadrada";
    }
}
