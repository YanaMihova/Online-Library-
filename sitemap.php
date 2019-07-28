<?php 
session_start();
?>
<!doctype html>
<html>
	<head>
		<title>SiteMap</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	

	<body>
		<div id="wrapper">
		<div id="header">
		<?php include 'includes/header.php';?>
		</div>		
		
		
	<div id="nav">
		<?php include 'includes/navi.php';?>
	</div>

	<div id="contentSection">
		<ul>
	<li>
		<a href="index.php">Home</a>
	</li>
	<li>
		<a href="about.php">About</a>
	</li>
	<li>
		<a href="contact.php">Contact</a>
	</li>
	
	<li>
		<a href="register.php">Register</a>
	</li>
	<li>
		<a href="login.php">Login</a>
	</li>

		</ul>
	</div>
	<div id="footer">
		<?php include 'includes/footer.php';?>		
	</div>
	</div>
	</body>
</html>	