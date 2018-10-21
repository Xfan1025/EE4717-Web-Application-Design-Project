<?php //authmain.php
include "../dbconnect.php";
session_start();

// if (isset($_POST['user_email']) && isset($_POST['user_password']))
// {

	// check if the user has already logged in by checking if session_id is set
if (isset($_SESSION['user_id'])){
	$email = $_SESSION['user_email'];
	echo '<script language="javascript">';
	echo "alert('You are aleady logged in as $email')";
	echo "window.location.href = 'register.php';";
	echo '</script>';
}
else{


	// if the user has just tried to log in
	$email = $_POST['user_email'];
	$password = $_POST['user_password'];

	$password = md5($password);
	$query = "select * from users 
			where user_email='$email'
			and user_password='$password'";
			
	$result = mysqli_query($con, $query);
	// convert query result as associative array
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if ($result->num_rows >0 )
	{

		$con->close();
		
		// assign session_id to Session as user_id
		$_SESSION['user_id'] = session_id();
		$_SESSION['user_email'] = $email;
        $user_firstName = $row['user_firstName'];
		echo '<script language="javascript">';
		echo "alert('Welcome $user_firstName!');";
		echo "window.location.href = 'register.php';";
		echo '</script>';

		
	}
	else{
		// currently any query issue will be treated as wrong email/password. Fix later(maybe)
		// echo "login failed";

		echo '<script language="javascript">';
		echo "alert('Login failed. Check your email address and password and try it again.');";
		echo "window.location.href = 'register.php';";
		echo '</script>';
	}
}


// }
?>