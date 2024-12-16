"use strict";

// Funcion para renderizar los mensajes
function renderMessage(array){
    if(array.length != 0){
        // Recogemos el contenedor div
        let container = document.getElementById("container-mensajes");

        // Borramos el contenido del container antes de modificar
        container.innerHTML = "";

        // Creamos los mensajes
        for (let i = 0; i < array.length; i++) {
            let div = document.createElement("div");
            div.setAttribute("class","mensaje");
            let p = document.createElement("p");
            p.setAttribute("class","texto");
            p.innerHTML = array[i]["content"];
            let label = document.createElement("label");
            label.setAttribute("class","time");
            label.innerHTML = array[i]["day"];
            
            div.appendChild(label);
            div.appendChild(p);
            container.appendChild(div);
        }
    }
    
}

function saveMessage(contenido,dia){
    // Creamos el elemento con la informacion
    let mensaje = {
        "content": contenido,
        "day" : dia
    }
    
    let lista_mensajes = [];

    // Preguntamos si tiene informacon el localStorage
    if(localStorage.getItem("lista-mensajes")){
        lista_mensajes = JSON.parse(localStorage.getItem("lista-mensajes"));
        lista_mensajes.push(mensaje)
        localStorage.setItem("lista-mensajes",JSON.stringify(lista_mensajes));
    }else{
        lista_mensajes.push(mensaje);
        localStorage.setItem("lista-mensajes",JSON.stringify(lista_mensajes));
    }

}

// Funcion para añadir los eventos al HTML
function addEvents(){
    // Creamos el evento en el boton para q recoga la información
    let boton = document.getElementById("form-btn");

    boton.addEventListener("click", e =>{
        e.preventDefault();
        // Recogemos la informacion 
        let contenido = document.getElementById("form-mensaje").value
        let fecha = new Date();
        saveMessage(contenido,fecha.toISOString());
        let lista_mensajes = JSON.parse(localStorage.getItem("lista-mensajes"));
        renderMessage(lista_mensajes);
    });

}

// MAIN
let lista_mensajes = JSON.parse(localStorage.getItem("lista-mensajes"));
// Para q te renderize los mensajes directamente
if(lista_mensajes){
    renderMessage(lista_mensajes);
}

addEvents();