<ul>
	<li>
		<a href="index.php">Home</a>
	</li>
<?php
	if (isset($_SESSION['loginstatus']) && $_SESSION['loginstatus'] === true){
?>
	<li>
		<a href="books.php">Book library</a>
	</li>
<?php }?>
<?php
	if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1){
?>
	<li>
		<a href="admin.php">Admin panel</a>
	</li>
<?php }?>
	<li>
		<a href="about.php">About</a>
	</li>
	<li>
		<a href="contact.php">Contact</a>
	</li>
</ul>