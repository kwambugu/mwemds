<?php
include('php/connection.php');
require_once 'admin.php';

if($_POST) {
	$currentpassword = $_POST['currentpassword'];
	$newpassword = $_POST['password'];
	$conformpassword = $_POST['conformpassword'];


	if($currentpassword && $newpassword && $conformpassword) {
		if(passwordMatch($_SESSION['uid'], $currentpassword) === TRUE) {

			if($newpassword != $conformpassword) {
				echo "New password does not match conform password <br />";
			} else {
				if(changePassword($_SESSION['uid'], $newpassword) === TRUE) {
					echo "Successfully updated";
				} else {
					echo "Error while updating the information <br />";
				}
			}

		} else {
			echo "Current Password is incorrect <br />";
		}
	}
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php include('views/title.php') ?></title>

    <style>
        #error{
            color: red;
        }
    </style>
<link rel="stylesheet" href="adminstyles.css"  />
</head>
<body>
  <div id="sidebar">
    <ul class="sidebar-menu">
        <p class="centered">
            <a href="adminsettings.php"><img src="images/adminicon.png" class="image-circle" width="60">
            </a>
        </p>
        <h5 class="centered">ADMIN</h5>
        <li><a href="adminhomepage.php">Dashboard</a></li>
        <li><a href="adduser.php">Add New User</a></li>
        <li><a href="payments.php">Payment</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="php/logout.php">Logout</a></li>
    </ul>
  </div>
      <div id="maincontent">
          <section class="wrapper">
              <div class="header">
              </div>
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<table>
       <tr>
           <th>
               Current Password
           </th>
                <td>
                    <input type="password" name="currentpassword" autocomplete="off" placeholder="Current Password" />
               </td>
       </tr>
       <tr>
           <th>
               New Password
           </th>
                <td>
                    <input type="password" name="password" autocomplete="off" placeholder="New Password" />
                </td>
       </tr>
       <tr>
           <th>
               Conform Password
           </th>
                <td>
                    <input type="password" name="conformpassword" autocomplete="off" placeholder="Confrom Password" />
                </td>
       </tr>
       <tr>
           <td>
               <button type="submit">Change Password</button>
           </td>
       </tr>
</table>
</form>
</div>
      <footer class="site-footer">
      <div class="text-center">
       2018 @ mwedms
       </div>
      </footer>
</body>
</html>
