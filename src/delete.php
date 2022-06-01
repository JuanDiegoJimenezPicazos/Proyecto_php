<?php 

session_start(); 

if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}
//including the database connection file
include("config.php");

//getting id of the data from url y lo saneamos
$id = $mysqli->real_escape_string($_GET['id']);

//deleting the row from table
//Procedimental//$result=mysqli_query($mysqli, "DELETE FROM products WHERE id=$id");
$result=$mysqli->query("DELETE FROM products WHERE id=$id");

//redirecting to the display page (view.php in our case)
header("Location:view.php");
?>