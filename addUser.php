<?php 
session_start();
include 'db.php';

$name = mysqli_real_escape_string($con, trim($_POST["name"]));
$email = mysqli_real_escape_string($con, trim($_POST["email"]));
$address = mysqli_real_escape_string($con, trim($_POST["address"]));
$username = mysqli_real_escape_string($con, trim($_POST["username"]));
$password = $_POST['password'];
$password2 = $_POST['password2'];


/*$sql = "INSERT into
		users (username,password,name,email,address) 
		VALUES ('$username',md5('$password'),'$name','$email','$username')";


mysqli_query($con, $sql);

mysqli_close($con);*/

$_SESSION['error'] = false;
$_SESSION['error_message'] = '';

if (empty($username) || strlen($username) < 3) {
	$_SESSION['error'] = true;
	$_SESSION['error_message'] .= 'Username must be at least 3 charater in length<br>';	
} else {
	$sql = "SELECT id from `users` WHERE username='$username'";
	$query = mysqli_query($con, $sql);
	if($query->num_rows !== 0) {
		$_SESSION['error'] = true;
		$_SESSION['error_message'] .= 'This username is already taken.<br>';	
	}
}


if ($password !== $password2) {
	$_SESSION['error'] = true;
	$_SESSION['error_message'] .= 'Password doesn\'t match Password2<br>';	
}

if (empty($email)) {
	if($query->num_rows !== 0) {
		$_SESSION['error'] = true;
		$_SESSION['error_message'] .= 'E-Mail address is mandatory feild.<br>';	
	}	
}

if (!$_SESSION['error']) {
	$sql = "INSERT into
		users (username,password,name,email,address) 
		VALUES ('$username',md5('$password'),'$name','$email','$address')";
	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	} else { 
	  	header("Location: ../system_message.php");
	}
} else {
	header("Location: ../addUser.php");
}
mysqli_close($con);

?>