"use strict";

let palabras = ["zapatila","hola","mundo","patata","tomate","zanahoria"]

palabras.forEach( function (elem) {console.log(elem)} );
palabras.forEach( function (elem, indice) { console.log(indice, elem) } );
palabras.forEach( (elem, indice) => { console.log(indice, elem)} );

palabras.forEach( elem => {
    console.log(elem.toUpperCase());
})

let palabrasEnMayusculas = palabras.map(elem => elem.toUpperCase());
console.log(palabrasEnMayusculas);
