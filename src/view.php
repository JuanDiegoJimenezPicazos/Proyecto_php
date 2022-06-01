<?php 
//Iniciamos la sesión
session_start(); // Solo se pone si se desea usar $_SESSION, se utiliza para usar la variable $_SESSION


//Comprobamos que el usuario está logeado
//$_SESSION se utiliza para compartir información entre las diferentes páginas.
if(!isset($_SESSION['logged'])) {
	header('Location: login.php'); //Redirecciona a esa página o dirección
}
// Para saber si no ha iniciado sesión redirigirlo a login
//including the database connection file
//Incluimos el archivo de conexión a la bd
include_once("config.php"); //include_once no repite el código si está varias veces en el código

//fetching data in descending order (lastest entry first)
//$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
//Hacemos una consulta a la bd
$result = $mysqli->query("SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");

// Guardamos el resultado de la consulta en un array
$products = array(); //Creamos el array
while($row = $result->fetch_array()) { //Guardamos en cada fila de result
	$products [] = $row;
}

//Incluimos la vista
include_once("views/view.php"); 
?>
