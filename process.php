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
            header('location: loginform.html');
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
                $_SESSION['id'] = $user['user_id'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['pw'] = $user['password'];
                // set cookies for 2 days
                setcookie("user_id", $user['id'], time() + (86400 * 2), "/");
                setcookie("firstname", $user['firstname'], time() + (86400 * 2), "/");
                // redirect back to homepage
                header('Location: index.php');
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

if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      } 
      if (isset($_POST['editsales'])){
        $id = $_GET['editid'];
        $product_name = $_POST['product_name'];
        $product_quantity = $_POST['product_quantity'];
        $product_amount = $_POST['product_amount'];
        $sales_id = $_POST['sales_id'];
        
        $updatesales = "UPDATE sales SET product_name = '$product_name', product_quantity = '$product_quantity', product_amount = '$product_amount' WHERE sales_id = '$sales_id' LIMIT 1";

    if (mysqli_query($conn, $updatesales)) {
        $msg_id = mysqli_insert_id($conn);
        header("Location: salesreport.php?editsuccess=1");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    }

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Check if the form was submitted
    if (isset($_POST['search'])) {
        // Get the search query from the form input
        $search_query = $_POST['product_name'];
    
        // Prepare and execute the database query to search for products by name
        $search = "SELECT * FROM products WHERE product_name LIKE '%$search_query%'";
        $result = mysqli_query($conn, $search);
    
        // Check if any products were found
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Search Results:</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Product Name: " . $row['product_name'] . "<br>";
                // Add other product details as needed
            }
        } else {
            echo "No products found matching your search criteria.";
        }
    }
    ?>

  