<?php
    session_start();
    include('../../config.php');

    if(isset($_POST['addLoanRepayment'])){
        $ltransaction = filter_input(INPUT_POST, 'ltransaction', FILTER_SANITIZE_SPECIAL_CHARS);
        $apaid = filter_input(INPUT_POST, 'apaid', FILTER_SANITIZE_SPECIAL_CHARS);

        $repayment = "INSERT INTO loan_repayment(loan_transaction_id, amount_paid) 
                        VALUES('$ltransaction', '$apaid') ";
        $repayment_run = mysqli_query($conn, $repayment);
        if($repayment_run){
            $_SESSION['successmessage'] = "Loan repayment was added successfully";
        header('Location: ../loanrepayments.php');
        } else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../loanrepayments.php');
        }
    }else if(isset($_POST['editLoanRepayment'])){
        $repaymentid = filter_input(INPUT_POST, 'repaymentid', FILTER_SANITIZE_SPECIAL_CHARS);
        $ltransaction = filter_input(INPUT_POST, 'ltransaction', FILTER_SANITIZE_SPECIAL_CHARS);
        $apaid = filter_input(INPUT_POST, 'apaid', FILTER_SANITIZE_SPECIAL_CHARS);

        $repayment = "UPDATE loan_repayment SET loan_transaction_id=$ltransaction, amount_paid=$apaid
                        WHERE id=$repaymentid ";
        $repayment_run = mysqli_query($conn, $repayment);
        if($repayment_run){
            $_SESSION['successmessage'] = "Loan repayment was updated successfully";
        header('Location: ../loanrepayments.php');
        } else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../loanrepayments.php');
        }
    }else if(isset($_POST['deleteLoanRepayment'])){
        $loanrepaymentdeleteid = filter_input(INPUT_POST, 'loanrepaymentdeleteid', FILTER_SANITIZE_SPECIAL_CHARS);

        $repayment = "DELETE FROM loan_repayment WHERE id=$loanrepaymentdeleteid ";
        $repayment_run = mysqli_query($conn, $repayment);
        if($repayment_run){
            $_SESSION['successmessage'] = "Loan repayment was deleted successfully";
        header('Location: ../loanrepayments.php');
        } else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../loanrepayments.php');
        }
    }

?>