<!DOCTYPE html>
<?php 
	session_start();
	$errors = [];
	if(isset($_SESSION["errors"]) && !empty($_SESSION["errors"])){
		$errors = $_SESSION["errors"];
		unset($_SESSION["errors"]);
	}
?>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error {
			color: red;
			font-size: 14px;
		}
	</style>
</head>
<body>

	<form action="login_action.php" method="post">
		<div>
			User Name:<input type="text" name="name" placeholder="Enter your name">
			<?php if(isset($errors["name"])): ?>
				<div class="error"><?php echo $errors["name"]; ?>
			<?php endif; ?>
		</div>
		
		<div>
			Password:<input type="password" name="password" placeholder="Fill your password">
			<?php if(isset($errors["password"])): ?>
				<div class="error"><?php echo $errors["password"]; ?>
			<?php endif; ?>
		</div>
				
		<?php if(isset($errors["common"])): ?>
			<div class="error"><?php echo $errors["common"]; ?><br>
		<?php endif; ?>

		<input type="submit" name="log_in" value="Log In">

	</form>

</body>
</html>