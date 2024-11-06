function numeroDeCaracteres(palabra, letra){
    let total = 0;

    for (let i = 0; i < palabra.length; i++) {
        if(palabra[i] == letra){
            total ++;
        }
    }
    return total;
}

console.log(numeroDeCaracteres("Hola Mundo", "o")) // 2
console.log(numeroDeCaracteres("MMMMM", "m")) // 0
console.log(numeroDeCaracteres("eeee", e)) // 4