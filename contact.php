<?php
include "dbconnect.php";

if (empty($_POST['cttName']) || empty ($_POST['cttEmail']) || empty ($_POST['cttComment'])) {
		echo '<script language="javascript">';
		echo "alert('Invalid submission with empty form.');";
		echo "window.location.href = 'contact.html';";
		echo '</script>';
		exit;
}
else {
	$cttSalulation = $_POST['cttSalulation'];
	$cttName = $_POST['cttName'];
	$cttEmail = $_POST[''];
	$cttComment = $_POST['cttComment'];

	$query = "INSERT INTO contact (ctt_salulation, ctt_name, ctt_email, ctt_comment) 
	VALUES ('$cttSalulation', '$cttName', '$cttEmail', '$cttComment')";
	$result = mysqli_query($con, $query);
	if (!$result) {
		echo '<script language="javascript">';
		echo "alert('Contact failed. Please try again later.')";
		echo '</script>';	}
	else{
		echo '<script language="javascript">';
		echo 'alert("You have sucessfully submitted an inquiry! A confirmation email has been sent to you.");';
		//Enable automatic email
		echo "window.location.href = 'home.html';";
		echo '</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Xiong Mao - Contact</title>
<meta charset="utf-8">
<link rel="stylesheet" href="xiongmao.css">
<style>
#header {
	text-align: center;
	vertical-align: middle;
}
#contact {
	text-align: center;
}
#info {
	width: 600px;
    text-align: right;
	display: inline-block;
}
#form {
	width: 600px;
	text-align: left;
	vertical-align: top;
	display: inline-block;
}
h2, h3 {
	color:#FF476F;
}
form {
	line-height: 150%;
}
label {
	float: left;
	text-align: right; 
	padding-right: 10px;
	width: 15%;
	display: block;
}  
input, select, textarea {
	margin-left: 20px;
	text-align: left;
	display: block;
}	             
</style>
<script>
	function checkInput(){
		var name = document.getElementById("cttName");
	    var nameRegExp = /^[A-Za-z]+\s?[A-Za-z]*$/;
		var nameValid = nameRegExp.test(name.value);
   		if (nameValid != true) {
			alert("The name is not valid.\n" + "It should contain only alphabet characters and space.");
			name.focus();
			name.select();
			return false;
		}
	}
</script>
</head>
<body>
<div id="title-left">
	<img src="Assets/logo.png" id="logo" width="204" height="103">
</div>
<div id="title-right">
	<header>
		<h1>Xiong Mao</h1>
	</header>
	<nav>
		<a href="home.html">Home</a>
		<a href="menu.html">Menu</a>
		<a href="reservation.html">Reservation</a>
		<a href="delivery.html">Delivery</a>
		<a href="event.html">Event</a>
		<a href="contact.html">Contact</a>
		<a href="login_register.html">Login/Register</a>
	</nav>
</div>
<div id="contact">
	<div id="header">
		<img src="Assets/headerContact.png" width="1400" height="300">
		<h2>Contact Us</h2>
	</div>
	<div id="info">
		<img src="Assets/map.png" width="300" height="250">
		<p><h3>Xiong Mao</h3>
			Nanyang Technological University, <br>
			#01-01 Nanyang Center, <br>
			50 Nanyang Walk, <br>
			Singapore 639929.<br><br>
			Tel: 8888 6666<br>
			Email: <a href="mailto:xiongmao@xiongmao.com">xiongmao@xiongmao.com</a><br>
			Opening Hours: 11:00 - 23:00</p>
	</div>
	<div id="form">
		<form method="post" action="contact.php" onsubmit="return checkInput();" id="info">
				<label for="cttSalulation">* Salulation:</label>
				<select name="cttSalulation">
					<option value="Mr.">Mr.</option>
					<option value="Ms.">Ms.</option>
				</select><br>
  				<label for="cttName">* Name:</label>
  				<input type="text" name="cttName" id="cttName" required><br>
  				<label for="cttEmail">* E-mail:</label>
  				<input type="email" name="cttEmail" id="cttEmail" required><br>
				<label for="cttComment">* Comment:</label>
				<textarea name="cttComment" id="cttComment" rows="8" cols="18" required=""></textarea><br>
				<input id="cttSubmit" type="submit" value="Submit" style="margin-left: 100px;">
		</form>
	</div>
</div>
<footer>
	<small>Nanyang Technological University, #01-01 Nanyang Center, 50 Nanyang Walk, Singapore 639929<br>
		Tel: 8888 6666 | Email: <a href="mailto:xiongmao@xiongmao.com">xiongmao@xiongmao.com</a><br>
		<i>Copyright &copy; 2018 Xiong Mao, Inc.<br></i></small>	
</footer>
</body>
</html>