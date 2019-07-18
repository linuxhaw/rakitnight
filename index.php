<!DOCTYPE html>
<?php 
    session_start(); 
    $user = [];
    if(isset($_SESSION["user"]) && !empty($_SESSION["user"])){
        $user = $_SESSION["user"];
    }else{
        header("Location:login.php");
        exit;
    }
?>

<html>
<head>
    <title>Index</title>
</head>
<body>

    Hello "<?php echo $user["username"] ?>".<br>
    Your email is "<?php echo $user["email"]; ?>".

    <a href="logout.php">Logout</a>

</body>
</html>