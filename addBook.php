<?php 
session_start();
include 'db.php'; 

/*$name = $_POST['name'];
$author_id = $_POST['author_id'];*/

$name = mysqli_real_escape_string($con, trim($_POST["name"]));
$author_id = intval($con, trim($_POST["author_id"]));
// $categories = mysqli_real_escape_string($con, trim($_POST["categories"]));
$categories = implode(',', $_POST["categories"]);
$categories = mysqli_real_escape_string($con, trim($categories));
$print_year = intval(trim($_POST["print_year"]));

/*$categories = $_POST['categories'];
$print_year = $_POST['print_year'];*/

if (!$_SESSION['error']) {
	$sql = "INSERT into
		books (name,author_id,categories,print_year) 
		VALUES ('$name','$author_id','$categories','$print_year')";
	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	} else { 
	  	header("Location: ../system_message.php");
	}
} else {
	header("Location: ../addBook.php");
}
mysqli_close($con);



?>