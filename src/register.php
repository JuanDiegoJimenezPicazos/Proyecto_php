<?php
include_once("views/header.php");

include_once("views/link_register.php");

include_once("config.php");

//if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
if(!empty($_POST)) {
	$name = $mysqli->real_escape_string($_POST['name']);
	$email = $mysqli->real_escape_string($_POST['email']);
	$user = $mysqli->real_escape_string($_POST['username']);
	$pass = $mysqli->real_escape_string($_POST['password']);

	//if($user == "" || $pass == "" || $name == "" || $email == "") {
	if(empty($user) || empty($pass) || empty($name) || empty($email)) {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		$result = $mysqli->query("INSERT INTO login (name, email, username, password) VALUES ('$name', '$email', '$user', md5('$pass'))");
			
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {

	include_once("views/register.php");
	include_once("views/footer.php");

}
?>