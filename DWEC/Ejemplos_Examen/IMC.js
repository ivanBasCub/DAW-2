function bmi(peso, altura){
    let result = peso / (altura ** 2);

    if (result >= 30){
        return "Obeso"
    }else if(result < 30 && result >= 25){
        return "Sobrepeso"
    }else if(result < 25 && result >= 18.5){
        return "Normal"
    }else{
        return "Bajo de peso"
    }
}


// código de prueba
console.log(bmi(65, 1.8)) // "Normal"
console.log(bmi(72, 1.6)) // "Sobrepeso"
console.log(bmi(52, 1.75)) //  "Bajo de peso"
console.log(bmi(135, 1.7)) // "Obeso"