<?php
include "dbconnect.php";

if (empty($_POST['rsvName']) || empty ($_POST['rsvPhone'])
|| empty ($_POST['rsvEmail']) || empty ($_POST['rsvDate'])) {
		echo '<script language="javascript">';
		echo "alert('Invalid submission with empty form.');";
		echo "window.location.href = 'reservation.html';";
		echo '</script>';
		exit;
}
else {
	$rsvSalulation = $_POST['rsvSalulation'];
	$rsvName = $_POST['rsvName'];
	$rsvPhone = $_POST['rsvPhone'];
	$rsvEmail = $_POST['rsvEmail'];
	$rsvDate = $_POST['rsvDate'];
	$rsvTime = $_POST['rsvTime'];
	$rsvPax = $_POST['rsvPax'];
	$rsvComment = $_POST['rsvComment'];

	//TODO: Check for available slots
	$query = "INSERT INTO reserve (rsv_salulation, rsv_name, rsv_phone, rsv_email, rsv_date, rsv_time, rsv_pax, rsv_comment) 
	VALUES ('$rsvSalulation', '$rsvName', '$rsvPhone', '$rsvEmail', '$rsvDate', '$rsvTime', '$rsvPax', '$rsvComment')";
	$result = mysqli_query($con, $query);
	if (!$result) {
		echo '<script language="javascript">';
		echo "alert('Reservation failed. Please try again later.')";
		echo '</script>';	}
	else{
		echo '<script language="javascript">';
		echo 'alert("You have sucessfully made a reservation! A confirmation email has been sent to you.");';
		//Enable automatic email
		echo "window.location.href = 'home.html';";
		echo '</script>';
	}
}
?>