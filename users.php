<?php
require_once 'php/connection.php';
function userExists($username) {
// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM users WHERE username = '$username'";
	$query = $connect->query($sql);
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
// close the database connection
}
function salt($length) {
    return mcrypt_create_iv($length);
}

function makePassword($password, $salt) {
    return hash('sha256', $password.$salt);
}

function userdata($username) {
	global $connect;
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function login($username, $password) {
    global $connect;
    $userdata = userdata($username);

    if($userdata) {
        $makePassword = makePassword($password, $userdata['salt']);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$makePassword'";
        $query = $connect->query($sql);

        if($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    $connect->close();
    // close the database connection
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
function getUserDataByUserId($id) {
	global $connect;

	$sql = "SELECT * FROM users WHERE userID = '$id'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
}

function users_exists_by_id($id, $username) {
	global $connect;

	$sql = "SELECT * FROM users WHERE username = '$username' AND userID != $id";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}

function passwordMatch($id, $password) {
    global $connect;

    $userdata = getUserDataByUserId($id);

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

    $sql = "UPDATE users SET password = '$makePassword', salt = '$salt' WHERE userID = $id";
    $query = $connect->query($sql);

    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}

function logged_in() {
	if(isset($_SESSION['uid'])) {
		return true;
	} else {
		return false;
	}
}

function not_logged_in() {
	if(isset($_SESSION['uid']) === FALSE) {
		return true;
	} else {
		return false;
	}
}

function logout() {
	if(logged_in() === TRUE){
		// remove all session variable
		session_unset();

		// destroy the session
		session_destroy();

		header('location: login.php');
	}
}
