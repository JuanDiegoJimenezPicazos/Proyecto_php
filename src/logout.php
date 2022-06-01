<?php
session_start(); //Se accede a las variables
session_destroy(); //Se eliminan las variables para cerrar sesión
header("Location:index.php"); //Nos redirige a index.php
?>
