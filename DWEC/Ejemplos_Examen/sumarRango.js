function sumatorio (min,max){
    let result = 0;
    for (let i = min; i <= max; i++) {
        result += i;
    }
    return result;
}

function sumarRango (min, max){
    if (min == max){
        return 0;
    }else if(min < max){
        return sumatorio(min,max);
    }else{
        return sumatorio(max,min);
    }
}

// código de prueba
console.log(sumarRango(0, 10)) // 55
console.log(sumarRango(12, 14)) // 39
console.log(sumarRango(5, 5)) // 0

