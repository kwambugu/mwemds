<?php
/**
 * Created by PhpStorm.
 * User: MAINGI
 * Date: 3/2/2018
 * Time: 9:36 PM
 */

/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();
header("location: index.php");
?>
