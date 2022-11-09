<?php

include('../config.php');

function getAll($table, $order){
    global $conn;
    $query = "SELECT * FROM $table ORDER BY $order";
    return $query_run = mysqli_query($conn, $query);
}

function getByID($table, $id){
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($conn, $query);

}

?>