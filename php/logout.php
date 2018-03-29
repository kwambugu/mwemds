<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 22/03/2018
 * Time: 17:46
 */

if($_SESSION['loggedIn'] = true)
{
    session_destroy();
    header('location: ../login.php');
}