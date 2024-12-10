// Funciones

// Renderizado de la tabla
function renderTable(){
    // Comprobamos si hay fallos en la inserccion de datos
    let error = document.getElementById("form-error");
    
    error.innerHTML = "";

    // Recogemos los datos del Formulario
    let numFilas = parseInt(document.getElementById("form-tablero").value);
    let numBombas = parseInt(document.getElementById("form-minas").value);

    if(numFilas <= 0){
        error.textContent = "No se puede crear una tabla con filas negativas o igual a 0";
        return NaN
    }

    if(numFilas ** 2 < numBombas || numBombas <= 0){
        error.textContent = "No puede haber mas minas que celdas disponibles o menor q 0";
        return NaN
    }

    if(numFilas > 50){
        error.textContent = "El tamaño maximo es de 50";
        return NaN
    }

    // Generacion de la tabla
    let tabla = document.getElementById("tablero");
    // Guardamos en dos variables dentro del HTML los datos de las minas y las filas
    tabla.setAttribute("numFilas",numFilas);
    tabla.setAttribute("numBombas",numBombas);
    tabla.innerHTML = "";

    let id = 0;
    for (let i = 0; i < numFilas; i++) {
        let fila = document.createElement("tr");
        for(let j = 0; j < numFilas; j++){
            let casilla = document.createElement("td");
            casilla.setAttribute("id",id);
            casilla.setAttribute("class","vacio");
            id++;
            fila.appendChild(casilla);
        }
        tabla.appendChild(fila);
    }

    // Randomizamos las minas dentro de la tabla
    randomMinas(numFilas,numBombas);

    // Calculamos las minas adyacentes
    calcularMinasAdyacentes(numFilas);
}

// Randomizar para poner minas de manera aleatoria dentro de la tabla
function randomMinas(numFilas, numBombas){
    for (let i = 0; i < numBombas; i++) {
        let casilla = document.getElementById(parseInt(Math.random() * numFilas**2));

        if(casilla.classList.contains("bomba")){
            i--;
        }else{
            casilla.setAttribute("class","bomba");
        }
    }
}

function calcularMinasAdyacentes(numFilas){
    for (let i = 0; i < numFilas ** 2; i++) {
        let total = 0;
        const bordeIzq = (i % numFilas === 0)              // Comprobamos si esta en el borde de la izquierda en el eje X
        const bordeDrch = (i % numFilas === numFilas - 1)  // Comprobamos si esta en el borde de la derecha en el eje X
        let casilla = document.getElementById(i);

        if(casilla.classList.contains("vacio")){
            // Casillas de arriba
            if(i >= numFilas){
                if(!bordeIzq && document.getElementById(i-numFilas-1).classList.value === "bomba") total++;
                if(document.getElementById(i-numFilas).classList.value === "bomba") total++;
                if(!bordeDrch && document.getElementById(i-numFilas+parseInt(1)).classList.value === "bomba") total++;
            }
            // Casillas del medio
            if(i > 0 && !bordeIzq && document.getElementById(i-1).classList.value === "bomba") total++;
            if(i >= 0 && !bordeDrch && document.getElementById(i+parseInt(1)).classList.value === "bomba") total++;
            // Casillas de Abajo
            if(i < (numFilas * (numFilas-1))){
                let idAbajo = i + parseInt(numFilas);
                if(!bordeIzq && document.getElementById(idAbajo-1).classList.value === "bomba") total++;
                if(document.getElementById(idAbajo).classList.value === "bomba") total++;
                if(!bordeDrch && document.getElementById(idAbajo+parseInt(1)).classList.value === "bomba") total++;
            }
            casilla.setAttribute("data",total);
        }
        
    }
}

