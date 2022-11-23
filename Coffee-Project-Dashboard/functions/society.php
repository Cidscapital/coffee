<?php
session_start();
include('../../config.php');
if(isset($_POST['addSociety'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_SPECIAL_CHARS);

    $add_society = "INSERT INTO society(name, number) VALUES('$name', '$number')";
    $add_society_run = mysqli_query($conn, $add_society);
    if($add_society_run){
        $_SESSION['successmessage'] = "Society was added successfully";
        header('Location: ../societies.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../societies.php');
    }
}else if(isset($_POST['editSociety'])){
    $update_id = filter_input(INPUT_POST, 'update_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_society = "UPDATE society SET name='$name', number='$number' WHERE id=$update_id ";
    $edit_society_run = mysqli_query($conn, $edit_society);
    if($edit_society_run){
        $_SESSION['successmessage'] = "Society was updated successfully";
        header('Location: ../societies.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../societies.php');
    }
}else if(isset($_POST['deleteSociety'])){
    $delete_id = filter_input(INPUT_POST, 'delete_id', FILTER_SANITIZE_SPECIAL_CHARS);

    $delete_society = "DELETE FROM society WHERE id=$delete_id ";
    $delete_society_run = mysqli_query($conn, $delete_society);
    if($delete_society_run){
        $_SESSION['successmessage'] = "Society was deleted successfully";
        header('Location: ../societies.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../societies.php');
    }
}else {
    $_SESSION['redirect'] = "You are not authorized to access this page.";
    header('Location: ../Login-Page/login1.php');
}


?>