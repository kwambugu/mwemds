<?php
/**
 * User: Karobia gatoto
 * Date: 26/03/2018
 * Time: 17:34
 */
include('php/connection.php');
require_once 'admin.php';
// form is submitted
if($_POST) {

	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
  $nationalID= $_POST['nationalID'];
	$accountNo = $_POST['accountNo'];



	if($fname && $lname && $username && $nationalID && $accountNo && $password) {

				if(registerUser() === TRUE) {
					echo "Successfully Registered ";
				} else {
					echo "Error";
				}
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php include('views/title.php') ?></title>
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
        <li><a href="adduser.php">Add new user</a></li>
        <li><a href="payments.php">Payment</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="php/logout.php">Logout</a></li>
    </ul>
  </div>
      <div id="maincontent">
          <section class="wrapper">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h2 Style='text-align:center;'>Add New User.</h2>
    <table>
           <tr>
               <th>
                   Username
               </th>
                    <td>
                        <input type="text" name="username" autocomplete="off" placeholder="Enter username" required />
                   </td>
           </tr>
           <tr>
               <th>
                   firstname
               </th>
                    <td>
                        <input type="text" name="firstname" autocomplete="off" placeholder="Enter firstname" required/>
                    </td>
           </tr>
           <tr>
               <th>
                   Lastname
               </th>
                    <td>
                        <input type="text" name="lastname" autocomplete="off" placeholder="Enter lastname" required />
                    </td>
           </tr>
             <tr>
                 <th>
                     NationalID
                 </th>
                      <td>
                          <input type="text" name="nationalID" autocomplete="off" placeholder="Enter nationalID" required />
                      </td>
             </tr>
               <tr>
                   <th>
                      Password
                   </th>
                        <td>
                            <input type="password" name="password" autocomplete="off" placeholder="Enter password" required />
                        </td>
               </tr>

                   <th>
                      AccountNo
                   </th>
                        <td>
                            <input type="text" name="accountNo" autocomplete="off" placeholder="Enter accountNo" required />
                        </td>
               </tr>
               <tr>
               <td>
                   <button type="submit">Change Password</button>
               </td>
               <td>
               </td>
           </tr>
    </table>
</div>
<footer class="site-footer">
<div class="text-center">
    2018 @ mwedms
</div>
</footer>
</body>
</html>
