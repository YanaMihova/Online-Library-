<?php 
session_start();
?>
<!doctype html>
<html>
	<head>
		<title>contact</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">



<script type="text/javascript">
function validateForm(){
var fullN = document.forms["contactForm"]["fullName"].value;
var subjN = document.forms["contactForm"]["subject"].value;
var messN = document.forms["contactForm"]["message"].value;

if (fullN == "") {
//	alert ("Fullname is empty");

document.getElementById("nameError").innerHTML="Fullname is empty";
	return false; 
}else if(subjN == ""){
	document.getElementById("subError").innerHTML="Subject is empty";
//	alert ("Subject is empty");
	return false;
} else if(messN == ""){
//	alert ("Message box is empty");
document.getElementById("messError")
.innerHTML="Message is empty";
	return false; 
} else {
 document.forms["contactForm"].submit();
}

}
</script>
	</head>
	<body>
		<div id="wrapper">
		<div id="header">
		<?php include 'includes/header.php'; ?>
		</div>
		<div id="nav">
		<?php include 'includes/navi.php';?>
	</div>
	<div id="contentSection">
		<h1 style="text-align:center;">Contact Page</h1>

<?php 
if ((!isset($_POST["submit"]))) {

?>

<form name="contactForm" 
action="<?php echo $_SERVER["PHP_SELF"]; ?>"
onsubmit="return validateForm()"
method = "post">
<table>
	<caption>
		Contact Form
	</caption>
	<tr>
	<td>Full Name</td>
	<td>
		<input type="text" name="fullName">
	</td>
	<td class="red" id="nameError"></td>
</tr>
<tr>
	<td>Subject</td>
	<td>
		<input type="text" name="subject">
	</td>
	<td class="red" id="subError"></td>
</tr>
<tr>
<td>Message</td>
<td colspan="2"><textarea cols="40"
rows="10" name="message">
</textarea>
</td>
</tr>
<tr>
<td></td>
<td><input type="Submit" name="submit"name="send" value="send"></td>
<td class="red" id="messError"></td>

</tr>
</table>
</form>
<?php 
} else {
    $from = $_POST["fullName"]; // sender
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    if($from == "" || $subject == "" || $message == ""){
        echo "required fields empty";
    }else{
    
    // send mail
    mail("yana.todorova8512@gmail.com",$subject,$message,"From: $from\n");
    echo "<p style=text-align:center>Thank you for contacting us</p>";
    }
  }

?>

	</div>
	<div id="footer">
	<?php include 'includes/footer.php'; ?>
	</div>
	</div>
	</body>
</html>	