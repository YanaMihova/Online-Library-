<html>
<head>
	<title>Contact Page</title>
	<script type="text/javascript">

	function validateForm(){
		var fromValue = 
		document.forms["contactForm"]["fullName"].value;
		var subjectValue = 
		document.forms["contactForm"]["subject"].value;
		var messageValue = 
		document.forms["contactForm"]["message"].value;
		if (fromValue == "") {
		//	alert ("From Text Field is Empty");
		document.getElementById("error1").innerHTML
		 = "Required Field";
			return false;
		} else if (subjectValue == "") {
			alert ("Subject Text Field is Empty");
			return false;
		} else if (messageValue == "" || messageValue == null) {
			alert ("Message box is Empty");
			return false;
		} 
	}

	</script>
</head>
<body>

	<?php 
	if ((!isset($_POST["submit"]))) {
	 ?>

	<form name="contactForm" 
	onsubmit="return validateForm()" method="post" 
	action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		<table>
			<tr>
				<td>From</td>
				<td><input type="text" name="fullName"></td>
			<td id="error1"></td>
			</tr>
			<tr>
				<td>Subject</td>
				<td><input type="text" name="subject" ></td>
			</tr>
			<tr>
				<td>Message</td>
				<td colspan="2"><textarea type="text" name="message"
					cols="40" rows="20"	 >
				</textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" 
					value="submit"></td>
			</tr>

		</table>
	</form>

	<?php 
	}else {
		$from = $_POST["fullName"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];

		if ($from == "" || $subject == "" 
			|| $message == "") {
			echo "Check Missing Fields";
		} else{
			echo "Your email was sent";
			mail("yana.todorova8512@gmail.com", $subject, $message);
		}
	}

	 ?>

</body>
</html>