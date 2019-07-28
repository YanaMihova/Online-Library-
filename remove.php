<?php 
include 'db.php';
$name = $_POST['name'];
/*$sql = "delete from books
where name = '$name'";*/

/*mysqli_query($con, $sql);*/

if (!$_SESSION['error']) {
	$sql = "delete from books where name = '$name'";

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