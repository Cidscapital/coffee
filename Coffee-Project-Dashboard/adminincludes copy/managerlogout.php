<?php
session_start();

if(isset($_SESSION['auth'])){
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    $_SESSION['successmessage'] = "Logout was successfull";
}

header('Location: ../../Login-Page/managerlogin.php');