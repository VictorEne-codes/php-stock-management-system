<?php
session_start();


$host = "localhost";
$username = "pediforte";
$password = "pedifortedb";
$db_name = "stocks";

// $conn = new mysqli($host, $username, $password, $db_name);

// Create connection
$conn = mysqli_connect($host, $username, $password, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
    if (isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        //validate message
        if (strlen($firstname) < 5){
            echo "Your Firstname is too short";
            die();
        }
        $lastname = $_POST['lastname'];
        //validate message
        if (strlen($lastname) < 5){
            echo "Your Lastname is too short";
            die();
        }        
        $username = $_POST['username'];
        //validate message
        if (strlen($username) < 5){
            echo "Your Username is too short";
            die();
        }        
        $email = $_POST['email'];
        //validate email address
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "You submitted an invalid email address";
            die();
        }
        $phone = $_POST['phone'];
        //validate message
        if (strlen($phone) < 11){
            echo "Your Phone Number is not valid";
            die();
        }
        $password = $_POST['password'];
        //validate password
        if (strlen($password) < 5){
            echo "Your password is too short";
            die();
        }
        // add message to the database
        $hashed_password = hash ('sha256', $password);
        $query = "INSERT INTO reg_form (firstname, lastname, username, phone, email, password) 
        VALUES ('$firstname', '$lastname', '$username', '$phone', '$email', '$hashed_password')";
        if ($conn->query($query) === TRUE) {
            $msg_id = $conn->insert_id;
            // echo "<p>Login Successful</p>";
            // echo "<h4>We will get back to you asap</h4>";
            // redirect to form
            header('location: index.php');
        } else {
            echo "Error: <br/>".$conn->error;
        }
     }
    //  else{
    //      //redirect to form
    //      header('location: /login/loginform.html');
    //  }
// }
// process login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM reg_form WHERE username='$username' LIMIT 1";
    try{
        $data = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($data);
        if ($user == null){
            // no user with email found
            // header('location: loginform.html?err');
            echo "Incorrect user";
        } else {
            // hash submitted password
            $p_hash = hash('sha256', $password);
            // compare saved hash vs submitted hash
            if ($p_hash !== $user['password']) {
                //password is not correct
                echo "Wrong password";
                // header('location: loginform.html?err');
            } else {
                // login correct
                // set sessions in php
                $_SESSION['id'] = $user['id'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['pw'] = $user['password'];
                // set cookies for 2 days
                setcookie("user_id", $user['id'], time() + (86400 * 2), "/");
                setcookie("firstname", $user['firstname'], time() + (86400 * 2), "/");
                // redirect back to homepage
                header('location: index.php');
            }
        }
    } catch(Exception $e) {
        echo "Error happened: $e";
    }
}

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
    if (isset($_POST['add'])){
        $product_name = $_POST['product_name'];
        $product_quantity = $_POST['product_quantity'];
        $product_amount = $_POST['product_amount'];
        
        $query = "INSERT INTO products (product_name, product_quantity, product_amount) 
        VALUES ('$product_name', '$product_quantity', '$product_amount')";
        if ($conn->query($query) === TRUE) {
            $msg_id = $conn->insert_id;
            header("Location: products.php?success=1");
        } else {
            echo "Error: <br/>".$conn->error;
        }
    }

    
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      } 
      if (isset($_POST['edit'])){
        $id = $_GET['editid'];
        $product_name = $_POST['product_name'];
        $product_quantity = $_POST['product_quantity'];
        $product_amount = $_POST['product_amount'];
        $product_id = $_POST['product_id'];
        
        $update = "UPDATE products SET product_name = '$product_name', product_quantity = '$product_quantity', product_amount = '$product_amount' WHERE product_id = '$product_id' LIMIT 1";

    if (mysqli_query($conn, $update)) {
        $msg_id = mysqli_insert_id($conn);
        header("Location: products.php?editsuccess=1");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    }


if (isset($_POST['sell'])){


global $product_quantity;
global $product_name;


$sell_products = $_POST['sell_products'];
$sell_product_quantity = $_POST['sell_product_quantity'];
//  Check if the product exists in the database
    $query = "SELECT * FROM products WHERE product_name = '$product_name'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    $available_quantity = $row['product_quantity'];
    $new_quantity = $available_quantity - $sell_product_quantity;
// convert amount to float
// $amount = floatval($amount);
// // check the balance
// if ($products['product_quantity'] > $sell_product_quantity) {
//     // $message = "Insufficient fund";
//     // header('location: /transfer.php?err=' . $message);
//     echo "cannot sell";
// } else {
//     // remove amount from user balance
//     $bal = $products['product_quantity'] - $sell_product_quantity;
    // update user balance
    $query = "UPDATE products set product_quantity = $new_quantity WHERE id = ? LIMIT 1";
    echo "Product sold successfully!";
    try {
        $stmt = $conn->prepare($query);
        // $stmt->execute(array($bal));
    } catch (Exception $e) {
        echo "We are unable to process your request at the moment, please try again later <br/>" . $e;
    }
    if (mysqli_query($conn, $query)) {
        // Insert the sale record into the sales table (you need to create this table)
        $insert_query = "INSERT INTO sales (product_name, product_quantity, product_amount) VALUES ('$product_name', $quantity, $amount)";
    if (mysqli_query($conn, $insert_query)) {
        echo "success";
        // header("Location: your_success_page.php?success=1");
        exit();
    } else {
        echo "failed";
        // echo '<script>alert("Error inserting sale record: ' . mysqli_error($conn) . '")</script>';
    }
}

}
}?>