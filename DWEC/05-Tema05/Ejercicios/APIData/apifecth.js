"use strict";
// Anotaciones iniciales
/* 
API que vamos a usar
https://jsonplaceholder.typicode.com/

*/
// Funciones 

// Funcion para renderizar el post 
function renderPost(postData){
    // Lo relacionamos con el html
    let container = document.getElementById("container");

    // Creamos el contendor principal
    let postBox = document.createElement("div");
    postBox.setAttribute("class","post")

    // Creamos los contenidos del contenedor
    let title = document.createElement("h3");
    title.setAttribute("class","postTitle");
    title.innerHTML = postData["title"];

    let content = document.createElement("p");
    content.setAttribute("class","postContent");
    content.innerHTML = postData["body"];

    let btnComments = document.createElement("p");
    btnComments.setAttribute("id","btn");
    btnComments.innerHTML = "Comentarios";

    postBox.appendChild(title);
    postBox.appendChild(content);
    postBox.appendChild(btnComments);
    renderComments(postData["id"],postBox); 
    
    // Creamos un addeventlistener para q el btn funcione
    btnComments.addEventListener("click",(e) =>{
        let classBox = "comments" + postData["id"];
        let comentBox = document.getElementById(classBox);

        if(comentBox.classList.contains("no-visible")){
            comentBox.classList.remove("no-visible");
        }else{
            comentBox.classList.add("no-visible");
        }
    })
    
    container.appendChild(postBox);
}

// Funcion para renderizar todos los comentarios relacionados al post q estamos renderizando 
function renderComments(idPost,postBox){
    let url = "https://jsonplaceholder.typicode.com/comments?postId=" + idPost;

    fetch(url)
    .then((reponse) => reponse.json())
    .then((json) => {
        let comBox = document.createElement("div");
        let classBox = "comments" + idPost;
        comBox.setAttribute("id",classBox);
        comBox.setAttribute("class", "no-visible");

        json.forEach(comment =>{
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
        })

        postBox.appendChild(comBox);
    });
}

document.addEventListener("DOMContentLoaded",(e) =>{
    fetch('https://jsonplaceholder.typicode.com/posts')
    .then((response) => response.json())
    .then((json) => {
        json.forEach(post => {
            renderPost(post);
        });
    });
})
