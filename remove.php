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
		<h1 align="center">Delete Book</h1>
<form action="php/remove.php" method="post">
<table>
	<caption>Delete Book</caption>
	<tr>
		<td>Book</td>
		<td><input type="text" name="name"></td>
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