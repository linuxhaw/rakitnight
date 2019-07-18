

<?php


session_start();

include("../config/config.php");

if(isset($name) && isset($password)) {
	
	$name = $_POST['name'];
    $pass = $_POST['password'];

	if($name == "" || $password == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login_action.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$name'AND password=md5('$password')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['name'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];

		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login_action.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: login_action.php');
		}
	}
} else {
	echo "Error";exit();
	header('Location: login_action.php');	
}


?>