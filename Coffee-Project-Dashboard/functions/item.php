<?php
session_start();
include('../../config.php');

if(isset($_POST['addItem'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $unit = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_SPECIAL_CHARS);
    $uMeasurement = filter_input(INPUT_POST, 'uMeasurement', FILTER_SANITIZE_SPECIAL_CHARS);

    $add_item = "INSERT INTO item(name, unit, unit_of_measurement) 
                VALUES('$name', '$unit', '$uMeasurement')";
    $add_item_run = mysqli_query($conn, $add_item);
    if($add_item_run){
        $_SESSION['successmessage'] = "Item was added successfully";
        header('Location: ../items.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../items.php');
    }
}else if(isset($_POST['editItem'])){
    $itemid = filter_input(INPUT_POST, 'itemid', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $unit = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_SPECIAL_CHARS);
    $uMeasurement = filter_input(INPUT_POST, 'uMeasurement', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_item = "UPDATE item SET name='$name', unit='$unit', unit_of_measurement = '$uMeasurement'
                    WHERE id=$itemid ";
    $edit_item_run = mysqli_query($conn, $edit_item);
    if($edit_item_run){
        $_SESSION['successmessage'] = "Item was updated successfully";
        header('Location: ../items.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../items.php');
    }
}else if(isset($_POST['deleteItem'])){
    $itemdeleteid = filter_input(INPUT_POST, 'itemdeleteid', FILTER_SANITIZE_SPECIAL_CHARS);

    $delete_item = "DELETE FROM item WHERE id=$itemdeleteid ";
    $delete_item_run = mysqli_query($conn, $delete_item);
    if($delete_item_run){
        $_SESSION['successmessage'] = "Item was deleted successfully";
        header('Location: ../items.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../items.php'); 
    }
}


?>