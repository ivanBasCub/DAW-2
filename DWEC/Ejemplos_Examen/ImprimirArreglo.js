function imprimirArreglo(){
    for (let i = 0; i < arguments.length; i++) {
        console.log(arguments[i]);
    }
}
imprimirArreglo(1, "Hola", 2, "Mundo");