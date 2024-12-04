<?php
    include "403cookiesfondo.php";

    if(isset($_COOKIE[$cookieName])){
        setcookie($cookieName,"",1);
        header("Location: 403cookiesfondo.php");
    }else{
        header("Location: 403cookiesfondo.php");
    }
?>