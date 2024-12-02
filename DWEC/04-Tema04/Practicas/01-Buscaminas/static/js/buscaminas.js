"use strict"

// Funcion para renderizar la tabla 
function renderTable(numFilas,numBombas){
    // Comprobacion de fallos
    let error = document.getElementById("form-error");
    if(numFilas <= 0){
        error.textContent = "No se puede crear una tabla con filas negativas o igual a 0";
        return NaN
    }

    if(numFilas ** 2 < numBombas || numBombas <= 0){
        error.textContent = "No puede haber mas minas que celdas disponibles o menor q 0";
        return NaN
    }

    // Generacion de la tabla
    let tabla = document.getElementById("tablero");
    tabla.setAttribute("id","tablero");

    tabla.innerHTML = "";
    let id = 0;
    for (let i = 0; i < numFilas; i++) {
        let fila = document.createElement("tr");
        for (let j = 0; j < numFilas; j++) {
            let casilla = document.createElement("td");
            casilla.setAttribute("id",id);
            casilla.setAttribute("class","vacio");
            id ++;
            fila.appendChild(casilla);
        }
        tabla.appendChild(fila);
    }
}

// Funcion para poner minas aleatorias
function randomMinas(numBombas,numFilas){
    for (let i = 0; i < numBombas; i++) {

        let id_casilla = parseInt(Math.random() * numFilas**2);
        let casilla = document.getElementById(id_casilla);
        // Comprobamos si ya tiene la clase
        if(casilla.classList.contains("mina")){
            i--;
        }else{
            casilla.setAttribute("class","mina");
        }
        
    }
}

// Funcion para poner los numeros con minas adyacentes
function calcularMinasAdyacentes(numFilas){
    for (let i = 0; i < numFilas**2; i++) {
        let total = 0           // Numero total de minas que tiene adyacente 
        const bordeIzqX = (i % numFilas === 0)              // Comprobamos si esta en el borde de la izquierda en el eje X
        const bordeDrchX = (i % numFilas === numFilas - 1)  // Comprobamos si esta en el borde de la derecha en el eje X
        let casilla = document.getElementById(i);
        
        if(casilla.classList.contains("vacio")){
            let casillAbajoId = parseInt(i) + parseInt(numFilas);

            // Comprobamos si esta en la casilla anterior
            if(i > 0 && !bordeIzqX && document.getElementById(String(i-1)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla siguiente
            if(i >= 0 && !bordeDrchX && document.getElementById(String(i+1)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla superior
            if(i > numFilas && document.getElementById(String(i-numFilas)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla superior izquierda
            if(i > numFilas && !bordeIzqX && document.getElementById(String(i-numFilas-1)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla superior derecha
            if(i > numFilas && !bordeDrchX && document.getElementById(String(parseInt(i-numFilas)+parseInt(1))).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla inferior
            if(i < (numFilas*(numFilas-1)) && document.getElementById(String(casillAbajoId)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla inferior izquerda
            if(i < (numFilas*(numFilas-1)) && !bordeIzqX && document.getElementById(String(casillAbajoId-1)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla inferior drch
            if(i < (numFilas*(numFilas-1)) && !bordeIzqX && document.getElementById(String(parseInt(casillAbajoId)+parseInt(1))).classList.value === "mina")total++;
            
            casilla.setAttribute("data",total);
        }
    }
}

// Añadir los eventos 
function addEvents(){
    let btnForm = document.getElementById("form-button");

    // Evento para empezar el juego
    btnForm.addEventListener("click",function(e){
        e.preventDefault();

        let numFilas = document.getElementById("form-tablero").value;
        let numBombas = document.getElementById("form-minas").value;
        // Creamos la tabla
        renderTable(numFilas,numBombas);
        // Colocamos la minas de manera aleatoria
        randomMinas(numBombas,numFilas);

        calcularMinasAdyacentes(numFilas);

        btnForm.setAttribute("hidder","true");
    })

}
// MAIN

addEvents();