// Funcion para añadir los eventos de las casillas
function juego(){
    var numFilas =parseInt(document.getElementById("form-tablero").value);

    // Creamos un event listener en cada casilla con la clase vacio
    var listCasillasVacias = document.querySelectorAll("td.vacio");
    listCasillasVacias.forEach(casilla => {
        casilla.addEventListener("click",element =>{
            let bombas = parseInt(casilla.getAttribute("data"));
            let id_casilla = parseInt(casilla.getAttribute("id"));
            // Marcamos la casilla
            casilla.setAttribute("class","marcada");

            // Comprobamos las casillas adyacentes
            if(bombas == 0){
                checkCasillasAdyacentes(id_casilla, numFilas);
            }else{
                casilla.innerHTML = bombas;
            }
            victoria();
        })
    });

    derrota();
}
// Funcion para comprobar las casillas adyacentes de la que se ha clickado
function checkCasillasAdyacentes(id, numFilas){

    // Generamos dos contantes para comprobar si estan en el borde de la derecha o de la izquierda
    const bordeIzq = (id % numFilas === 0);
    const bordeDrch = (id % numFilas === numFilas - 1);

    // Guardamos en variables las casillas que tiene alrededor
    let casillaArribaDrch = document.getElementById(id - numFilas + 1);
    let casillaArriba = document.getElementById(id - numFilas);
    let casillaArribaIzq = document.getElementById(id - numFilas - 1);
    let casillaIzq = document.getElementById(id - 1);
    let casillaDrch = document.getElementById(id + 1);
    let casillaAbajoDrch = document.getElementById(id + numFilas + 1);
    let casillaAbajo = document.getElementById(id + numFilas);
    let casillaAbajoIzq = document.getElementById(id + numFilas - 1);

    // Comprobamos las casillas laterales
    if(id > 0 && !bordeIzq && casillaIzq.classList.contains("vacio")) cambioCasilla(casillaIzq,numFilas);
    if(id >= 0 && !bordeDrch && casillaDrch.classList.contains("vacio")) cambioCasilla(casillaDrch,numFilas);

    // Comprobamos las casillas de Arriba
    if(id >= numFilas){
        if(!bordeIzq && casillaArribaIzq.classList.contains("vacio")) cambioCasilla(casillaArribaIzq,numFilas);
        if(casillaArriba.classList.contains("vacio")) cambioCasilla(casillaArriba,numFilas);
        if(!bordeIzq && casillaArribaDrch.classList.contains("vacio")) cambioCasilla(casillaArribaDrch,numFilas);
    }

    // Comprobamos las casillas de abajo
    if(id < (numFilas * (numFilas - 1))){
        if(!bordeIzq && casillaAbajoIzq.classList.contains("vacio")) cambioCasilla(casillaAbajoIzq,numFilas);
        if(casillaAbajo.classList.contains("vacio")) cambioCasilla(casillaAbajo,numFilas);
        if(!bordeDrch && casillaAbajoDrch.classList.contains("vacio")) cambioCasilla(casillaAbajoDrch,numFilas);
    }
}

function cambioCasilla(casilla,numFilas){
    casilla.setAttribute("class","marcada");
    let bombas = parseInt(casilla.getAttribute("data"));
    let id = parseInt(casilla.getAttribute("id"));
    if(bombas == 0){
        checkCasillasAdyacentes(id, numFilas);
    }else{
        casilla.innerHTML = bombas;
    }
}

// Funcion para añadir la condicion de derrota
function derrota(){
    var listaBombas = document.querySelectorAll("td.bomba");
    listaBombas.forEach(element =>{
        element.addEventListener("click",function(e){
            document.getElementById("form-error").innerHTML = "Has perdido el juego";

            listaBombas.forEach(element =>{
                element.setAttribute("class","derrota")
            })
        })
    });
}

// Funcion para calcular la condicion de victoria
function victoria(){
    let numFilas = parseInt(document.getElementById("tablero").getAttribute("numFilas"));
    let numBombas = parseInt(document.getElementById("tablero").getAttribute("numBombas"));
    let winCon = numFilas**2 - numBombas;
    let lista_marcadas = document.querySelectorAll("td.marcada");

    if(lista_marcadas.length == winCon && winCon != 0 && document.getElementById("form-error").innerHTML != "Has ganado el juego"){
        document.getElementById("form-error").innerHTML = "Has ganado el juego";
    }
}

function banderas(){
    let listaCasillas = document.querySelectorAll("td");

    listaCasillas.forEach(casilla =>{
        casilla.addEventListener("contextmenu",element => {
            element.preventDefault();
            if(casilla.classList.contains("bandera")){
                casilla.classList.remove("bandera");
            }else{
                casilla.classList.add("bandera");
            }
        })
    })
}


// Funcion para añadir los eventos 
function addEvent(){
    let btn = document.getElementById("form-button");
    btn.addEventListener("click",element =>{
        element.preventDefault();
        renderTable();

        juego();

        banderas();
    });
}

// Programa
addEvent();