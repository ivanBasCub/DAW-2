"use strict";

let ordenador = {
    "modelo" : "JXP3300",
    "marca" : "Godofredo",
    "precio" : 4000,
    "memoria" : "32GB",
    "peso" : "1500Kg",
}

document.addEventListener("DOMContentLoaded", event =>{
    console.log(`Las cookies antes de : ${document.cookie}`);
    document.cookie = `Variable = ${Date.now()}`;
    console.log(`Las cookies despues de : ${document.cookie}`);

    localStorage.setItem("hacked","true");
    let hacked = localStorage.getItem("hacked");
    console.log(`Hacked = ${hacked}`);
    let sessionHacked = sessionStorage.getItem("hacked");
    console.log(`Hacked = ${sessionHacked}`);

    sessionStorage.setItem("ordenador", JSON.stringify(ordenador));
    console.log(`Mi nuevo ordenador es: ${sessionStorage.getItem("ordenador")}`);
    console.log(JSON.parse(sessionStorage.getItem("ordenador")))
})