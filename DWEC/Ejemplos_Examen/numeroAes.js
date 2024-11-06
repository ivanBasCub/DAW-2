function numeroDeAes(palabra){
    let letra = "a";
    let total = 0;

    for (let i = 0; i < palabra.length; i++) {
        if(palabra[i] == letra){
            total ++;
        }
    }
    return total;
}

console.log(numeroDeAes("abracadabra")) // 5
console.log(numeroDeAes("etinol")) // 0
console.log(numeroDeAes("")) // 0