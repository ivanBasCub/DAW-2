// Pedimos el dni
let user_dni = prompt("Inserte tu DNI:");
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