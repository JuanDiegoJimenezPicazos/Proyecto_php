<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM producto WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
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
      <h1 class="display-4">Base de datos producto</h1>
      <p class="lead">Juan Diego Jiménez Picazos</p>
    </div>	

	<a href="index.php">Home</a> | <a href="addProducto.html">Agregar nuevos datos</a> | <a href="logout.php">Logout</a>
	<br/><br/>

	<table width='80%' border=0 class="table">
		<tr bgcolor='#CCCCCC'>
			<td>Nombre</td>
			<td>Precio (euro)</td>
			<td>Update</td>
		</tr>
		<?php
		while($row = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$row['nombre']."</td>";
			echo "<td>".$row['precio']."</td>";	
			echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>	
</body>
</html>
