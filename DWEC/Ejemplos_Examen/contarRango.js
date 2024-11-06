function contarRango(min, max){
    if (min < max){
        return (max - min) - 1;
    }else{
        return (min - max) - 1;
    }
    
}

// código de prueba
console.log(contarRango(1, 9)) // 7
console.log(contarRango(1332, 8743)) // 7410
console.log(contarRango(5, 6)) // 0