"use strict"

/*
    Lo mismo que los archivo post_coments.js y users.js pero juntos
    pero todo en la misma página web
*/

// Constantes
const URLAPI = "https://jsonplaceholder.typicode.com";

// Funciones

    // Funcion para renderizar todos los posts
    async function renderPosts(){
        // Preparamos la url
        let url = URLAPI + "/posts";
        // Reclamamos los datos de la API
        const res = await fetch(url);
        const posts = await res.json();


        // Lo relacionamos con el html
        let container = document.getElementById("container");
        container.innerHTML = "";

        posts.forEach(post => {

            // Creamos el contendor principal del post
            let postBox = document.createElement("div");
            postBox.setAttribute("class","post");

            // Creamos los contenidos del contenedor
            let title = document.createElement("h3");
            title.setAttribute("class","postTitle");
            title.innerHTML = post["title"];
            
            let content = document.createElement("p");
            content.setAttribute("class","postContent");
            content.innerHTML = post["body"];

            // Creamos el btn de los comentarios
            let btnComments = document.createElement("p");
            btnComments.setAttribute("id","btn");
            btnComments.innerHTML = "Comentarios";

            // Creamos el boton para enviar la informacion al autor
            let autor = document.createElement("a");
            let href = "index.html?id=" + post["userId"];
            autor.innerHTML="Autor";
            autor.setAttribute("href",href);

            // Añadimos todo al contenedor del post
            postBox.appendChild(title);
            postBox.appendChild(content);
            postBox.appendChild(autor);
            postBox.appendChild(btnComments);
            renderComments(post["id"],postBox);

            // Creamos un addeventlistener para q el btn funcione
            btnComments.addEventListener("click",(e) =>{
                let classBox = "comments" + post["id"];
                let comentBox = document.getElementById(classBox);

                if(comentBox.classList.contains("no-visible")){
                    comentBox.classList.remove("no-visible");
                }else{
                    comentBox.classList.add("no-visible");
                }
            })

            container.appendChild(postBox);
        });
    }

    // Funcion que renderiza todos los comentarios de cada post
    async function renderComments(id,postBox){
        // Creamos la URL para filtrar los datos
        let url = URLAPI + "/posts/" + id + "/comments";

        // Recogemos los datos de la API
        const res = await fetch(url);
        const comments = await res.json();

        // Creamos el contenedor de los 
        let comBox = document.createElement("div");
        let classBox = "comments" + id;
        comBox.setAttribute("id",classBox);
        comBox.setAttribute("class", "no-visible");

        // Imprimimos los comentarios
        comments.forEach(comment =>{
            let commentBox = document.createElement("div");
            commentBox.setAttribute("class","message");

            let title = document.createElement("h4");
            title.setAttribute("class","titleMessage");
            title.innerHTML = comment["name"];

            let user = document.createElement("p");
            user.setAttribute("class","user");
            user.innerHTML = comment["email"];

            let body = document.createElement("p");
            body.setAttribute("class","bodyMessage");
            body.innerHTML = comment["body"];

            commentBox.appendChild(title);
            commentBox.appendChild(user);
            commentBox.appendChild(body);
            comBox.appendChild(commentBox);
        });

        postBox.appendChild(comBox);
    }

    // Funcion que nos permite renderizar un usuario
    async function renderUser(id) {
        // Preparamos la URL
        let url = URLAPI + "/users/" + id;
        
        // Solicitamos la informacion a la API
        const res = await fetch(url);
        const user = await res.json();
    
        // Empezamos a montar el DOM que vamos a mostrar
        let main = document.getElementById("container");
        main.innerHTML = "";

        let userDiv = document.createElement("div");
        userDiv.classList.add("user");

        // Nombre de usuario
        let username = document.createElement("h2");
        username.innerHTML = user["username"];
        userDiv.appendChild(username)
        
        // Nombre Real
        let name = document.createElement("p");
        name.innerHTML = "Nombre: " + user["name"];
        userDiv.appendChild(name)
        
        // Correo electronico
        let email = document.createElement("p");
        email.innerHTML = "Correo Electronico: " + user["email"];
        userDiv.appendChild(email);
    
        // Telefono
        let tel = document.createElement("p");
        tel.innerHTML = "Telefono: " + user["phone"];
        userDiv.appendChild(tel);
    
        // address
        let address = document.createElement("p");
        address.innerHTML = "Dirección: " + user["address"]["street"] + ", " + user["address"]["suite"];
        userDiv.appendChild(address);
    
        // Company
        let company = document.createElement("p");
        company.innerHTML = "Compañia: " + user["company"]["name"];
        userDiv.appendChild(company);
    
        let back = document.createElement("a");
        back.setAttribute("href","index.html");
        back.innerHTML = "Volver a la página principal";
        userDiv.appendChild(back)

        // Albums
        renderAlbum(url,userDiv);
    
        // To Do
        renderToDo(url,userDiv);

        main.appendChild(userDiv)
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

    // Funcion que ejecuta el grueso del programa
    function main(){
        let urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get("id");

        if(id != undefined){
            renderUser(id);
        }else{
            renderPosts();
        }
    }

// Main
main()