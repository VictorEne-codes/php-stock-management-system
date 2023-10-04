<?php

require_once "process.php";
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $delete = "DELETE from products where product_id = $id";
    $result = mysqli_query($conn, $delete);
    if($result){
        $msg_id = $conn->insert_id;
        
        header("Location: products.php?delete=1");
    }else{
        die(mysqli_error(!conn));
    }
}