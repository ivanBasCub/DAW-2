// Ivan Bascones Cubillo
"use strict";

// Funciones
// Funcion para renderizar todas las tareas creadas
function renderTareas(array){
    
    let lista = document.getElementById("lista");

    lista.innerHTML = "";
    if(array.length != 0){
        for (let i = 0; i < array.length; i++) {
            
            let element = renderTarea(array[i]["content"],array[i]["realizada"],i);
            if(element){
                lista.appendChild(element,i);
            }
            
        }
    }
}

// Funcion para renderizar cada tarea
function renderTarea(name,hecha,id){
    if(name != ""){
        let element = document.createElement("li");
        let text = document.createElement("label");
        text.innerHTML = name;
        let check = document.createElement("input");
        check.setAttribute("type","checkbox");
        
        if(hecha==="true"){
            text.classList.add("marcada");
            check.innerText ="on";
        }
        
        // Creamos el evento que vamos a usar para que cambie de valor
        check.addEventListener("click", e=>{
            
            if(text.classList.contains("marcada")){
                text.classList.remove("marcada");
                modTarea(id,"false");
            }else{
                text.classList.add("marcada");
                modTarea(id,"true");
            }
        })

        let del = document.createElement("button");
        del.innerHTML = "borrar";
        del.classList.add("btn")
        del.addEventListener("click", e=>{
            removeTarea(id);

        });


        element.appendChild(check);
        element.appendChild(text);
        element.appendChild(del);
        return element;
    }
}

// Funcion para modificar la tarea dentro del array para saber si esta terminada o no
function modTarea(id,hecha){
    
    let lista_tareas = JSON.parse(localStorage.getItem("lista-tareas"));
    lista_tareas[id]["realizada"] = hecha;
    localStorage.setItem("lista-tareas",JSON.stringify(lista_tareas));
}

// Funcion para "eliminar" una tarea (no me acuerdo de como borrar un elemento de un array)

function removeTarea(id){
    let lista_tareas = JSON.parse(localStorage.getItem("lista-tareas"));
    lista_tareas[id]["content"] = "";
    localStorage.setItem("lista-tareas",JSON.stringify(lista_tareas));
    renderTareas(lista_tareas);
}

// Funcion para añadir una tarea 

function addTarea(contenido){
    // Creamos el elemento con informacion
    let tarea = {
        "content" : contenido,
        "realizada" : "false"
    }

    let lista_tareas = [];

    if(localStorage.getItem("lista-tareas")){
        lista_tareas = JSON.parse(localStorage.getItem("lista-tareas"));
        lista_tareas.push(tarea)
        localStorage.setItem("lista-tareas",JSON.stringify(lista_tareas));
    }else{
        lista_tareas.push(tarea)
        localStorage.setItem("lista-tareas",JSON.stringify(lista_tareas));
    }
}

// Funcion para añadir los elementos o la funcion main ya que casi todas las funciones son usadas aqui

function addEvents(){
    let add = document.getElementById("add-task");

    add.addEventListener("click", e=>{
        e.preventDefault();
        let tarea = document.getElementById("tarea").value;
        if(tarea != ""){
            addTarea(tarea); 
        }
        let lista_tareas = JSON.parse(localStorage.getItem("lista-tareas"));
        renderTareas(lista_tareas);
    })
}
// Main

addEvents();

let lista_tareas = JSON.parse(localStorage.getItem("lista-tareas"));
// Para q te renderize los mensajes directamente
if(lista_tareas){
    renderTareas(lista_tareas);
}

