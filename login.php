<?php 
session_start();
$_SESSION["loginstatus"] = "";

 ?>

<!doctype html>
<html>
	<head>
		<title>Login</title>
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
		<h1 align="center">Login Page</h1>
<?php
	if (isset($_SESSION['error']) && $_SESSION['error'] === true) {
		echo $_SESSION['error_message'];
	}
?>
<form action="php/login.php" method="post">
<table>
	<caption>Please fill in the login form</caption>
	<tr>
		<td>userame</td>
		<td><input type="text" name="username"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="password"></td>
	</tr>
	
	<tr>
		<td></td>
		<td style="float:right;"><input type="Submit" name="Login" value="Login"></td>
	</tr>
</table>
</form>
	</div>
	<div id="footer">
		<?php include 'includes/footer.php';?>		
	</div>
	</div>
	</body>
</html>	