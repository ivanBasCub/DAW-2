function transcribir (adn) {
    let result = "";
    for (let i = 0; i < adn.length; i++) {
        switch (adn[i]) {
            case "G":
                result = result + "C";
                break;
            case "C":
                result = result + "G";
                break;
            case "T":
                result = result + "A";
                break;
            case "A":
                result = result + "U";
                break;
            default:
                return "ERROR"
                break;
        }
    }

    return result
}

console.log(transcribir("ACGT")) // "UGCA"
console.log(transcribir("ACGTGGTCTTAA")) // "UGCACCAGAAUU"