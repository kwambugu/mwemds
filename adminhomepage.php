<?php
include_once('php/connection.php');

if(!isset($_SESSION['loggedIn'])){header('location:login.php');}

$stmt   =   "SELECT * FROM `users` WHERE 1";

$sql    =   $connect->query($stmt);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php include('views/title.php') ?></title>
    <link rel="stylesheet" type="text/css" href="adminstyles.css">
<!-- Load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
</body>
<!-- The form -->

<script>
    function deleteConfirm(id)
    {
        var x;

        x = confirm("Are you sure you want to delete this user");

        if(x)
        {
            window.location.href='php/deleteUser.php?uid='+id;
        }

    }
</script>

<div id="sidebar">
  <ul class="sidebar-menu">
      <p class="centered">
          <a href="adminsettings.php"><img src="images/adminicon.png" class="image-circle" width="60">
          </a>
      </p>
      <h5 class="centered">ADMIN</h5>
      <li><a href="adminhomepage.php">Dashboard</a></li>
      <li><a href="adduser.php">Add New User</a></li>
      <li><a href="Payments.php">Payment</a></li>
      <li><a href="settings.php">Settings</a></li>
      <li><a href="php/logout.php">Logout</a></li>
  </ul>
</div>
    <div id="maincontent">
        <section class="wrapper">
            <div class="header">
              <form class="example" action="action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <table>

    <tr>

        <th>#</th>
        <th>Name</th>
        <th>National ID</th>
        <th>Account No</th>
        <th>Actions</th>

    </tr>

    <?php while($row = $sql->fetch_assoc()):?>

    <tr>

        <td><?php echo $row['userID']?></td>
        <td><?php echo $row['fname']." ".$row['lname']?></td>
        <td><?php echo $row['nationalID']?></td>
        <td><?php echo $row['accountNo']?></td>
        <td><a href="javascript:deleteConfirm(<?php echo $row['userID']?>);"><i class="fa fa-trash"></i></a><a href="updateUser.php?id=<?php echo $row['userID']?>"> | <i class="fa fa-plus-square-o"></i>
</i>
</a></td>

    </tr>

    <?php endwhile;?>
            </table>
        </section>
    </div>
<footer class="site-footer">
    <div class="text-center">
        2018 @ mwedms
    </div>
</footer>
</html>
