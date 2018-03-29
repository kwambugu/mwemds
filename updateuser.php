<?php
/**
 * User: Karobia gatoto
 * Date: 26/03/2018
 * Time: 17:50
 */
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

<form id="upuser" action="php/update-user.php" method="POST">
    <p id="error"><?php errorHandler();?></p>

    <h2 Style='text-align:center;'>Update User.</h2>
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
                      AccountNo
                   </th>
                        <td>
                            <input type="text" name="accountNo" autocomplete="off" placeholder="Enter accountNo" required />
                        </td>
               </tr>
               <tr>
               <td>
                 <a href="javascript:UpdateConfirm(<?php echo $row['userID']?>);"><input type="submit"></a>
               </td>
               <td>
               </td>
           </tr>
    </table>

<script>
    function UpdateConfirm(id)
    {
        var x;

        x = confirm("Are you sure you want to update this user's data ");

        if(x)
        {
            window.location.href='php/update-User.php?uid='+id;
        }

    }
</script>
</form>
</div>
<footer class="site-footer">
<div class="text-center">
    2018 @ mwedms
</div>
</footer>
</body>
</html>
