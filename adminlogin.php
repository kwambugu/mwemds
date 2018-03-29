<?php

include('php/connection.php');

include('php/error.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php include('views/title.php') ?></title>

    <link rel="stylesheet" type="text/css" href="styles.css">
  <style>

  html {
    background: url(images/mwedms1.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size:cover;
    background-size:cover;
  }

  </style>
</head>
<body>
  <div class="logincontainer">
		  <form action="php/admin-login.php" method="POST">
      <p style="color:white; font-size:25px;">Admin login</p>
      <p style="color:red; font-size:17px;"><?php echo errorhandler();?></p>
			<div class="form-layout">
				<input type="text" name="adminusername" placeholder="Enter Username">
			</div>
			<div class="form-layout">
				<input type="password" name="adminpassword" placeholder="Enter Password">
			</div>
			<input type="submit" name="submit" value ="submit" class="btn-login">
		</form><br>
		<a href="login.php">User Login</a>
	</div>

</body>
</html>
