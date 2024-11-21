"use strict"

class Empleado{
    #nombre 
    #apellido
    #nacimiento
    #sueldo
    #email
    #dni

    constructor(nombre, apellido, nacimiento, sueldo,email,dni){
        this.#nombre = nombre;
        this.#apellido = apellido;
        this.#nacimiento = nacimiento;
        this.#sueldo = sueldo;
        this.#email = email;
        this.#dni = dni;
    }

    // Creamos un toString para almacenar la información de la clase segun las columnas
    toString(){
        return `<tr>
                    <td>${this.#nombre}</td>
                    <td>${this.#apellido}</td>
                    <td>${this.#nacimiento}</td>
                    <td>${this.#sueldo}</td>
                    <td>${this.#email}</td>
                    <td>${this.#dni}</td>
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
        let email = document.createElement("td");
        let dni = document.createElement("td");

        // Ponemos el contenido de cada elemento
        nombre.textContent = this.#nombre;
        apellido.textContent = this.#apellido;
        nacimiento.textContent = this.#nacimiento;
        sueldo.textContent = this.#sueldo;
        email.textContent = this.#email;
        dni.textContent = this.#dni;

        // Les añadimos los elementos que hemos creado
        fila.appendChild(nombre);
        fila.appendChild(apellido);
        fila.appendChild(nacimiento);
        fila.appendChild(sueldo);
        fila.appendChild(email);
        fila.appendChild(dni);

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

    get email(){return this.#email};
    set email(email){this.#email = email};

    get dni(){return this.#dni};
    set dni(dni){this.#dni = dni};
}

// Funcion para comprobar si un dni es verdadero o falso
function checkDni(user_dni){
    // Creamos un array con las letras en su orden
    let letra = ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"]

    // dividimos el numero del DNI entre 23
    let resto = user_dni.slice(0,-1) % 23;
    
    // Comprobamos si la letra coincide con el array
    if (user_dni.slice(-1).toUpperCase() === letra[resto]){
        alert("Esta correcto el DNI")
    }else{
        alert("El DNI es falso")
    } 
}
function checkday(day,max){
    if(day > max){return false;}
    else{return true;}
}
// Funcion para comprobar si una fecha es valida
function checkDate(user_date){
    let array_date = user_date.split("/");   
    switch(array_date[1]){
        case "01": return checkday(array_date[0],31);
        case "02": return checkday(array_date[0],28);
        case "03": return checkday(array_date[0],31);
        case "04": return checkday(array_date[0],30);
        case "05": return checkday(array_date[0],31);
        case "06": return checkday(array_date[0],30);
        case "07": return checkday(array_date[0],31);
        case "08": return checkday(array_date[0],31);
        case "09": return checkday(array_date[0],30);
        case "10": return checkday(array_date[0],31);
        case "11": return checkday(array_date[0],30);
        case "12": return checkday(array_date[0],31);
        default: return false;
    }
}

// MAIN
let empleados = [
    new Empleado("Ivan","Bascones","16/07/2002",28000,"ibascub2017@hotmail.com", "71982231M"),
    new Empleado("Chindas","Vinto","01/01/2001",30000,"ChinVin@gmail.com","12345678A"),
    new Empleado("Juan","Cruz","15/06/1772",38000,"JC@gmail.es","98765432B"),
    new Empleado("Rosa","Melano","12/12/1987",40000,"rosamel@ano.es","45678923C"),
    new Empleado("Sabrina","Carpenter","20/10/2010",20000,"sab@hotmail.es","13579246D"),
    new Empleado("Eulanio","Fernandez","28/02/1999",54000,"eufez@gmail.es","15542278F")
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
    let email = document.getElementById("email").value
    let dni = document.getElementById("dni").value

    let empleado = new Empleado(nombre,apellido,nacimiento,sueldo,email)
    empleados.push(empleado);

    let tabla = document.getElementById("lista-empleados");
    let fila = empleado.render()
    tabla.appendChild(fila)
})

// Comprobamos si el formato del email es correcto
let forEmail = document.getElementById("email");
let forDni = document.getElementById("dni");
let forFecha = document.getElementById("nacimiento");
let pattern_email = /[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}/;
let pattern_dni = /^[0-9]{8}[a-zA-Z]+$/;
let pattern_fecha = /^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/;


// Hacemos un nuevo evento para comprobar el contenido que ha escrito
forEmail.addEventListener("blur",function(e){
    if(!pattern_email.test(forEmail.value) && forEmail.value != ""){
        alert("El formato del correo electronico no es valido");
    }
});

// Hacemos un evento para comprobar que el dni esta bien escrito y si es falso o verdadero el dni introducido
forDni.addEventListener("blur",function(e){
    if(pattern_dni.test(forDni.value) && forDni.value != ""){
        checkDni(forDni.value);
    }else if(forDni.value != ""){
        alert("El formato del DNI es 8 numeros y una letra")
    }else{}
});

// Hacemos un evento para comprobar el formato de la fecha
forFecha.addEventListener("blur",function(e){
    if(!pattern_fecha.test(forFecha.value) && forFecha.value != ""){
        alert("El formato es incorrecto Mierda seca")
    }else{
        if(checkDate(forFecha.value)){
            alert("Fecha valida");
        }else{
            alert("Fecha no valida");
        };
    }
});