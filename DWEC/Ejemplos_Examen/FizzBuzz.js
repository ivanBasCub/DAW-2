function fizzBuzz(number){
    if(number % 3 == 0 && number % 5 == 0){
        return "fizzbuzz";
    }else if(number % 3 == 0){
        return "fizz";
    }else if(number % 5 == 0){
        return "buzz";
    }else{
        return number
    }
}

console.log(fizzBuzz(6)); // "fizz"
console.log(fizzBuzz(20)); // "buzz"
console.log(fizzBuzz(30)); // "fizzbuzz"
console.log(fizzBuzz(8)); // 8