// Escribir un programa que genere una matriz identidad de N x N. Matriz identidad es la que tiene por entradas todo 0 salvo la diagonal, que son 1
function MatrizId(num){
    let matriz = []
    
    for(i= 0;i < num;i++){
        matriz.push([])
        for(j= 0; j < num;j++){
            if(j==i){
                matriz[i].push(1);
            }else{
                matriz[i].push(0);
            }
        }
    }
    return matriz;
}
let rest = MatrizId(7)

for (let i = 0; i < rest.length; i++) {
    console.log(rest[i])
}
