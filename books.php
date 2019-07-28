<?php 
session_start();
include 'php/db.php';

$book_id = -1;
$vote = -1;
if (isset($_POST['book_id'])) $book_id = intval($_POST['book_id']);
if (isset($_POST['vote'])) $vote = intval($_POST['vote']);
if ($book_id > 0 && $vote > 0 ) {
	$sql = 'UPDATE books SET rating=rating+'.$vote.', votes=votes+1 WHERE id='.$book_id;
	mysqli_query($con, $sql);
}

$book_name='';
$author='';
if (isset($_POST['book_name'])) $book_name=mysqli_real_escape_string($con, trim($_POST['book_name']));
if (isset($_POST['author'])) $author=mysqli_real_escape_string($con, trim($_POST['author']));

$show=true; // Show/Hide books without search

$sql = "SELECT ".
	   "`books`.`id` AS 'book_id',".
	   "`books`.`name` AS 'book_name',".
	   "`books`.`categories` AS 'categories',".
	   "`books`.`print_year` AS 'year',".
	   "round(`books`.`rating`/`books`.`votes`, 0) AS 'rating',".
	   "`authors`.`first_name` AS 'fname',".
	   "`authors`.`last_name` AS 'lname' ".
	   "FROM `books` JOIN `authors` ON `authors`.`id`=`books`.`author_id` WHERE 1";

if (!empty($book_name)) {
	$sql.=" AND `books`.`name` LIKE '%$book_name%'";
	$show=true;
}

if (!empty($author)) {
	$sql.=" AND (`authors`.`first_name` LIKE '%$author%' OR `authors`.`last_name` LIKE '%$author%')";
	$show=true;
}

if ($show) $query = mysqli_query($con, $sql);
?>
<!doctype html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
		<script>
		function bookVote(current_id) {
			var book_id = document.getElementById('book_id');
			var vote = document.getElementById('vote');
			var x;
			var x=prompt("Please enter rate", "5");
			if (x!=null & book_id != null && vote != null) {
			  x=parseInt(x);
			  if (x>0) {
			  	book_id.value=current_id;
			  	vote.value=x;
			  	document.getElementById('frm_books').submit();
			  }
			}
		}
		</script>
	</head>
	<body>
	<div id="wrapper">
		<div id="header"><?php include 'includes/header.php'; ?></div>
		<div id="nav"><?php include 'includes/navi.php'; ?></div>
		<div id="contentSection">
		<form method="post" action="books.php" id="frm_books">
		<input type="hidden" name="book_id" value="-1" id="book_id">
		<input type="hidden" name="vote" value="-1" id="vote">
		<input type="text" name="book_name" placeholder="search by book name" value="<?php echo $book_name?>">
		<input type="text" name="author" placeholder="search by author" value="<?php echo $author?>">
		<input type="submit" value=" Search ">
		</form>
		<table border=0 cellpadding="0" cellspacing="0" style="width:960px;">
		<tr style="background-color: #aabbcc;">
			<td style="width:390px;">Book name</td>
			<td style="width:200px;">Author</td>
			<td style="width:80px;">Year</td>
			<td style="width:220px;">Categories</td>
			<td style="width:150px;">Rating</td>
		</tr>
		<?php
		$i=0;
		while($show && $row=mysqli_fetch_assoc($query)) {
			$bgcolor = !($i&1) ? '#EBF8A4' : '#D3DCE3';
			$r = $row['rating'];
			if ($r>5) $r=5;
			echo "<tr style=\"background-color: $bgcolor;\"><td>{$row['book_name']}</td><td>".$row['fname']." ".$row['lname']."</td><td>{$row['year']}</td><td>{$row['categories']}</td><td>$r / 5 <input type=\"button\" onclick=\"bookVote(".$row['book_id'].");\" value=\"rate this book\"></td></tr>\n";
			$i++;
		}
		?>
		</table>
		</div>
	<div id="footer"><?php include 'includes/footer.php'; ?></div>
	</div>
	</body>
</html>	
