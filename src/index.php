<!-- Para iniciar la variable $_SESSION se necesita iniciar session_start() -->
<?php session_start(); ?>

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
      <h1 class="display-4">Base de datos tienda</h1>
      <p class="lead">Juan Diego Jiménez Picazos</p>
    </div>	

	<?php
	if(isset($_SESSION['logged'])) {			
		include("config.php");		
		//Se llama a config.php si se ha iniciado sesión			
		//$result = mysqli_query($mysqli, "SELECT * FROM login");
		$result = $mysqli->query("SELECT * FROM login");
	?>				
		Welcome <?php echo $_SESSION['name'] ?> !
		<br/><br/>
		<a href='view.php'>View and Add Products</a> | <a href='viewProducto.php'>Ver y agregar productos</a> | <a href='logout.php'>Logout</a><br/>
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	?>

</div>
</body>
</html>