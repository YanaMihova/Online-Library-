<?php 
session_start();
if (isset($_SESSION["loginstatus"]) && $_SESSION["loginstatus"] === true && isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
	
 ?>


<!doctype html>
<html>
	<head>
		<title>admin page</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	

	<body>
		<div id="wrapper">
		<div id="header">
			<?php include 'includes/header.php';?>
		<div id="user">		
		</div>
		</div>
<div id="nav">
<?php include 'includes/navi.php';?>
	</div>

	<div id="contentSection">
		<h1 align="center">Admin Page</h1>
		<ul>
			<li>
				<a href="remove.php">Delete book</a>
	        </li>
			<li>
				<a href="removeUser.php">Delete user</a>
	        </li>
			<li>
				<a href="addUser.php">Add user</a>
	        </li>
	        <li>
				<a href="addBook.php">Add Book</a>
	        </li>
	        <li>
				<a href="editUser.php">Edit User</a>
	        </li>
		</ul>

	</div>
	<div id="footer">
		<?php include 'includes/footer.php';?>	
	</div>
	</div>
	</body>
</html>	
<?php 
} else{
	echo "Access Denial, You Need to Login First";
}

 ?>