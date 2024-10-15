function distanciaHamming(str1, str2) {
    // Comprobamos si las dos cadenas tienen la misma longitud
    if (str1.length === str2.length){
        // En el caso de que si sean iguales comprobamos todos los caracteres que no sean iguales
        let dif = 0;
        for (let i = 0; i < str1.length; i++) {
            if (str1[i] === str2[i]){

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

function error(esperado, obtenido) {
    console.log(`ERROR: esperaba ${esperado}, obtuve ${obtenido}`);
}

function test_distanciaHamming() {
    let res = NaN;
    let numErrores = 0;

    if(res = distanciaHamming("hola", "hola") !== 0) {
        error(0, res);
        numErrores++;
    }
    if(res = distanciaHamming("hola", "bola") !== 1) {
        error(1, res);
        numErrores++;
    }
    if(res = distanciaHamming("hola", "paco") !== 4) {
        error(4, res);
        numErrores++;
    }
    if(res = distanciaHamming("hola", "patata") !== -1) {
        error(-1, res);
        numErrores++;
    }

    if(numErrores === 0) {
        console.log("Sin errores");
    } else {
        console.log(`${numErrores} errores`);
    }
}

test_distanciaHamming();