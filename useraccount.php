<?php
include_once('php/connection.php');
require_once 'users.php';
if(!isset($_SESSION['loggedIn'])){header('location:login.php');}

$id = $_SESSION['uid'];

$trev   =   "SELECT * FROM `payment` WHERE userID = '$id'";
$sql    =   $connect->query($trev);

$row = $sql->fetch_assoc();

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
  <a href="useraccount.php">User accounts</a>
  <a href="php/logout.php">Log out</a>
  </div>
  <div class="container">
      <div class="header">
      </div>
<table>

    <tr>

        <th>UserID</th>
        <th>AccountNo</th>
        <th>Totalpayment</th>


    </tr>

    <tr>
        <td><?php echo $row['userID']?></td>
        <td><?php echo $row['accountNo']?></td>
        <td><?php echo $row['totalpayment']?></td>
    </tr>

</table>
</div>
    <div class="footer">
        <footer>
        <p>mwedms &copy; 2018</p>
        </footer>
    </div>
</body>
</html>
