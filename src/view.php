<?php 
session_start(); // Solo se pone si se desea usar $_SESSION



if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}
// Para saber si no ha iniciado sesión redirigirlo a login
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
$result = $mysqli->query("SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">	
</head>

<body>
<div class = "container">
	<div class="jumbotron">
      <h1 class="display-4">Simple LAMP web app</h1>
      <p class="lead">Demo app</p>
    </div>	

	<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
	<br/><br/>

	<table width='80%' border=0 class="table">
		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Quantity</td>
			<td>Price (euro)</td>
			<td>Update</td>
		</tr>
		<?php
		//Se crea un array asociativo para guardar cada fila
		//mysqli_fetch saca cada fila de la consulta guardada en result
		//while($row = mysqli_fetch_array($result)) {	
		while($row = $result->fetch_array()) {	
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['qty']."</td>";
			echo "<td>".$row['price']."</td>";	
			echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>	
</body>
</html>
