<?php

include('connection.php');

if(isset($_POST) && !empty($_POST))
{

    $username = mysqli_real_escape_string($connect, $_POST['adminusername']);
    $password = mysqli_real_escape_string($connect, $_POST['adminpassword']);

    $sql    =   "SELECT * FROM ministry WHERE username = '$username' AND password = '$password'";
    $stmt = $connect->query($sql);

    if($stmt->num_rows == 1)
    {
        $_user                  =   $stmt->fetch_assoc();
        //set session variables
        $_SESSION['loggedIn']   =   true;
        $_SESSION['uid']        =   $_user['ministryID'];
        header('location:../adminhomepage.php');
    }
    else
    {
        //handle error
        $_SESSION['error'] = "Wrong username/password combination";
        header('location:../adminlogin.php'); //redirect user back to login

    }


}
