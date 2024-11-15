"use strict"

class Empleado{
    #nombre
    #apellido
    #nacimiento
    #sueldo

    constructor(nombre, apellido, nacimiento, sueldo){
        this.#nombre = nombre;
        this.#apellido = apellido;
        this.#nacimiento = nacimiento;
        this.#sueldo = sueldo;
    }

    // Creamos un toString para almacenar la información de la clase segun las columnas
    toString(){
        return `<tr>
                    <td>${this.#nombre}</td>
                    <td>${this.#apellido}</td>
                    <td>${this.#nacimiento}</td>
                    <td>${this.#sueldo}</td>
                </tr>`;
    }

    // Creamos los setters y los getters de la clase
    get nombre(){return this.#nombre};
    set nombre(nombre){this.#nombre = nombre};
    
    get apellido(){return this.#apellido};
    set apellido(apellido){this.#apellido = apellido};
    
    get nacimiento(){return this.#nacimiento};
    set nacimiento(nacimiento){this.#nacimiento = nacimiento};
    
    get sueldo(){return this.#sueldo};
    set sueldo(sueldo){this.#sueldo = sueldo};
}

// MAIN

let empleados = [
    new Empleado("Ivan","Bascones",2002,28000),
    new Empleado("Chindas","Vinto",2001,30000),
    new Empleado("Juan","Cruz",1772,38000),
    new Empleado("Rosa","Melano",1987,40000),
    new Empleado("Sabrina","Carpenter",2015,20000),
    new Empleado("Eulanio","Fernandez",1999,54000)
]
// Coger un elemento del html por su id
let tabla = document.getElementById("lista-empleados");
// Las dos formas de hacer un forEach
/*
empleados.forEach(function(empleado){});
empleados.forEach(empleado => {});
*/

empleados.forEach(function(empleado){
    tabla.innerHTML += empleado;
});

// Ejercicio
// Ordenar los elementos del array segun el elemento que clicquemos en el titulo

// EXTRA
// Que cuando le des un segundo click que lo ordene de manera inversiva
var aux = 0;

// Escogemos los elemento HTML que vamos a usar para ordenar cuando se de un click encima de ellos
let thNombre = document.getElementById("nombre");
let thApellidos = document.getElementById("apellidos");
let thNacimiento = document.getElementById("nacimiento");
let thSueldo = document.getElementById("sueldo");

// Creamos los eventos onclick
thNombre.addEventListener("click",function(e) {
    // Borramos el contenido de la tabla 
    tabla.innerHTML = '';
    // ordenamos los valores que hay en la tabla segun el nombre
    let empleadoOrdenado = []
    if(aux === 0){
        empleadoOrdenado = empleados.sort(function(a,b){
            return a.nombre.localeCompare(b.nombre)
        })
        aux = 1;
    }else{
        empleadoOrdenado = empleados.sort(function(a,b){
            return b.nombre.localeCompare(a.nombre)
        })
        aux = 0;
    }
    
    // Insertamos la información en la tabla de manera ordenada
    empleadoOrdenado.forEach(empleado =>{
        tabla.innerHTML += empleado;
    })
})

thApellidos.addEventListener("click",function(e) {
    // Borramos el contenido de la tabla 
    tabla.innerHTML = '';
    // ordenamos los valores que hay en la tabla segun el nombre
    let empleadoOrdenado = []
    if(aux === 0){
        empleadoOrdenado = empleados.sort(function(a,b){
            return a.apellido.localeCompare(b.nombre)
        })
        aux = 1;
    }else{
        empleadoOrdenado = empleados.sort(function(a,b){
            return b.apellido.localeCompare(a.nombre)
        })
        aux = 0;
    }
    // Insertamos la información en la tabla de manera ordenada
    empleadoOrdenado.forEach(empleado =>{
        tabla.innerHTML += empleado;
    })
})

thNacimiento.addEventListener("click",function(e) {
    // Borramos el contenido de la tabla 
    tabla.innerHTML = '';
    // ordenamos los valores que hay en la tabla segun el nombre
    let empleadoOrdenado = []
    if(aux === 0){
        empleadoOrdenado = empleados.sort(function(a,b){
            return a.nacimiento - b.nacimiento;
        })
        aux = 1;
    }else{
        empleadoOrdenado = empleados.sort(function(a,b){
            return b.nacimiento - a.nacimiento;
        })
        aux = 0;
    }
    // Insertamos la información en la tabla de manera ordenada
    empleadoOrdenado.forEach(empleado =>{
        tabla.innerHTML += empleado;
    })
})

thSueldo.addEventListener("click",function(e) {
    // Borramos el contenido de la tabla 
    tabla.innerHTML = '';
    // ordenamos los valores que hay en la tabla segun el nombre
    let empleadoOrdenado = []
    if(aux === 0){
        empleadoOrdenado = empleados.sort(function(a,b){
            return a.sueldo - b.sueldo;
        })
        aux = 1;
    }else{
        empleadoOrdenado = empleados.sort(function(a,b){
            return b.sueldo - a.sueldo;
        })
        aux = 0;
    }
    // Insertamos la información en la tabla de manera ordenada
    empleadoOrdenado.forEach(empleado =>{
        tabla.innerHTML += empleado;
    })
})


