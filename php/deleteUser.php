<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/03/2018
 * Time: 18:35
 */
include ('connection.php');

if(isset($_GET['uid']))
{

    $id = $_GET['uid'];

    $sql = $connect->query("DELETE FROM users WHERE userID = '$id'");

    if($sql)
    {
        header('location:../adminhomepage.php');
    }
}