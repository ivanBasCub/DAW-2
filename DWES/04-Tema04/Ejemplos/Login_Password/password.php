<?php

$pw = "GodoFredo123";

// Encriptamos las contraseña
$pw_hash = password_hash($pw,PASSWORD_DEFAULT);
// Comprobamos si es correcta la contraseña
echo password_verify($pw, $pw_hash);
?>