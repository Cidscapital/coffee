<?php

session_start();
include('../../config.php');

if(isset($_POST['addLoan'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    $add_loan = "INSERT INTO loan(name) VALUES('$name') ";
    $add_loan_run = mysqli_query($conn, $add_loan);
    if($add_loan_run){
        $_SESSION['successmessage'] = "Loan was added successfully";
        header('Location: ../loans.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../loans.php');
    }
}else if(isset($_POST['editLoan'])){
    $loanid = filter_input(INPUT_POST, 'loanid', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_loan = "UPDATE loan SET name='$name' WHERE id=$loanid ";
    $edit_loan_run = mysqli_query($conn, $edit_loan);
    if($edit_loan_run){
        $_SESSION['successmessage'] = "Loan was updated successfully";
        header('Location: ../loans.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../loans.php');
    }
}else if(isset($_POST['deleteLoan'])){
    $loandeleteid = filter_input(INPUT_POST, 'loandeleteid', FILTER_SANITIZE_SPECIAL_CHARS);

    $delete_loan = "DELETE FROM loan WHERE id=$loandeleteid ";
    $delete_loan_run = mysqli_query($conn, $delete_loan);
    if($delete_loan_run){
        $_SESSION['successmessage'] = "Loan was deleted successfully";
        header('Location: ../loans.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../loans.php');
    }
}else {
    $_SESSION['redirect'] = "You are not authorized to access this page.";
    header('Location: ../Login-Page/login1.php');
}


?>