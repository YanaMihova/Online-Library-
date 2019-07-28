<?php 

session_start();
include 'db.php';
$username='';
if (isset($_POST['username'])) {
	$username = mysqli_real_escape_string($con,trim($_POST['username']));
}
$password = md5($_POST["password"]);

$sql = "SELECT id,username,name,admin,address,email from `users` WHERE username='$username' AND  password = '$password'";
$query = mysqli_query($con, $sql);

$_SESSION['error'] = false;
$_SESSION['error_message'] = '';

if($query->num_rows === 1) {
	$row=mysqli_fetch_assoc($query);
	$_SESSION['loginstatus'] = true;
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['name'] = $row['name'];
	$_SESSION['address'] = $row['address'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['admin'] = intval($row['admin']);
	if ($row['admin'] == 1) {
		header("Location: ../admin.php");
	} else {
		header("Location: ../books.php");
	}
}else{
	$_SESSION['loginstatus'] = false;
	$_SESSION['error'] = true;
	$_SESSION['error_message'] = 'Invalid username or password';
	header("Location: ../login.php");
}

?>