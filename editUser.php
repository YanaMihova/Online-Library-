<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<title>remove</title>
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
		<h1 align="center">Edit User</h1>
		<div style="color: #ff0000; text-align: center;">
		<h2>
		
		<?php
		if (isset($_SESSION['error']) && $_SESSION['error'] === true) {
			echo $_SESSION['error_message'];
			 $_SESSION['error'] === false;
			 $_SESSION['error_message']='';
		}
		?></h2>
	   </div>

<form action="php/editUser.php" method="post">
<table>
	<caption> Update information about user</caption>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="password"></td>
	</tr>
	<tr>
		<td>Password (repeat)</td>
		<td><input type="password" name="password2"></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><textarea name="address"></textarea></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email"></td>
	</tr>

		<td></td>
		<td style="float:right;"><input type="Submit" name="save" value="Edit"></td>
	</tr>
</table>
</form>
	</div>
	<div id="footer">
		<?php  include 'includes/footer.php';?>	
	</div>
	</div>
	</body>
</html>