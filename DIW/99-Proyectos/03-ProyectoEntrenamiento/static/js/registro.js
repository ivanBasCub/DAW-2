// FUNCIONES
function inputprepare(input,type,name,placeholder){
    input.setAttribute("type",type);
    input.setAttribute("name",name);
    input.setAttribute("placeholder",placeholder);
}


// MAIN

let menu = document.getElementById("form-select");

menu.addEventListener("click", e=>{
    let opcion = parseInt(menu.value);
    
    let div = document.getElementById("tipo-corredor");
    div.innerHTML = "";

    let in5km = document.createElement("input");
    let in10km = document.createElement("input");
    let inMedMarth = document.createElement("input");
    let inMarth = document.createElement("input");
    
    let nameMar = document.createElement("input");
    let disMar = document.createElement("input");
    let desnivelMar = document.createElement("input");
    let tiempoMar = document.createElement("input");

    switch (opcion) {
        case 1:
            div.innerHTML = "";
        break;
        case 2:
            
            inputprepare(in5km,"text","in5km","Mejor marca de 5km");
            inputprepare(in10km,"text","in10km","Mejor marca de 10km");
            inputprepare(inMedMarth,"text","inMedMarth","Mejor marca de una Media Maraton");
            div.appendChild(in5km);
            div.appendChild(in10km);
            div.appendChild(inMedMarth);
            
        break;
        case 3:
            inputprepare(inMedMarth,"text","inMedMarth","Mejor marca de una Media Maraton");
            inputprepare(inMarth,"text","inMarth","Mejor marca de una Maraton");
            div.appendChild(inMedMarth);
            div.appendChild(inMarth);
        break;
        case 4:
            inputprepare(nameMar,"text","nameMar","Nombre de la Maraton");
            inputprepare(disMar,"text","disMar","Distancia de la Maraton");
            inputprepare(desnivelMar,"text","desnivelMar","Desnivel de la Maraton");
            inputprepare(tiempoMar,"text","tiempoMar","Tiempo empleado para completarla");
            div.appendChild(nameMar);
            div.appendChild(disMar);
            div.appendChild(desnivelMar);
            div.appendChild(tiempoMar);
        break;
    }
})