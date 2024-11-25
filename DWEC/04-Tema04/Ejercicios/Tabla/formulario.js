"use strict"
// Funcion para crear un formulario de HTML a JavaScript

function crearFormulario(){
    // Recogemos la información del body
    let body = document.getElementById("main");

    // Creamos el formulario con sus atributos
    let form = document.createElement("form");
    form.setAttribute("action","get");
    
    // Creamos el contenedor principal del formulario y con sus atributos
    let main = document.createElement("div");
    main.setAttribute("class","formulario");
    
    // Creamos dos arrays con la información de los elementos que van a mostrarse a continuacion
    let info_text = ["Nombre","Apellidos","Fecha de nacimiento","Sueldo","Correo Electronico","DNI","Añadir"];
    let info_id = ["nombre","apellidos","nacimiento","sueldo","email","dni","formulario-enviar"];

    for (let i = 0; i < info_text.length; i++) {
        // Creamos el contenedor que contendra todas las filas del formulario
        let fila = document.createElement("div");
        fila.setAttribute("class","formulario-fila");
        if(i < (info_text.length - 1)){
            let label = document.createElement("label");
            label.setAttribute("for",info_id[i]);
            label.innerHTML = info_text[i];

            let input = document.createElement("input");
            input.setAttribute("id",info_id[i]);
            input.setAttribute("type","text");
            input.setAttribute("name",info_id[i]);

            // Introducimos cada elemento en su padre
            fila.appendChild(label);
            fila.appendChild(input);
        }else{
            let button = document.createElement("button");
            button.setAttribute("id",info_id[i]);
            button.innerHTML = info_text[i];

            fila.appendChild(button);
        }
        main.appendChild(fila);
    }
    form.appendChild(main);
    body.appendChild(form);
}

crearFormulario();