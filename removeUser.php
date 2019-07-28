<?php 
include 'db.php';
$username = $_POST['username'];
/*$sql = "delete from users
where username = '$username'";*/


/*mysqli_query($con, $sql);*/

/*$_SESSION['error'] = false;
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
}*/


if (!$_SESSION['error']) {
	$sql = "delete from users where username = '$username'";
	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	} else { 
	  	header("Location: ../system_message.php");
	}
} else {
	header("Location: ../removeUser.php");
}
mysqli_close($con);

 ?>