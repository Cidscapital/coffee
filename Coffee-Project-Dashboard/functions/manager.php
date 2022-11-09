<?php

session_start();
include('../../config.php');

if(isset($_POST['addManager'])){
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpassword = filter_input(INPUT_POST, 'cpassword', FILTER_SANITIZE_SPECIAL_CHARS);
    $societyid = filter_input(INPUT_POST, 'societyid', FILTER_SANITIZE_SPECIAL_CHARS);

    $manager = "SELECT * FROM factory_manager WHERE username='$username' ";
    $manager_run = mysqli_query($conn, $manager);
    if(mysqli_num_rows($manager_run) > 0){
        $_SESSION['errormessage'] = "Manager with that username already exists";
        header('Location: ../addmanager.php');
    }else{
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
            $_SESSION['errormessage'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
            header('Location: ../addmanager.php');
        }else if($password != $cpassword) {
            $_SESSION['errormessage'] = "The two passwords did not match.";
            header('Location: ../addmanager.php');
        }else{
            $password = hash(algo: "md5", data: $password, binary: false);
            $add_manager = "INSERT INTO factory_manager(first_name, last_name, username, password, society_id)
                    VALUES('$fname', '$lname', '$username', '$password', '$societyid') ";
            $add_manager_run = mysqli_query($conn, $add_manager);
            if($add_manager_run){
                $_SESSION['successmessage'] = "Factory manager was added successfully";
                header('Location: ../managers.php');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../managers.php');
            }
        }

    
    }
    
    
}else if(isset($_POST['editManager'])){
    $managerid = filter_input(INPUT_POST, 'managerid', FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $societyid = filter_input(INPUT_POST, 'societyid', FILTER_SANITIZE_SPECIAL_CHARS);

    $edit_manager = "UPDATE factory_manager SET first_name='$fname', last_name='$lname', username='$username', society_id='$societyid'
                        WHERE id=$managerid ";
    $edit_manager_run = mysqli_query($conn, $edit_manager);
    if(isset($edit_manager_run)){
        $_SESSION['successmessage'] = "Factory manager was updated successfully";
        header('Location: ../managers.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../managers.php');
    }
}else if(isset($_POST['deleteManager'])){
    $managerid = filter_input(INPUT_POST, 'managerid', FILTER_SANITIZE_SPECIAL_CHARS);

    $delete_manager = "DELETE FROM factory_manager WHERE id=$managerid ";
    $delete_manager_run = mysqli_query($conn, $delete_manager);
    if($delete_manager_run){
        $_SESSION['successmessage'] = "Factory manager was deleted successfully";
        header('Location: ../managers.php');
    }else{
        $_SESSION['errormessage'] = "Something went wrong";
        header('Location: ../managers.php');
    }
}

?>