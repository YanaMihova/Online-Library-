<div id="logo"><img src="images/logo.jpg" ></div>
<div id="user">
<?php
	if (isset($_SESSION['loginstatus']) && $_SESSION['loginstatus'] === true){
?>
	<form action="php/logout.php" method="post">
		<div style="display: inline;">You are logged as: <?php echo $_SESSION['name'];?></div>
		<input type="Submit" value="Logout">
	</form>
<?php
	} else {
?>		
<form action="php/login.php" method="post">
	<label for="username"> Username </label> <br>
	<input type="text" name="username"><br>		
	<label for="password">Password </label> <br>
	<input type="password" name="password"><br><br>	
	<input type="Submit" value="Login"> OR 
	<a href="register.php">Register</a>
</form>
<?php } ?>
</div>		
