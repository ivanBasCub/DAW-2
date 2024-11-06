function likes(likes){
    if(likes < 1000){
        return likes
    }else if(likes >= 1000 && likes < 1000000){
        return parseInt(likes / 1000) + "K"; 
    }else{
        return parseInt(likes / 1000000) + "M"
    }
}

console.log(likes(983)) // "983"
console.log(likes(1900)) // "1K"
console.log(likes(54000)) // "54K"
console.log(likes(120800)) // "120K"
console.log(likes(25222444)) // "25M"