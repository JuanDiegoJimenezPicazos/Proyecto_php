<?php
session_start(); //se accede a las variables
session_destroy(); // se eliminan las variables para cerrar sesión
header("Location:index.php");
?>
