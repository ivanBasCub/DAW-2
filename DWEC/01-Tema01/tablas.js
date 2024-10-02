let notas = [
    ["fulanito",8,7,9],
    ["Andres",5,7,5],
    ["Mini",6,5,8],
    ["hermenegildo",4,6,5]
];
// quiero
// * nota media de cada alumno
// * nota media del grupo por trimestre

// Nota media de cada alumno
function notaMediaAlum(nota){
    for(let i = 0; i < nota.length; i++){
        console.log(nota[i][0] +  " tiene una nota media de " + (nota[i][1]+nota[i][2]+nota[i][3])/3)
    }

    return "Fin de los alumnos"
}

// Nota media de cada trimestre de todo el grupo
function notaMeidaTri(nota){
    for(let i = 1; i < notas[0].length; i++){
        let total = 0;
        for(let j = 0; j < nota[i].length; j++){
            total = total + nota[j][i];
        }
        console.log("La nota media del trimestre "+i+" = "+total/nota.length);
    }
}

console.log("La notas medias de los alumnos:")
console.log(notaMediaAlum(notas))

console.log("La nota media por trimestre del grupo:")
console.log(notaMeidaTri(notas))