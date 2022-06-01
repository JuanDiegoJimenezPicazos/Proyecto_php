<!-- Para iniciar la variable $_SESSION se necesita iniciar session_start() -->
<?php session_start(); 

include_once("views/header.php");

	if(isset($_SESSION['logged'])) {			
		include("config.php");		
		//Se llama a config.php si se ha iniciado sesión			
		//$result = mysqli_query($mysqli, "SELECT * FROM login");
		$result = $mysqli->query("SELECT * FROM login");
		
		include_once("views/enlacesIndex.php");
	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}

include_once("views/footer.php");	
?>