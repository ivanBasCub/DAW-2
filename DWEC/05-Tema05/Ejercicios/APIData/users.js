"use strict"

/*
Se cogera la informacion de la siguiente API
https://jsonplaceholder.typicode.com/

Atacaremos a las zonas de users / albums y to dos (todos)

La informacion se recibe desde un enlace
*/

// Constantes
const URLAPI = "https://jsonplaceholder.typicode.com";

// Funciones 
async function renderUser(id) {
    // Preparamos la URL
    let url = URLAPI + "/users/" + id;
    
    // Solicitamos la informacion a la API
    const res = await fetch(url);
    const user = await res.json();

    // Empezamos a montar el DOM que vamos a mostrar
    let main = document.getElementById("container");
    // Nombre de usuario
    let username = document.createElement("h2");
    username.innerHTML = user["username"];
    main.appendChild(username)
    
    // Nombre Real
    let name = document.createElement("p");
    name.innerHTML = "Nombre: " + user["name"];
    main.appendChild(name)
    
    // Correo electronico
    let email = document.createElement("p");
    email.innerHTML = "Correo Electronico: " + user["email"];
    main.appendChild(email);

    // Telefono
    let tel = document.createElement("p");
    tel.innerHTML = "Telefono: " + user["phone"];
    main.appendChild(tel);

    // address
    let address = document.createElement("p");
    address.innerHTML = "Dirección: " + user["address"]["street"] + ", " + user["address"]["suite"];
    main.appendChild(address);

    // Company
    let company = document.createElement("p");
    company.innerHTML = "Compañia: " + user["company"]["name"];
    main.appendChild(company);

    // Albums
    renderAlbum(url,main);

    // To Do
    renderToDo(url,main);
}

// Funcion para renderizar todos los to do relacionados al usuario
async function renderToDo(userURL,main){
    // Preparamos la URL
    let url = userURL + "/todos";

    // Recogemos la informacion de la API
    const res = await fetch(url);
    const todos = await res.json();

    // Ponemos el titulo
    let title = document.createElement("h3");
    title.innerHTML = "To Do";
    main.appendChild(title);

    // Creamos una lista
    let list = document.createElement("ul");
    
    // Insertamos los elementos en la lista
    todos.forEach(todo => {
        let element = document.createElement("li");
        let link = document.createElement("a");
        let href = "#";
        link.setAttribute("href",href);
        link.innerHTML = todo["title"];
        element.appendChild(link);
        list.appendChild(element);
    });
    
    main.appendChild(list);
}

// Funcion para renderizar todos los albums relacionados al usuario
async function renderAlbum(userURL,main){
    // Preparamos la URL
    let url = userURL + "/albums";

    // Recogemos la informacion de la API
    const res = await fetch(url);
    const albums = await res.json();
    
    // Ponemos el titulo
    let title = document.createElement("h3");
    title.innerHTML = "Albums";
    main.appendChild(title);

    // Creamos una lista
    let list = document.createElement("ul");
    
    // Insertamos los elementos en la lista
    albums.forEach(album => {
        let element = document.createElement("li");
        let link = document.createElement("a");
        let href = "#";
        link.setAttribute("href",href);
        link.innerHTML = album["title"];
        element.appendChild(link);
        list.appendChild(element);
    });
    
    main.appendChild(list);
}

function main(){
    let rawData = window.location.search;
    let array_data =rawData.split("="); 

    renderUser(array_data[1]);
}

main();

let urlParams = new URLSearchParams(window.location.search);
let id = urlParams.get("id");
console.log(id)
