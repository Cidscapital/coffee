<?php

session_start();
include('../../config.php');

if(isset($_POST['addPayment'])){
    $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_SPECIAL_CHARS);
    $farmer = filter_input(INPUT_POST, 'farmer', FILTER_SANITIZE_SPECIAL_CHARS);
    $dtransaction = filter_input(INPUT_POST, 'dtransaction', FILTER_SANITIZE_SPECIAL_CHARS);
    $rate = filter_input(INPUT_POST, 'rate', FILTER_SANITIZE_SPECIAL_CHARS);

    $add_payment = "INSERT INTO payment(item_id, farmer_id, debt, market_rate)
                        VALUES('$item', '$farmer', '$dtransaction', '$rate')";
    $add_payment_run = mysqli_query($conn, $add_payment);
    if($add_payment_run){
        $_SESSION['successmessage'] = "Payment was added successfully";
        header('Location: ../payments.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../payments.php');
    }
}else if(isset($_POST['editPayment'])){
    $paymentid = filter_input(INPUT_POST, 'paymentid', FILTER_SANITIZE_SPECIAL_CHARS);
    $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_SPECIAL_CHARS);
    $farmer = filter_input(INPUT_POST, 'farmer', FILTER_SANITIZE_SPECIAL_CHARS);
    $dtransaction = filter_input(INPUT_POST, 'dtransaction', FILTER_SANITIZE_SPECIAL_CHARS);
    $rate = filter_input(INPUT_POST, 'rate', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_payment = "UPDATE payment SET item_id=$item, farmer_id=$farmer, debt=$dtransaction, market_rate=$rate
                    WHERE id=$paymentid";
    $edit_payment_run = mysqli_query($conn, $edit_payment);
    if($edit_payment_run){
        $_SESSION['successmessage'] = "Payment was updated successfully";
        header('Location: ../payments.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../payments.php');
    }
}else if(isset($_POST['deletePayment'])){
    $paymentid = filter_input(INPUT_POST, 'paymentid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $delete_payment = "DELETE FROM payment WHERE id=$paymentid ";
    $delete_payment_run = mysqli_query($conn, $delete_payment);
    if($delete_payment_run){
        $_SESSION['successmessage'] = "Payment was deleted successfully";
        header('Location: ../payments.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../payments.php');
    }
}else {
    $_SESSION['redirect'] = "You are not authorized to access this page.";
    header('Location: ../Login-Page/login1.php');
}


?>