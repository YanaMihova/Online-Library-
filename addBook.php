<?php
session_start();
include 'php/db.php';
$sql = "SELECT id, concat(first_name, ' ', last_name) as `name` from authors";
$query = mysqli_query($con, $sql);
?>
<!doctype html>
<html>
	<head>
		<title>addBook</title>
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
		<h1 align="center">ADD Book</h1>
		<div style="color: #ff0000; text-align: center;"><h2>
		
		<?php
		if (isset($_SESSION['error']) && $_SESSION['error'] === true) {
			echo $_SESSION['error_message'];
			 $_SESSION['error'] === false;
			 $_SESSION['error_message']='';
		}
		?></h2>
	   </div>
<form action="php/addBook.php" method="post">
<table>
	<caption> Add Book</caption>
	<tr>
		<td>Book name</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td>Author id</td>
		<td>
		<select name="author_id">
		<option value="-1" selected="">Plase select author</option>
		<?php
			$row=mysqli_fetch_assoc($query);
			while ($row != NULL) {
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				$row=mysqli_fetch_assoc($query);
			}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Categories</td>
		<td>
			<select name="categories[]" multiple>
				<option value="Drama">Drama</option>
				<option value="Comedy">Comedy</option>
				<option value="Action">Action</option>
				<option value="Adventure">Adventure</option>
				<option value="Horror">Horror</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Print year</td>
		<td><input type="text" name="print_year"></td>
	</tr>
	

		<td></td>
		<td style="float:right;"><input type="Submit" name="save" value="ADD"></td>
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