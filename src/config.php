<?php

// Define son constantes, es aconsejable usar mayusculas
define('DB_HOST', 'mysql');
define('DB_NAME', 'lamp_db');
define('DB_USER', 'lamp_user');
define('DB_PASSWORD', 'lamp_password');

//Se guarda la función con parámetros de entrada en una variable objeto
//$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);	
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);	

?>
