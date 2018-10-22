<?php
session_start();
include "../dbconnect.php";


$events_booked =  json_encode($_SESSION['events_booked']);
$user_email = $_SESSION['user_email'];
$trans_dollars =  $_SESSION['trans_dollars'];

$delivery_name =  $_POST['delivery_name'];
$delivery_phone =  $_POST['delivery_phone'];
$delivery_email = $_POST['delivery_email'];
$delivery_address = $_POST['delivery_address'];
$delivery_postcode = $_POST['delivery_postcode'];

$query = "INSERT INTO eventBooking_transactions (trans_id, 
                        events_booked, user_email, delivery_name, delivery_phone, delivery_email, delivery_address, delivery_postcode, trans_dollars) 
        VALUES ('', '$events_booked', '$user_email','$delivery_name','$delivery_phone','$delivery_email','$delivery_address','$delivery_postcode',$trans_dollars);";

$result = mysqli_query($con, $query);

if ($result){
    echo '<script language="javascript">';
    echo 'alert("Payment sucessful. You will receive an email confirmation shortly");';
    echo "window.location.href = '../home.html';";
    echo '</script>';
}
else{

    echo '<script language="javascript">';
    echo 'alert("Something wrong. Try it again.");';
    echo "window.location.href = '../event.php';";
    echo '</script>';
}
?>