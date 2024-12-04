// Una función para saber si es un numero primo
function esPrimo(numero){
    divisor = numero - 1;
    while(numero%divisor != 0){
        divisor--;
    }
    if(divisor == 1){
        return true;
    }else{
        return false;
    }
}
// Una funcion para crear un array de numeros primos
function numPrimo(cant){
    let primos = []
    let n = 0;
    for(i= 1; n < cant; i++){
        if(esPrimo(i)){
            primos.push(i) // El comando push sirve para insertar un elemento nuevo al array
            n++;
        }
    }
    return primos;
}

function factorizar(num){
    // Array con los 100  primeros numeros primos que me conozco de memoria 
    let p = numPrimo(100);
    // Array que nos va a devolver la combinación de los factores primos
    let fact = [];
    let aux = num;
    // Calculamos los factores primos del numeros
    for (let i = 0; i < p.length; i++) {
        console.log()
        if(aux % p[i] == 0){
            fact.push(p[i]);
            aux = aux / p[i];
            i = -1;
        }
        if(aux == 1){
            i = p.length;
        }
    }
    return fact;
}