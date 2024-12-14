// FUNCIONES
function inputprepare(input,type,value){
    input.setAttribute("type",type);
    input.setAttribute("value",value);
}

// MAIN
let menu = document.getElementById("menu-select");

menu.addEventListener("click", e =>{
    let opcion = parseInt(menu.value);

    let div = document.getElementById("data-corredor");
    
    div.innerHTML = "";

    let in5km = document.createElement("input");
    let in10km = document.createElement("input");
    let inMedMarth = document.createElement("input");
    let inMarth = document.createElement("input");
    
    let nameMar = document.createElement("input");
    let disMar = document.createElement("input");
    let desnivelMar = document.createElement("input");
    let tiempoMar = document.createElement("input");

    let cont1 = document.createElement("div");
    let cont2 = document.createElement("div");
    let cont3 = document.createElement("div");
    let cont4 = document.createElement("div");
    cont1.setAttribute("class","input-data");
    cont2.setAttribute("class","input-data");
    cont3.setAttribute("class","input-data");
    cont4.setAttribute("class","input-data");

    let text1 = document.createElement("p");
    let text2 = document.createElement("p");
    let text3 = document.createElement("p");
    let text4 = document.createElement("p");

    switch(opcion){
        case 1:
        
        break;
        case 2:
            inputprepare(in5km,"text","12:37");
            inputprepare(in10km,"text","13:42");
            inputprepare(inMedMarth,"text","16:53");
            text1.innerHTML = "Mejor marca de 5km";
            cont1.appendChild(text1);
            cont1.appendChild(in5km);
            div.appendChild(cont1);

            text2.innerHTML = "Mejor marca de 10km";
            cont2.appendChild(text2);
            cont2.appendChild(in10km);
            div.appendChild(cont2);

            text3.innerHTML = "Mejor marca de media Maraton";
            cont3.appendChild(text3);
            cont3.appendChild(inMedMarth);
            div.appendChild(cont3);
        break;
        case 3:
            inputprepare(inMedMarth,"text","16:53");
            inputprepare(inMarth,"text","18:37");
            
            text1.innerHTML = "Mejor marca de media Maraton";
            cont1.appendChild(text1);
            cont1.appendChild(inMedMarth);
            div.appendChild(cont1);
            
            text2.innerHTML = "Mejor marca de Maraton";
            cont2.appendChild(text2);
            cont2.appendChild(inMarth);
            div.appendChild(cont2);
        break;
        case 4:
            inputprepare(nameMar,"text","Marathon de Nueva York");
            inputprepare(disMar,"text","24km");
            inputprepare(desnivelMar,"text","600m");
            inputprepare(tiempoMar,"text","12:37");
            
            text1.innerHTML = "Nombre de la maraton";
            cont1.appendChild(text1);
            cont1.appendChild(nameMar);
            div.appendChild(cont1);

            text2.innerHTML = "Distancia de la maraton";
            cont2.appendChild(text2);
            cont2.appendChild(disMar);
            div.appendChild(cont2);

            text3.innerHTML = "Desnivel de la maraton";
            cont3.appendChild(text3);
            cont3.appendChild(desnivelMar);
            div.appendChild(cont3);

            text4.innerHTML = "Tiempo empleado para completarla";
            cont4.appendChild(text4);
            cont4.appendChild(tiempoMar);
            div.appendChild(cont4);
        break;
    }
})
