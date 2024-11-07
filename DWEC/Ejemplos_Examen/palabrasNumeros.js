function palabrasNumeros(arrayNum){
    let result = [];
    for (let i = 0; i < arrayNum.length; i++) {
        switch (arrayNum[i]) {
            case "cero":
                result[i] = 0;
                break;
            case "uno":
                result[i] = 1;
                break;
            case "dos":
                result[i] = 2;
                break;
            case "tres":
                result[i] = 3;
                break;
            case "cuatro":
                result[i] = 4;
                break;
            case "cinco":
                result[i] = 5;
                break;
            case "seis":
                result[i] = 6;
                break;
            case "siete":
                result[i] = 7;
                break;
            case "ocho":
                result[i] = 8;
                break;
            case "nueve":
                result[i] = 9;
                break;   
            default:
                result[i] = -1;
                break;
        }      
    }

    return result;
}


console.log(palabrasNumeros(["cero", "uno", "dos", "tres", "what?", "cuatro"])) // [0, 1, 2, 3, -1, 4]
console.log(palabrasNumeros(["cinco", "seis", "siete", "ocho", "nueve"])) // [5, 6, 7, 8, 9]