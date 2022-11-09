<?php
session_start();
include('../../config.php');

if(isset($_POST['addLoanTransaction'])){
    $farmerid = filter_input(INPUT_POST, 'farmerid', FILTER_SANITIZE_SPECIAL_CHARS);
    $loanid = filter_input(INPUT_POST, 'loanid', FILTER_SANITIZE_SPECIAL_CHARS);
    $EPDate = filter_input(INPUT_POST, 'EPDate', FILTER_SANITIZE_SPECIAL_CHARS);
    $loanstatus = filter_input(INPUT_POST, 'loanstatus', FILTER_SANITIZE_SPECIAL_CHARS);


    $addLTransaction = "INSERT INTO loan_transaction(farmer_id, loan_id, expected_payment_date, loan_status)
                        VALUES('$farmerid', '$loanid', '$EPDate', '$loanstatus') ";
    $addLTransaction_run = mysqli_query($conn, $addLTransaction);
    if($addLTransaction_run){
        $_SESSION['successmessage'] = "Loan transaction was added successfully";
        header('Location: ../loantransactions.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../loantransactions.php');
    }
}else if(isset($_POST['editLoanTransaction'])){
    $transactionid = filter_input(INPUT_POST, 'transactionid', FILTER_SANITIZE_SPECIAL_CHARS);
    $farmerid = filter_input(INPUT_POST, 'farmerid', FILTER_SANITIZE_SPECIAL_CHARS);
    $loanid = filter_input(INPUT_POST, 'loanid', FILTER_SANITIZE_SPECIAL_CHARS);
    $EPDate = filter_input(INPUT_POST, 'EPDate', FILTER_SANITIZE_SPECIAL_CHARS);
    $loanstatus = filter_input(INPUT_POST, 'loanstatus', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_transaction = "UPDATE loan_transaction SET farmer_id = $farmerid, loan_id = $loanid, expected_payment_date = '$EPDate', loan_status = '$loanstatus'
                        WHERE id = $transactionid ";
    $edit_transaction_run = mysqli_query($conn, $edit_transaction);
    if($edit_transaction_run){
        $_SESSION['successmessage'] = "Loan transaction was edited successfully";
        header('Location: ../loantransactions.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../loantransactions.php');
    }
}else if(isset($_POST['deleteTransaction'])){
    $transactionid = filter_input(INPUT_POST, 'transactionid', FILTER_SANITIZE_SPECIAL_CHARS);

    $delete_transaction = "DELETE FROM loan_transaction WHERE id=$transactionid ";
    $delete_transaction_run = mysqli_query($conn, $delete_transaction);
    if($delete_transaction_run){
        $_SESSION['successmessage'] = "Loan transaction was deleted successfully";
        header('Location: ../loantransactions.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../loantransactions.php');
    }
}

?>