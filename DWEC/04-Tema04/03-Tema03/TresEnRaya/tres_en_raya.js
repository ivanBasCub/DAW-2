// Sera de tamaño 3x3
tablero = [["","",""],["","",""],["","",""]];

// Huecos libres del tablero
huecos = tablero.length ** 2;
letra = "X";
posx = 0;
posy = 0;

while(huecos > 0){
    alert("Juegan las " + letra)
    // Pedir donde va a colocar la ficha
    posx= parseInt(prompt("Elije la posición en el eje X"));
    posy= parseInt(prompt("Elije la posición en el eje Y"));

    // Comprobamos si no esta ocupada
    if(tablero[posx][posy] === ""){
        tablero[posx][posy] = letra;

        if(letra === "X"){
            letra = "O";
        }else{
            letra = "X"
        }
        huecos--;
    }else{
        alert("Esta ocupada esa posicion fijate en el tablero")
    }


    // Mostramos el tablero por pantalla
    for (let i = 0; i < tablero.length; i++) {
        console.log(" " + tablero[i][0] + " | " + tablero[i][1] + " | " + tablero[i][2]);
        console.log("----------");
    }
}
