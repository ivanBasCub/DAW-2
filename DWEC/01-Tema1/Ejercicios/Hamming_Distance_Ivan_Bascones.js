function Hamming_Distance (string1, string2){
    // Comprobamos si las dos cadenas tienen la misma longitud
    if (string1.length === string2.length){
        // En el caso de que si sean iguales comprobamos todos los caracteres que no sean iguales
        let dif = 0;
        for (let i = 0; i < string1.length; i++) {
            if (string1[i] === string2[i]){

            }else{
                dif = dif + 1;
            }
        }
        // Devolvemos el resultado
        return dif;
    }else{
        
        return -1
    }
}

let palabra1 = "Hola"
let palabra2 = "Tuya"

console.log("Hamming Distance is",Hamming_Distance(palabra1,palabra2))