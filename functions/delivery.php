<?php

session_start();
include('../../config.php');

if(isset($_POST['addDelivery'])){
    $factory = filter_input(INPUT_POST, 'factory', FILTER_SANITIZE_SPECIAL_CHARS);
    $farmer = filter_input(INPUT_POST, 'farmer', FILTER_SANITIZE_SPECIAL_CHARS);
    $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_SPECIAL_CHARS);
    $delivered = filter_input(INPUT_POST, 'delivered', FILTER_SANITIZE_SPECIAL_CHARS);

    $add_delivery = "INSERT INTO deliveries(factory_id, farmer_id, item_id, qty_delivered)
                        VALUES('$factory', '$farmer', '$item', '$delivered')";
    $add_delivery_run = mysqli_query($conn, $add_delivery);
    if($add_delivery_run){
        $_SESSION['successmessage'] = "Delivery was added successfully";
        header('Location: ../managerdeliveries.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../managerdeliveries.php');
    }
}else if(isset($_POST['editDelivery'])){
    $deliveryid = filter_input(INPUT_POST, 'deliveryid', FILTER_SANITIZE_SPECIAL_CHARS);
    $factory = filter_input(INPUT_POST, 'factory', FILTER_SANITIZE_SPECIAL_CHARS);
    $farmer = filter_input(INPUT_POST, 'farmer', FILTER_SANITIZE_SPECIAL_CHARS);
    $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_SPECIAL_CHARS);
    $delivered = filter_input(INPUT_POST, 'delivered', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_delivery = "UPDATE deliveries SET factory_id=$factory, farmer_id=$farmer, item_id=$item, qty_delivered=$delivered
                        WHERE id = $deliveryid ";
    $edit_delivery_run = mysqli_query($conn, $edit_delivery);
    if($edit_delivery_run){
        $_SESSION['successmessage'] = "Delivery was updated successfully";
        header('Location: ../managerdeliveries.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../managerdeliveries.php');
    }
}else if(isset($_POST['deleteDelivery'])){
    $deliveryid = filter_input(INPUT_POST, 'deliveryid', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $delete_delivery = "DELETE FROM deliveries WHERE id=$deliveryid ";
    $delete_delivery_run = mysqli_query($conn, $delete_delivery);
    if($delete_delivery_run){
        $_SESSION['successmessage'] = "Delivery was deleted successfully";
        header('Location: ../managerdeliveries.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../managerdeliveries.php');
    }
}


?>