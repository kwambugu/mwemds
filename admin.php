<?php
require_once 'php/connection.php';
function registerUser() {

    global $connect;

    $username = $_POST['username'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $nationalID = $_POST['nationalID'];
    $password = $_POST['password'];
    $accountNo = $_POST['accountNo'];

    $salt = salt(32);
    $newPassword = makePassword($password, $salt);
    if($newPassword) {
        $sql = "INSERT INTO users ( username, fname, lname, nationalID, password, salt, accountNo) VALUES ('$username','$fname', '$lname', 'nationalID', '$newPassword', '$salt', '$accountNo')";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }
    } // /if

    $connect->close();
    // close the database connection
} // register user funtion

function salt($length) {
    return mcrypt_create_iv($length);
}

function makePassword($password, $salt) {
    return hash('sha256', $password.$salt);
}

function updateInfo($id) {
    global $connect;

    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nationalID = $_POST['nationalID'];
    $accountNo = $_POST['accountNo'];

    $sql = "UPDATE users SET username = '$username', first_name = '$fname', last_name = '$lname', nationalID = '$nationalID', accountNo = '$accountNo' WHERE id = $id";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}

function getUserDataByUserId($stmt) {
	global $connect;

	$sql = "SELECT * FROM users WHERE id = $id";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
}

function passwordMatch($id, $password) {
    global $connect;

    $userdata = getadminDataByministryId($stmt);

    $makePassword = makePassword($password, $userdata['salt']);

    if($makePassword == $userdata['password']) {
        return true;
    } else {
        return false;
    }

}
function changePassword($id, $password) {
    global $connect;

    $salt = salt(32);
    $makePassword = makePassword($password, $salt);

    $sql = "UPDATE ministry SET password = '$makePassword', salt = '$salt' WHERE ministryID = $id";
    $query = $connect->query($sql);

    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}
