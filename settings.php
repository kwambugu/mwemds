<?php
/**
 * Created by PhpStorm.
 * User: MAINGI
 * Date: 3/2/2018
 * Time: 9:48 PM
 */
require 'connect.php';
//check method of form submition
    if ($_SERVER['REQUEST_METHOD']== 'POST'){
        //check if two passwords match
            if($_POST['newPassword'] == $_POST['confirm']){
                $newpassword =password_hash($_POST['newPassword'],PASSWORD_BCRYPT);
                //get email
                $email =$mysqli -> escape_string($_POST['email']);

                $sql = "UPDATE member SET password ='$newPassword' WHERE email = '$email'";

                if($mysqli ->query($sql)){
                    $_SESSION['message'] = "your passsword has been sucessfully reset";
                    header("position:profile.php");
                }
            }

    }else{
        $_SESSION['message']= "the two passwords don't match";
        header("position:profile.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>User</title>
    <link rel="stylesheet" type="text/css" href="syles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Alef' rel='stylesheet'>
</head>
<body>
<div class="navigation">
    <ul>
        <li><a href="profile.php">month's payment</a></li>
        <li><a href="settings.php">settings</a></li>
        <li><a href="logout.php">logout</a></li>
    </ul>
</div>
<div class="settings">
    <form  class="formSettings" method="POST">
        <label>enter your new passwordsword</label><br><br>
        <input type="password" name="newPassword" placeholder="should be at least 8 character"><br><br>
        <label>confirm password</label><br><br>
        <input type="password" name="confirm"><br><br>
        <input type="submit" name="submit" value ="change password">
    </form>
</div>

</body>
</html>