<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'walgotech');
    define('DB_PASS', '123456');
    define('DB_NAME', 'coffee_system');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($conn->connect_error) {
        die('Connection Failed! ' . $conn->connect_error);
    }
?>