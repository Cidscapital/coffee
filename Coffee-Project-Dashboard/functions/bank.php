<?php

session_start();
include('../../config.php');

if(isset($_POST['addBank'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    $add_bank = "INSERT INTO banks(name) VALUES('$name') ";
    $add_bank_run = mysqli_query($conn, $add_bank);
    if($add_bank_run){
        $_SESSION['successmessage'] = "Bank was added successfully";
        header('Location: ../banks.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../banks.php');
    }
}else if(isset($_POST['editBank'])){
    $bankid = filter_input(INPUT_POST, 'bankid', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_bank = "UPDATE banks SET name='$name' WHERE id=$bankid ";
    $edit_bank_run = mysqli_query($conn, $edit_bank);
    if($edit_bank_run){
        $_SESSION['successmessage'] = "Bank was updated successfully";
        header('Location: ../banks.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../banks.php');
    }
}else if(isset($_POST['deleteBank'])){
    $bankdeleteid = filter_input(INPUT_POST, 'bankdeleteid', FILTER_SANITIZE_SPECIAL_CHARS);

    $delete_bank = "DELETE FROM banks WHERE id=$bankdeleteid ";
    $delete_bank_run = mysqli_query($conn, $delete_bank);
    if($delete_bank_run){
        $_SESSION['successmessage'] = "Bank was deleted successfully";
        header('Location: ../banks.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../banks.php');
    }
}else {
    $_SESSION['redirect'] = "You are not authorized to access this page.";
    header('Location: ../Login-Page/login1.php');
}


?>