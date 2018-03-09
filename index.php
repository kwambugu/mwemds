<?php

include "connect.php";

$username = $password ="";
$username_err = $password_err="";

//process when submited
if ($_SERVER["REQUEST_METHOD"] == "POST"){

//check if username is empty
	if (empty(trim($_POST['username']))) {
		$username_err ="please enter your email";
	}else{
		$username =trim($_POST['username']);
	}

//check if password is empty
	if (empty(trim($_POST['pass']))) {
		$password_err ="please enter your password";
	}else{
		$password =trim($_POST['pass']);
	}
//check with database if user exist
	if(empty($username_err) && empty($password_err)){
		$query = "SELECT email,password FROM user WHERE username= '$username' and password='$password'";
	}

$result = mysql_query($con, $query);
$count = mysql_num_rows($result);

//if posted values are same to  database start a session
if ($count == 1){
    $_SESSION['username'] = $username;
    header('position:profile.php');
}else{
    $password_err ="invalid password or username";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
		<link href='https://fonts.googleapis.com/css?family=Alef' rel='stylesheet'>
		<!--for fonts-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="syles.css">

</head>
<body>
    <div class="error"></div>
	<div class="container">
		<form method="POST" action="login.php">
		<div class="form-layout">
			<input type="text" id="email" name="email"
			placeholder="enter email">
		</div>
		<div class="form-layout">
			<input type="password"  id ="pass" name="pass" placeholder="enter password">
		</div>
		<input type="submit" name="submit" value="login" class="btn-login">
		</form>
	</div>
</body>
</html>
