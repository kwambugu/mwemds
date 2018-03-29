<?php
include('php/connection.php');
require_once 'users.php';

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


<link rel="stylesheet" href="styles.css"  />
</head>
<body>

  <div class="sidenav">
  <a href="homepage.php">Home</a>
  <a href="usersettings.php">Settings</a>
  <a href="useraccount.php">User Account</a>
  <a href="php/logout.php">Log out</a>
  </div>

  <div class="container">
      <div class="header">

          </div>

					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<table>
       <tr>
           <th>
               Current Password
           </th>
                <td>
                    <input type="password" name="currentpassword" autocomplete="off" placeholder="Current Password" required />
               </td>
       </tr>
       <tr>
           <th>
               New Password
           </th>
                <td>
                    <input type="password" name="password" autocomplete="off" placeholder="New Password" required/>
                </td>
       </tr>
       <tr>
           <th>
               Conform Password
           </th>
                <td>
                    <input type="password" name="conformpassword" autocomplete="off" placeholder="Confrom Password" required />
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
  <div class="footer">
      <footer>
      <p>mwedms &copy; 2018</p>
      </footer>
  </div>
</body>
</html>
