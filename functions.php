<?php
require_once "process.php";

function display_data(){
    global $conn;
    $query = "SELECT * from products";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>