// Crear una funcion para comprobar si un numero es primo
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

// Crear una funcion para comprobar valores
function DeboSumar(num){
    return esPrimo(num);
}

// Función para sumar segun lo q solicite el usuario
function sumar(num){
    suma = 0 
    for(i = 0; i <= num; i++) { 
        if(DeboSumar(i)){
            suma += i;
        }
    }
    return suma
}

// Función para crear la lista de numeros primos segun la cantidad de numeros que quieras conocer
function numPrimo(cant){
    let primos = []
    let n = 0;
    for(i= 1; n < cant; i++){
        if(esPrimo(i)){
            primos.push(i) // El comando push sirve para insertar un elemento nuevo al array
            n++;
        }
    }
    console.log(primos)
    return "Fin de la lista"
}

// Probamos la funcion de sumar segun el numero que solicite el usuario
console.log(sumar(100))

// Ahora la lista de los numeros primos
console.log("Los 100 primeros numeros primos son:")
console.log(numPrimo(100))