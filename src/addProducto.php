<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">	
	<title>Add Data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">
</head>

<body>
<div class = "container">
		<div class="jumbotron">
			<h1 class="display-4">Agregar productos</h1>
			<p class="lead">Demo app</p>
		</div>
			

<?php
//including the database connection file
include_once("config.php");

	//Tabla producto
	if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['codigo_producto'])) {	
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$codigo_fabricante = $_POST['codigo_fabricante'];
			
		// checking empty fields
		if(empty($nombre) || empty($precio) || empty($codigo_fabricante)) {
					
			if(empty($nombre)) {
				echo "<font color='red'>Name field is empty.</font><br/>";
			}

			if(empty($precio)) {
				echo "<font color='red'>Price field is empty.</font><br/>";
			}

			if(empty($codigo_fabricante)) {
				echo "<font color='red'>code field is empty.</font><br/>";
			}
			
			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else { 
			// if all the fields are filled (not empty) 
				
			//insert data to database
			$query="INSERT INTO producto(nombre, precio, codigo_fabricante, login_id) VALUES('$nombre', '$precio', '$codigo_fabricante')";
			echo $query;
			$result = mysqli_query($mysqli,$query );
			
			echo "$nombre<br>";
			echo "$precio<br>";
			echo "$loginTd<br>";
			if ($result){
			echo "$result<br>";
			}else{
				echo "Error<br>";
			}

			//display success message
			echo "<font color='green'>Data added successfully.";
			echo "<br/><a href='viewProducto.php'>View Result</a>";
		}
	}
?>

</div>
</body>
</html>