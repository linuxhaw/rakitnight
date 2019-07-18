<?php


	session_start();

	include("config/config.php");

	require('vendor/autoload.php'); // by tint

	use Rakit\Validation\Validator; // by tint

	$validator = new Validator;

	$validation = $validator->make($_POST + $_FILES, [
		'name'                  => 'required',
		'password'              => 'required|min:6'
	]);

	$validation->validate();

	if ($validation->fails()) {
		// handling errors
		$errors = $validation->errors()->firstOfAll();
		$_SESSION["errors"] = $errors;
		header("Location:login.php");
		exit;
	}
		
	$name = $_POST['name'];
	$password = $_POST['password'];

	$user = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$name'AND password='$password'");
			
	$user = mysqli_fetch_assoc($user);

	if($user){
		$_SESSION["user"] = $user;
		header("Location:index.php");
		exit;
	}

	$errors = ["common" => "Username or Passowrd worng."];
	$_SESSION["errors"] = $errors;

	header("Location:login.php");
	exit;


?>