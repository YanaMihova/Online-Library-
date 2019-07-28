<?php 
session_start();
include 'db.php';

$name = mysqli_real_escape_string($con, trim($_POST['name']));
$email = mysqli_real_escape_string($con, trim($_POST["email"]));
$address = mysqli_real_escape_string($con, trim($_POST["address"]));
$username = mysqli_real_escape_string($con, trim($_POST["username"]));
$password = $_POST['password'];
$password2 = $_POST['password2'];

$_SESSION['error'] = false;
$_SESSION['error_message'] = '';

if (empty($username) || strlen($username) < 3) {
	$_SESSION['error'] = true;
	$_SESSION['error_message'] .= 'Username must be at least 3 charater in length<br>';	
} else {
	$sql = "SELECT id from `users` WHERE username='$username'";
	$query = mysqli_query($con, $sql);
	if($query->num_rows !== 1) {
		$_SESSION['error'] = true;
		$_SESSION['error_message'] .= 'Username not exists.<br>';	
	}
}

if ($password !== $password2) {
	$_SESSION['error'] = true;
	$_SESSION['error_message'] .= 'Password doesn\'t match Password2<br>';	
}

if (!$_SESSION['error']) {
	/*$sql = "UPDATE into
		users (username,password,name,email,address) 
		VALUES ('$username',md5('$password'),'$name','$email','$address')";*/
	//$sql= "UPDATE `users` SET `password`= '$password',`name`= '$name',`address`= '$address',`email`= '$email' WHERE `username`= '$username'";
	// $sql="nachalo na zaqvka";
    // $sql .= "prodyljavane na zaqvkata";
	// $sql .= e edno i syshto kato $sql = $sql . "prodyljavana na zaqvkata"

	$add_comma = false;		
	$sql = "UPDATE `users` SET ";

	if (!empty($password)) {
		$sql .= "`password`= '$password'";
		$add_comma=true;
	}

	if (!empty($name)) {
		if ($add_comma) $sql .= ',';
		$sql .= "`name`= '$name'";
		$add_comma=true;
	}

	if (!empty($address)) {
		if ($add_comma) $sql .= ',';
		$sql .= "`address`= '$address'";
		$add_comma=true;
	}

	if (!empty($email)) {
		if ($add_comma) $sql .= ',';
		$sql .= "`email`= '$email'";
		$add_comma=true;
	}

	$sql .= " WHERE `username`= '$username'";
	mysqli_query($con, $sql);

	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	} else { 
	  	header("Location: ../system_message.php");
	}
} else {
	header("Location: ../editUser.php");
}
mysqli_close($con);

?>