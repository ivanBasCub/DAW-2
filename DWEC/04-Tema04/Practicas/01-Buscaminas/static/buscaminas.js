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
        
        // Borramos el mensaje de error en el caso de que tenga contenido
        if(document.getElementById("form-error").innerHTML != ""){
            document.getElementById("form-error").innerHTML = "";
        }

        // Creamos la tabla
        renderTable(numFilas,numBombas);
        // Colocamos la minas de manera aleatoria
        randomMinas(numBombas,numFilas);
        // Calculo de las minas adyacentes de un casillas
        calcularMinasAdyacentes(numFilas);

        juego(numFilas);
        
    })
}

// Función para ver como va el juego
function juego(numFilas){
    // Seleccionamos las casillas que tienen la clase vacio
    var lista_casilla_vacio = document.querySelectorAll("td.vacio");

    // Creamos un event listener por cada elemento con la clase vacio
    lista_casilla_vacio.forEach(element => {
        element.addEventListener("click", function(){
            var cantMinas = element.getAttribute("data");
            let id = parseInt(element.getAttribute("id"));
            let numBombas = document.getElementById("form-minas").value;
            // Cambiamos la clase a marcada
            element.setAttribute("class","marcada");

            if(cantMinas == 0){
                
                const bordeIzqX = (id % numFilas === 0)              // Comprobamos si esta en el borde de la izquierda en el eje X
                const bordeDrchX = (id % numFilas === numFilas - 1)  // Comprobamos si esta en el borde de la derecha en el eje X
                
                // Seleccionamos las casillas que estan en las cuatro direcciones
                let casillaArriba = document.getElementById(id - numFilas);
                let casillaArribaIzq = document.getElementById(id - numFilas - 1);
                let casillaArribaDrch = document.getElementById(id - numFilas + 1);
                let casillaIzq = document.getElementById(id - 1);
                let casillaDrch = document.getElementById(id + 1);
                let casillaAbajo = document.getElementById(parseInt(id) + parseInt(numFilas));
                let casillaAbajoIzq = document.getElementById(parseInt(id) + parseInt(numFilas) - 1);
                let casillaAbajoDrch = document.getElementById(parseInt(id) + parseInt(numFilas) + 1);



                // Comprobamos si cumplen las condiciones para darle click
                if(id >= numFilas && !bordeIzqX && casillaArribaIzq.classList.contains("vacio")) casillaArribaIzq.click();
                if(id >= numFilas && casillaArriba.classList.contains("vacio")) casillaArriba.click();
                if(id >= numFilas && !bordeDrchX && casillaArribaDrch.classList.contains("vacio")) casillaArribaDrch.click();
                if(!bordeDrchX && casillaDrch.classList.contains("vacio")) casillaDrch.click();
                if(id < (numFilas * (numFilas - 1)) && !bordeDrchX && casillaAbajoDrch.classList.contains("vacio")) casillaAbajoDrch.click();
                if(id < (numFilas * (numFilas - 1)) && casillaAbajo.classList.contains("vacio")) casillaAbajo.click();
                if(id < (numFilas * (numFilas - 1)) && !bordeIzqX && casillaAbajoIzq.classList.contains("vacio")) casillaAbajoIzq.click();
                if(id > 0 && !bordeIzqX && casillaIzq.classList.contains("vacio")) casillaIzq.click();
                
                
                // Segunda Forma
                // comprobarAdyacentes(id,numFilas);
                

            }else{
                element.innerHTML = cantMinas; 
            }
            ganas(numFilas,numBombas);
        })
    });
    // Creamos una lista con las casillas que tienen las minas
    var lista_bombas = document.querySelectorAll("td.mina");
    
    // Creamos un event listener por cada mina
    lista_bombas.forEach(element =>{
        element.addEventListener("click",function(e){
            document.getElementById("form-error").innerHTML = "Has perdido el juego";

            lista_bombas.forEach(element =>{
                element.innerHTML = "X";
                element.setAttribute("class","derrota")
            })
        })
    });

    // Creamos una lista con todas las casillas que tiene el juego
    var lista_casillas = document.querySelectorAll("td");
    
    // Creamos un último event Listener para poder poner las banderas
    lista_casillas.forEach(element =>{
        element.addEventListener("contextmenu",function(e){
            e.preventDefault();
            if(element.innerHTML === "P"){
                element.innerHTML = "";
            }else{
                element.innerHTML = "P";
            }
            
        })
    })

}

function comprobarAdyacentes(id, numFilas){
    const bordeIzqX = (id % numFilas === 0)              // Comprobamos si esta en el borde de la izquierda en el eje X
    const bordeDrchX = (id % numFilas === numFilas - 1)  // Comprobamos si esta en el borde de la derecha en el eje X
    console.log(id - numFilas - 1)
    // Seleccionamos las casillas que estan en las cuatro direcciones
    let casillaArriba = document.getElementById(id - numFilas);
    let casillaArribaIzq = document.getElementById(id - numFilas - 1);
    let casillaArribaDrch = document.getElementById(id - numFilas + 1);
    let casillaIzq = document.getElementById(id - 1);
    let casillaDrch = document.getElementById(parseInt(id) + 1);
    let casillaAbajo = document.getElementById(parseInt(id) + parseInt(numFilas));
    let casillaAbajoIzq = document.getElementById(parseInt(id) + parseInt(numFilas) - 1);
    let casillaAbajoDrch = document.getElementById(parseInt(id) + parseInt(numFilas) + 1);

    // Comprobamos si cumplen las condiciones para darle click
    if(id > numFilas && !bordeIzqX && casillaArribaIzq.classList.contains("vacio")) comprobarCasilla(casillaAbajoIzq,numFilas);
    if(id >= numFilas && casillaArriba.classList.contains("vacio")) comprobarCasilla(casillaArriba,numFilas);
    if(id >= numFilas && !bordeDrchX && casillaArribaDrch.classList.contains("vacio")) comprobarCasilla(casillaArribaDrch,numFilas);
    if(!bordeDrchX && casillaDrch.classList.contains("vacio")) comprobarCasilla(casillaDrch,numFilas);
    if(id < (numFilas * (numFilas - 1)) && !bordeDrchX && casillaAbajoDrch.classList.contains("vacio")) comprobarCasilla(casillaAbajoDrch,numFilas);
    if(id < (numFilas * (numFilas - 1)) && casillaAbajo.classList.contains("vacio")) comprobarCasilla(casillaAbajo,numFilas);
    if(id < (numFilas * (numFilas - 1)) && !bordeIzqX && casillaAbajoIzq.classList.contains("vacio")) comprobarCasilla(casillaAbajoIzq,numFilas);
    if(id > 0 && !bordeIzqX && casillaIzq.classList.contains("vacio")) comprobarCasilla(casillaIzq,numFilas);
    
}

function comprobarCasilla(casilla,numFilas){
    casilla.setAttribute("class","marcada");
    let data = parseInt(casilla.getAttribute("data"))

    if(data != 0){
        casilla.innerHTML = data;
    }else{
        if(casilla){
            comprobarAdyacentes(casilla.getAttribute("id"),numFilas);
        }
    }
}

// Funcion que comprueba la condicion de victoria
function ganas(numFilas,numBombas){
    let winCon = numFilas**2 - numBombas;
    let lista_marcadas = document.querySelectorAll("td.marcada");
    if(lista_marcadas.length == winCon && winCon != 0 && document.getElementById("form-error").innerHTML != "Has ganado el juego"){
        document.getElementById("form-error").innerHTML = "Has ganado el juego";
    }
    
}

// MAIN
addEvents();