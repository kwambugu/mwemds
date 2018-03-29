<?php

require_once 'php/connection.php';
require_once 'users.php';
include ('php/error.php');
// form submiited
if($_POST) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if($username && $password) {
    if( userExists ($username) == TRUE) {
      $login = login($username, $password);
      if($login) {
        $userdata = userdata($username);

        $_SESSION['uid'] = $userdata['uid'];

        header('location: homepage.php');
        exit ();
      }else {
        echo "Incorrect username/password combination";
      }
    } else{
      echo "username does not exists";
    }
  }

} // /if


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
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <p style="color:white; font-size:25px;">User login</p>
    <p style="color:red; font-size:17px;"></p>
  	<div>
  		<input type="text" name="username" id="username" autocomplete="off" placeholder="username" required />
  	</div>
  	<br />
  	<div>
  		<input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required />
  	</div>
  	<br />
  	<div>
      <input type="submit" name="submit" value ="submit" class="btn-login">
  	</div>
   </form><br>
   <a href="adminlogin.php">Admin Login</a>
 </div>
 </body>
</html>
