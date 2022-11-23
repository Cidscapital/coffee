<?php
session_start();
include('../../config.php');

if(isset($_POST['addRate'])){
    $rate = filter_input(INPUT_POST, 'rate', FILTER_SANITIZE_SPECIAL_CHARS);
    $itemid = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);

    $current_rate = "INSERT INTO current_rate(market_rate, item_id, status) VALUES('$rate', $itemid, '$status') ";
    $current_rate_run = mysqli_query($conn, $current_rate);
    if($current_rate_run){
        $_SESSION['successmessage'] = "Rate was added successfully";
        header('Location: ../currentrate.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../currentrate.php');
    }
}else if(isset($_POST['editRate'])){
    $rateid = filter_input(INPUT_POST, 'rateid', FILTER_SANITIZE_SPECIAL_CHARS);
    $rate = filter_input(INPUT_POST, 'rate', FILTER_SANITIZE_SPECIAL_CHARS);
    $itemid = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_rate = "UPDATE current_rate SET market_rate=$rate, item_id=$itemid, status='$status' WHERE id=$rateid ";
    $edit_rate_run = mysqli_query($conn, $edit_rate);
    if($edit_rate_run){
        $_SESSION['successmessage'] = "Rate was updated successfully";
        header('Location: ../currentrate.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../currentrate.php');
    }
}else if(isset($_POST['deleteRate'])){
    $rateid = filter_input(INPUT_POST, 'rateid', FILTER_SANITIZE_SPECIAL_CHARS);

    $delete_rate = "DELETE FROM current_rate WHERE id=$rateid ";
    $delete_rate_run = mysqli_query($conn, $delete_rate);
    if($delete_rate_run){
        $_SESSION['successmessage'] = "Rate was deleted successfully";
        header('Location: ../currentrate.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../currentrate.php');
    }
}else {
    $_SESSION['redirect'] = "You are not authorized to access this page.";
    header('Location: ../Login-Page/login1.php');
}


?>