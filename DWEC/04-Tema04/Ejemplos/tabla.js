"use strict";

// Nombre, Apellidos, Año de Nacimiento, Sueldo

let empleados = [
    { nombre: "Pepe", apellido: "Gimenez", nacimiento: 1999, sueldo: 30000},
    { nombre: "Sandra", apellido: "Lopez", nacimiento: 2000, sueldo: 41000},
    { nombre: "Juan", apellido: "Perez", nacimiento: 1745, sueldo: 123456789},
    { nombre: "Luisa", apellido: "Pelos", nacimiento: 2411, sueldo: 99900},
];

// Filtrar por sueldo > 60000
let empleadosSueldoAlto = empleados.filter(empleado =>{
    return (empleado.sueldo > 60000);
});

// Ordenar los elementos de un array de objetos al reves
let empleadosPorOrdenDeNacimiento = empleados.sort((a,b) =>{
    return a.nacimiento - b.nacimiento;
});