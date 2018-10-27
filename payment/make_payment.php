<?php
session_start();
include "../dbconnect.php";

// insert record for event booking
if (isset($_SESSION['events_booked'])){
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
        unset($_SESSION['events_booked']);
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
}

// insert record for delivery ordering
else{
    $food_ordered = json_encode($_SESSION['food_ordered']);
    $trans_dollars = $_SESSION['trans_dollars'];
    $user_email = $_SESSION['user_email'];

    $delivery_name =  $_POST['delivery_name'];
    $delivery_phone =  $_POST['delivery_phone'];
    $delivery_email = $_POST['delivery_email'];
    $delivery_address = $_POST['delivery_address'];
    $delivery_postcode = $_POST['delivery_postcode'];

    $query = "INSERT INTO foodDelivery_transactions (trans_id, 
                            food_ordered, user_email, delivery_name, delivery_phone, delivery_email, delivery_address, delivery_postcode, trans_dollars) 
            VALUES ('', '$food_ordered', '$user_email','$delivery_name','$delivery_phone','$delivery_email','$delivery_address','$delivery_postcode',$trans_dollars);";
    
    $result = mysqli_query($con, $query);
    
    if ($result){
        unset($_SESSION['food_ordered']);
        echo '<script language="javascript">';
        echo 'alert("Payment sucessful. You will receive an email confirmation shortly");';
        echo "window.location.href = '../home.html';";
        echo '</script>';
    }
    else{
    
        echo '<script language="javascript">';
        echo 'alert("Something wrong. Try it again.");';
        echo "window.location.href = '../delivery.php';";
        echo '</script>';
    }    
    // unset($_SESSION['food_ordered']);
}

?>