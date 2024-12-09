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
            if(i >= numFilas && document.getElementById(String(i-numFilas)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla superior izquierda
            if(i > numFilas && !bordeIzqX && document.getElementById(String(i-numFilas-1)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla superior derecha
            if(i > numFilas && !bordeDrchX && document.getElementById(String(parseInt(i-numFilas)+parseInt(1))).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla inferior
            if(i < (numFilas*(numFilas-1)) && document.getElementById(String(casillAbajoId)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla inferior izquerda
            if(i < (numFilas*(numFilas-1)) && !bordeIzqX && document.getElementById(String(casillAbajoId-1)).classList.value === "mina")total++;
            // Comprobamos si esta en la casilla inferior drch
            if(i < (numFilas*(numFilas-1)) && !bordeDrchX && document.getElementById(String(parseInt(casillAbajoId)+parseInt(1))).classList.value === "mina")total++;
            
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

        juego(numFilas);
    })
}

// Función para ver como va el juego
function juego(numFilas){ 
    var lista_casilla_vacio = document.querySelectorAll("td.vacio"); 
    lista_casilla_vacio.forEach(element => { 
        element.addEventListener("click", function(){ 
            var cantMinas = element.getAttribute("data"); 
            let id = parseInt(element.getAttribute("id")); 
            element.classList.add("marcada"); 
            
            if(cantMinas == 0){ 
                const bordeIzqX = (id % numFilas === 0); 
                const bordeDrchX = (id % numFilas === numFilas - 1); 
                let casillaArriba = document.getElementById(id - numFilas); 
                let casillaArribaDrch = document.getElementById(id - numFilas + 1); 
                let casillaArribaIzq = document.getElementById(id - numFilas - 1); 
                let casillaIzq = document.getElementById(id - 1); let casillaDrch = document.getElementById(id + 1); 
                let casillaAbajo = document.getElementById(id + numFilas); 
                let casillaAbajoDrch = document.getElementById(id + numFilas + 1); 
                let casillaAbajoIzq = document.getElementById(id + numFilas - 1);
                
                // Comprobar casillas laterales
                if(casillaDrch && !bordeDrchX && casillaDrch.classList.contains("vacio") && !casillaDrch.classList.contains("marcada")) casillaDrch.click(); 
                if(casillaIzq && !bordeIzqX && casillaIzq.classList.contains("vacio") && !casillaIzq.classList.contains("marcada")) casillaIzq.click(); 
                // Comprobar casillas superiores
                if(id >= numFilas){
                    if(casillaArriba && casillaArriba.classList.contains("vacio") && !casillaArriba.classList.contains("marcada")) casillaArriba.click(); 
                    if(casillaArribaIzq && !bordeIzqX && casillaArribaIzq.classList.contains("vacio") && !casillaArribaIzq.classList.contains("marcada")) casillaArribaIzq.click(); 
                    if(casillaArribaDrch && !bordeDrchX && casillaArribaDrch.classList.contains("vacio") && !casillaArribaDrch.classList.contains("marcada")) casillaArribaDrch.click(); 
                }
                
                // Comprobar casillas inferiores
                if(id <= (numFilas * (numFilas-1))){
                    if(casillaAbajo && casillaAbajo.classList.contains("vacio") && !casillaAbajo.classList.contains("marcada")) casillaAbajo.click(); 
                    if(casillaAbajoIzq && !bordeIzqX && casillaAbajoIzq.classList.contains("vacio") && !casillaAbajoIzq.classList.contains("marcada")) casillaAbajoIzq.click(); 
                    if(casillaAbajoDrch && !bordeDrchX && casillaAbajoDrch.classList.contains("vacio") && !casillaAbajoDrch.classList.contains("marcada")) casillaAbajoDrch.click(); 
                }
                
            } else { 
                element.innerHTML = cantMinas; 
            } 
        }); 
    });

    // Condición de derrota
    var lista_bombas = document.querySelectorAll("td.mina"); 
    lista_bombas.forEach(element => { 
        element.addEventListener("click", function(e){ 
            alert("BOMBA");
            element.removeEventListener("click",this.listenerCallback);
        }); 
    });
}
// MAIN

addEvents();