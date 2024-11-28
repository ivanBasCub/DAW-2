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

//crearFormulario();

/* Generar el DOM con el JSON */
/* Funciones */
function renderDOMElement(descpElemento){
    /* Creamos el elemento en el DOM */
    let elemento = document.createElement(descpElemento.tag);
    // Crea un objeto que vamos a contener los atributos del elemento
    let listaAtributos = descpElemento.attributes;

    // Se los añadimos al elemento que se ha creado
    for(let attr in listaAtributos){
        elemento.setAttribute(attr, listaAtributos[attr]);
    }

    // Esto es para poner valores por defecto en las variables de javascript
    let descpContenido = descpElemento.content || [];

    // For of es para iterar elemenetos de un array y aplicamos recursividad
    for (let descpChild of descpContenido){
        let child = renderDOMElement(descpChild);
        elemento.appendChild(child);
    }
    // Meter el texto en las labels
    if(descpElemento.textContent){
        elemento.textContent = descpElemento.textContent;
    }

    // Devolvemos el elemento
    return elemento;
}

function renderForm(){
    // Recogemos la información del body
    let body = document.getElementById("main");

    // Creamos el formulario con sus atributos
    let form = document.createElement("form");
    form.setAttribute("action","get");

    form.appendChild(renderDOMElement(formDescripcion));
    
    body.appendChild(form);

}

/* Creación de la estructura a traves del Json */
const formDescripcion = {
    tag: "div",
    attributes: {
        class: "formulario",
        id: "formulario-contenido-div",
    },
    content: [
        {
            tag: "div",
            attributes: {
                class:"formulario-fila"
            },
            content: [
                {
                    tag: "label",
                    attributes: {
                        for: 'nombre'
                    },
                    textContent: 'Nombre'
                },
                {
                    tag: "input",
                    attributes:{
                        type: 'text',
                        id: 'nombre',
                        name: 'nombre'
                    },
                }
            ]
        },
        {
            tag: "div",
            attributes: {
                class:"formulario-fila"
            },
            content: [
                {
                    tag: "label",
                    attributes: {
                        for: 'apellidos'
                    },
                    textContent: 'Apellidos'
                },
                {
                    tag: "input",
                    attributes:{
                        type: 'text',
                        id: 'apellidos',
                        name: 'apellidos'
                    },
                }
            ]
        },
        {
            tag: "div",
            attributes: {
                class:"formulario-fila"
            },
            content: [
                {
                    tag: "label",
                    attributes: {
                        for: 'nacimiento'
                    },
                    textContent: 'Fecha de nacimiento'
                },
                {
                    tag: "input",
                    attributes:{
                        type: 'text',
                        id: 'nacimiento',
                        name: 'nacimiento'
                    },
                }
            ]
        },
        {
            tag: "div",
            attributes: {
                class:"formulario-fila"
            },
            content: [
                {
                    tag: "label",
                    attributes: {
                        for: 'sueldo'
                    },
                    textContent: 'Sueldo'
                },
                {
                    tag: "input",
                    attributes:{
                        type: 'text',
                        id: 'sueldo',
                        name: 'sueldo'
                    },
                }
            ]
        },
        {
            tag: "div",
            attributes: {
                class:"formulario-fila"
            },
            content: [
                {
                    tag: "label",
                    attributes: {
                        for: 'email'
                    },
                    textContent: 'Nombre'
                },
                {
                    tag: "input",
                    attributes:{
                        type: 'email',
                        id: 'email',
                        name: 'email'
                    },
                }
            ]
        },
        {
            tag: "div",
            attributes: {
                class:"formulario-fila"
            },
            content: [
                {
                    tag: "label",
                    attributes: {
                        for: 'dni'
                    },
                    textContent: 'DNI'
                },
                {
                    tag: "input",
                    attributes:{
                        type: 'text',
                        id: 'dni',
                        name: 'dni'
                    },
                }
            ]
        },
        {
            tag: "div",
            attributes: {
                class: "formulario-fila"
            },
            content:[
                {
                    tag: "button",
                    attributes: {id: "formulario-enviar"},
                    textContent: "Añadir"
                }
            ]
        }
    ]
};

// Llamamos a la funcion para crear el elemento
renderForm();