
<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<title>removeuser</title>
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
		<h1 align="center">Delete user</h1>
		<div style="color: #ff0000; text-align: center;"><h2>
		<?php
		if (isset($_SESSION['error']) && $_SESSION['error'] === true) {
			echo $_SESSION['error_message'];
			 $_SESSION['error'] === false;
			 $_SESSION['error_message']='';
		}
		?></h2>
		</div>
<form action="php/removeUser.php" method="post">
<table>
	<caption>Delete user</caption>
	<tr>
		<td>user Name</td>
		<td><input type="text" name="username"></td>
	</tr>
	
	<tr>
		<td></td>
		<td style="float:right;"><input type="Submit" value="remove"></td>
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