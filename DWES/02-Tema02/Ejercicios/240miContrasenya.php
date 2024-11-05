<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>240.2</title>
    <meta author="Ivan Bascones && Pablo Pollos">
</head>
<body>
    <form action="" method="GET">
        <label for="pass" id="pass">Contraseña:</label>
        <input type="text" id="pass" name="pass"><br>

        <input type="submit" id="enviar" name="enviar"><br> 
    </form>
    <hr>
    <?php
    //Ivan Bascones && Pablo Pollos

    /*
    crea una función que a partir de un tamaño, genere una contraseña aleatoria compuesta de letras y dígitos de manera aleatoria.
    */
    //si $val es 0 devuelve mayúscula aleatoria; si es 1, minúscula; y si no es ninguno de ellos, un dígito
    function randLetNum($val){
        $per = [' ','!','"','#', '$', '%', '&', "'",'(', ')','*', '+',',','-','.','/', ':', ';', '<', '=', '>', '?','@', '[','\ ' , ']','^','_','`','{','|' ,'}' ,',','~'];
        if($val==0){
            return chr(rand(65,90));
        }else if($val==1){
            return chr(rand(97,122));
        }else if($val==2){
            return chr(rand(48,57));
        }else{
            return $per[rand(0,32)];
        }
    }
    //genera una contraseña aleatoria compuesta de letras y dígitos de manera aleatoria de longitud $len
    function randPassword($len){
        if($len<=0){
            return "ERROR";
        }
        $psw="";
        for ($i=0; $i < $len; $i++) { 
            $psw=$psw.randLetNum(rand(0,3));
        }
        if(checker($psw,$len)){
            return $psw;
        }else{
            return randPassword($len);
        }
    }

    //checker
    function checker($str,$len){
        $per = ['!','"','#', '$', '%', '&', "'",'(', ')','*', '+',',','-','.','/', ':', ';', '<', '=', '>', '?','@', '[','\ ' , ']','^','_','`','{','|' ,'}' ,',','~'];
        $arrAso = array (
            "May" => 0,
            "Num" => 0,
            "Esp" => 0,
        );
        if(strlen($str)!=$len){
            return false;
        }
        for ($i=0; $i < strlen($str); $i++) {
            
            //mayus
            if(ord($str[$i])>=65 && ord($str[$i])<=90){
                $arrAso["May"]++;
            //num
            }else if(ord($str[$i])>=48 && ord($str[$i])<=57){
                $arrAso["Num"]++;
            //especiales
            }else if(in_array($str[$i],$per)){
                $arrAso["Esp"]++;
            //minus - no válidos
            }else if(!(ord($str[$i])>=97 && ord($str[$i])<=122)){
                return false;
            }
        }
        if($arrAso["May"]>0 && $arrAso["Num"]>0 && $arrAso["Esp"]>0){
            return true;
        }else{
            return false;
        }


    }


    //main
    if(count($_GET)!= 0){
        $pass = $_GET['pass'];
    }else{
        $pass = "";
    }
    
    $len = 8;
    echo "Longitud de contraseña = $len<br>";
    echo ("Incluye al menos una mayúscula, un digito y un carácter especial<br>");
    echo ("Caracteres permitidos: !". '"'." # $ % & ' ( ) * + , - . / : ; < = > ? @ [ \ ] ^ _` { | } ~"."<br>");
    echo "Contraseña autogenerada de ejemplo: ".randPassword($len)."<hr>";
    if(checker($pass,$len)){
        echo "Contraseña válida";
    }else{
        echo "Contraseña inválida";
    }

    ?>
</body>
</html>