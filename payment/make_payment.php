<?php
session_start();
include "../dbconnect.php";

// insert record for event booking
if (isset($_SESSION['events_booked'])){
    $events_booked =  json_encode($_SESSION['events_booked']);
    $events_booked_email = json_encode($_SESSION['events_booked_email']);

    $user_email = $_SESSION['user_email'];
    $user_firstName = $_SESSION['user_firstName'];
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
    

    // to send confirmation email
    
    // the message

    $msg = "Thank you, $user_firstName!\nYour events been sucessfully booked those events:\n$events_booked_email \n
Deliver to: $delivery_name
Contact: $delivery_phone
Address: $delivery_address
Postcode: $delivery_postcode
Email: $delivery_email\n
We look forward to seeing you soon!";

    // use wordwrap() if lines are longer than 70 characters
    // $msg = wordwrap($msg,70);

    // send email
    mail("f31ee@localhost","Event Booking Confirmation",$msg);



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
    $user_firstName = $_SESSION['user_firstName'];

    $delivery_name =  $_POST['delivery_name'];
    $delivery_phone =  $_POST['delivery_phone'];
    $delivery_email = $_POST['delivery_email'];
    $delivery_address = $_POST['delivery_address'];
    $delivery_postcode = $_POST['delivery_postcode'];

    $query = "INSERT INTO foodDelivery_transactions (trans_id, 
                            food_ordered, user_email, delivery_name, delivery_phone, delivery_email, delivery_address, delivery_postcode, trans_dollars) 
            VALUES ('', '$food_ordered', '$user_email','$delivery_name','$delivery_phone','$delivery_email','$delivery_address','$delivery_postcode',$trans_dollars);";
    
    $result = mysqli_query($con, $query);

    // to send confirmation email
    
    // the message
    $food_ordered_email = json_encode($_SESSION['food_ordered_email']);
    $msg = "Thank you, $user_firstName!\nYour have ordered following food:\n$food_ordered_email \nThey are on the way! \n
Deliver to: $delivery_name
Contact: $delivery_phone
Address: $delivery_address
Postcode: $delivery_postcode
Email: $delivery_email\n
Enjoy!";

    // use wordwrap() if lines are longer than 70 characters
    // $msg = wordwrap($msg,70);

    // send email
    mail("f31ee@localhost","Delivery Order Confirmation",$msg);    
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