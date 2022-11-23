<?php
session_start();
include('../../config.php');

if(isset($_POST['addFarmer'])){
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $mnumber = filter_input(INPUT_POST, 'mnumber', FILTER_SANITIZE_SPECIAL_CHARS);
    $societyid = filter_input(INPUT_POST, 'societyid', FILTER_SANITIZE_SPECIAL_CHARS);
    $bnumber = filter_input(INPUT_POST, 'bnumber', FILTER_SANITIZE_SPECIAL_CHARS);
    $oamount = filter_input(INPUT_POST, 'oamount', FILTER_SANITIZE_SPECIAL_CHARS);
    $pnumber = filter_input(INPUT_POST, 'pnumber', FILTER_SANITIZE_SPECIAL_CHARS);
    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS);

    $add_farmer = "INSERT INTO farmer(first_name, last_name, member_number, society_id, bank_number, open_amount, phone_number, location)
                    VALUES('$fname', '$lname', '$mnumber', '$societyid', '$bnumber', '$oamount', '$pnumber', '$location') ";
    $add_farmer_run = mysqli_query($conn, $add_farmer);
    if($add_farmer_run){
        $_SESSION['successmessage'] = "Farmer was added successfully";
        header('Location: ../managerfarmers.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../managerfarmers.php');
    }
} else if(isset($_POST['editFarmer'])){
    $farmerid = filter_input(INPUT_POST, 'farmerid', FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $mnumber = filter_input(INPUT_POST, 'mnumber', FILTER_SANITIZE_SPECIAL_CHARS);
    $societyid = filter_input(INPUT_POST, 'societyid', FILTER_SANITIZE_SPECIAL_CHARS);
    $bnumber = filter_input(INPUT_POST, 'bnumber', FILTER_SANITIZE_SPECIAL_CHARS);
    $oamount = filter_input(INPUT_POST, 'oamount', FILTER_SANITIZE_SPECIAL_CHARS);
    $pnumber = filter_input(INPUT_POST, 'pnumber', FILTER_SANITIZE_SPECIAL_CHARS);
    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_farmer = "UPDATE farmer SET first_name='$fname', last_name='$lname', member_number='$mnumber', society_id='$societyid',
                    bank_number='$bnumber', open_amount='$oamount', phone_number='$pnumber', location = '$location' 
                    WHERE id=$farmerid";
    $edit_farmer_run = mysqli_query($conn, $edit_farmer);
    if($edit_farmer_run){
        $_SESSION['successmessage'] = "Farmer was edited successfully";
        header('Location: ../managerfarmers.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../managerfarmers.php');
    }

} else if(isset($_POST['deleteFarmer'])){
    $delete_id = filter_input(INPUT_POST, 'delete_id', FILTER_SANITIZE_SPECIAL_CHARS);

    
    $delete_farmer = "DELETE FROM farmer WHERE member_number=$delete_id ";
    $delete_farmer_run = mysqli_query($conn, $delete_farmer);
    if($delete_farmer_run){
        $_SESSION['successmessage'] = "Farmer was deleted successfully";
        header('Location: ../managerfarmers.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../managerfarmers.php');
    }
}else {
    $_SESSION['redirect'] = "You are not authorized to access this page.";
    header('Location: ../Login-Page/login1.php');
}


?>