<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 22/03/2018
 * Time: 17:42
 */

function errorHandler()
{

    if(isset($_SESSION['error']))
    {

        $error = $_SESSION['error'];

        echo $error;

       unset($_SESSION['error']);

    }

}
