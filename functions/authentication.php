<?php
session_start();
include('../config.php');

if(isset($_POST['registerBtn'])){
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpassword = filter_input(INPUT_POST, 'cpassword', FILTER_SANITIZE_SPECIAL_CHARS);

    $check_username = "SELECT username FROM user WHERE username = '$username' ";
    $check_username_run = mysqli_query($conn, $check_username);
    if(mysqli_num_rows($check_username_run) > 0){
        $_SESSION['usernameerror'] = 'Username entered already exists.';
        header('Location: ../Sign-Up-Page/register.php');
    }else{
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $_SESSION['passworderror'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            header('Location: ../Sign-Up-Page/register.php');
        }elseif($password != $cpassword){
            $_SESSION['cpassworderror'] = 'The two passwords did not match';
            header('Location: ../Sign-Up-Page/register.php');
        } else{
            $password = hash(algo: "md5", data: $password, binary: false);
            $sql = "INSERT INTO user(first_name, last_name, username, email, password)
                VALUES('$fname', '$lname', '$username', '$email', '$password')";

            if(mysqli_query($conn, $sql)){
                $_SESSION['successmessage'] = "Registration was successful";
                header('Location: ../Login-Page/login1.php');
            };
        }
    }
}else if(isset($_POST['loginBtn'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $user_check = "SELECT * FROM user WHERE username='$username' ";
    $user_check_run = mysqli_query($conn, $user_check);
    if(mysqli_num_rows($user_check_run) > 0){
        $userdata = mysqli_fetch_array($user_check_run);
        $hashpassword = $userdata['password'];
        $_SESSION['hashedp'] = $hashpassword;
        if(md5($password) == $hashpassword){
            $_SESSION['auth'] = true;

            $username = $userdata['first_name'];
            $useremail = $userdata['email'];

            $_SESSION['auth_user'] = [
                'role' => 'admin',
                'name' => $username,
                'email' => $useremail,
            ];

            $_SESSION['successmessage'] = "Log in was successful.";
            header('Location: ../Coffee-Project-Dashboard/coffeeProjectDashboard.php');
        }else{
            $_SESSION['passerror'] = "Invalid Credentials" ;
            header('Location: ../Login-Page/login1.php');
        }
        
        
    }else{
        $_SESSION['usererror'] = "Invalid Credentials";
        header('Location: ../Login-Page/login1.php');
    }
}else if(isset($_POST['managerloginBtn'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $user_check = "SELECT * FROM factory_manager WHERE username='$username' ";
    $user_check_run = mysqli_query($conn, $user_check);
    if(mysqli_num_rows($user_check_run) > 0){
        $userdata = mysqli_fetch_array($user_check_run);
        $hashpassword = $userdata['password'];
        $_SESSION['hashedp'] = $hashpassword;
        if(md5($password) == $hashpassword){
            $_SESSION['auth'] = true;

            $username = $userdata['first_name'];
            $societyid = $userdata['society_id'];

            $_SESSION['auth_user'] = [
                'role' => 'manager',
                'name' => $username,
                'societyid' => $societyid,
            ];

            $_SESSION['successmessage'] = "Log in was successful.";
            header("Location: ../Coffee-Project-Dashboard/managerDashboard.php?societyid=$societyid");
        }else{
            $_SESSION['passerror'] = "Invalid Credentials" ;
            header('Location: ../Login-Page/managerlogin.php');
        }
        
        
    }else{
        $_SESSION['usererror'] = "Invalid Credentials";
        header('Location: ../Login-Page/managerlogin.php');
    }
}

?>