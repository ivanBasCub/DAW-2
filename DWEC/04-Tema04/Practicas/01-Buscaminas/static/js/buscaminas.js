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
    let padre = document.getElementById("game");
    let tabla = document.createElement("table");
    tabla.setAttribute("id","tablero");

    for (let i = 0; i < numFilas; i++) {
        let fila = document.createElement("tr");
        for (let j = 0; j < numFilas; j++) {
            let casilla = document.createElement("td");
            let id = i + "-" + j;
            casilla.setAttribute("id",id);
            fila.appendChild(casilla);
        }
        tabla.appendChild(fila);
    }
    padre.appendChild(tabla)

}

// Funcion para poner minas aleatorias
function randomMinas(numBombas,numFilas){
    for (let i = 0; i < numBombas; i++) {
        let id_casilla = parseInt(Math.random() * numFilas) + "-" + parseInt(Math.random() * numFilas);
        let casilla = document.getElementById(id_casilla);
        casilla.setAttribute("class","mina");
    }
}

// Funcion para poner los numeros con minas adyacentes
function calcularMinasAdyacentes(numFilas){
    for (let i = 0; i < numFilas; i++) {
        for (let j = 0; j < numFilas; j++) {
            let id_casilla = i + "-" + j;
            let casilla = document.getElementById(id_casilla);

            let number = document.createElement("label");
            number.setAttribute("hidden","true");
            number.textContent = calcularMinas(casilla,i,j,numFilas);
            casilla.appendChild(number);
        }
    }
}

function calcularMinas(casilla,ejeX,ejeY,numFilas){
    // En el caso de que sea una mina
    if(casilla.classList.contains("mina")){
        return "X";
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