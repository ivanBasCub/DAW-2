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
    // Es un metodo para pintar el contenido de la clase
    render(){
        // createElement crea el elemento pero no le pone en el html
        let fila = document.createElement("tr");
        let nombre = document.createElement("td");
        let apellido = document.createElement("td");
        let nacimiento = document.createElement("td");
        let sueldo = document.createElement("td");
        // Ponemos el contenido de cada elemento
        nombre.textContent = this.#nombre;
        apellido.textContent = this.#apellido;
        nacimiento.textContent = this.#nacimiento;
        sueldo.textContent = this.#sueldo;
        // Les añadimos los elementos que hemos creado
        fila.appendChild(nombre);
        fila.appendChild(apellido);
        fila.appendChild(nacimiento);
        fila.appendChild(sueldo);

        return fila;
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
   // tabla.innerHTML += empleado;
   tabla.appendChild(empleado.render());
});

// Ejercicio
// Ordenar los elementos del array segun el elemento que clicquemos en el titulo

// EXTRA
// Que cuando le des un segundo click que lo ordene de manera inversiva
var aux = 0;

// Escogemos los elemento HTML que vamos a usar para ordenar cuando se de un click encima de ellos
let thNombre = document.getElementById("tabla-nombre");
let thApellidos = document.getElementById("tabla-apellidos");
let thNacimiento = document.getElementById("tabla-nacimiento");
let thSueldo = document.getElementById("tabla-sueldo");

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

// Configuramos el boton para q añadada información a la tabla
let boton = document.getElementById("formulario-enviar");
boton.addEventListener("click", evento => {
    // Impide ejecutar el manejador de eventos predeterminado
    evento.preventDefault();
    
    // Recogemos la información y la guardamos
    let nombre = document.getElementById('nombre').value
    let apellido = document.getElementById('apellidos').value
    let nacimiento = document.getElementById('nacimiento').value
    let sueldo = document.getElementById('sueldo').value

    let empleado = new Empleado(nombre,apellido,nacimiento,sueldo)
    empleados.push(empleado);

    let tabla = document.getElementById("lista-empleados");
    let fila = empleado.render()
    tabla.appendChild(fila)
})