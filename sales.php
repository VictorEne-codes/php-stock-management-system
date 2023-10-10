<?php
require_once "process.php";
$id = $_GET['salesid'];
$query = "SELECT * from products WHERE product_id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
if (isset($_POST['sales'])){
    $id = $_GET['salesid'];
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['product_quantity'];
    $product_amount = $_POST['product_amount'];
    $product_id = $_POST['product_id'];
    //  Check if the product exists in the database
$query = "SELECT * FROM products WHERE product_id = $id";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
$available_quantity = $row['product_quantity'];
$new_quantity = $available_quantity - $product_quantity;
$query = "UPDATE products SET product_quantity = $new_quantity WHERE product_id = $id LIMIT 1";
if (mysqli_query($conn, $query)) {
// echo "Product sold successfully!";
header("Location: products.php?salessuccess=1");

}
$insert_query = "INSERT INTO sales (product_name, product_quantity, product_amount) VALUES ('$product_name', $product_quantity, $product_amount)";
if (mysqli_query($conn, $insert_query)) {
    $msg_id = mysqli_insert_id($conn);
    // echo "sold sucessfully";
    header("Location: products.php?salessuccess=1");
} else {
    echo "Error: " . mysqli_error($conn);
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.right-side{
    height: 100vh;
    width: 75%;
    margin-left: 25%;
}
.right-side h1{
    color: rgb(39, 22, 3);
    font-size: 2rem;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    text-align: center;
    padding: 30px 0px;
}
.form{
    padding: 0px 200px;

}
input, select{
    width: 600px;
    padding: 10px;
    font-size: 20px;
}
button{
    width: 200px;
    padding: 5px;
    font-size: 20px;
    margin: 20px 250px;
    background-color: rgb(39, 22, 3);
    color: white;
    border-radius: 10px;
}
button a{
    text-decoration: none;
    color: white;
}
</style>
<body>
<?php 
    require_once "nav.php" 
    ?>
    <div class="right-side">
        <h1>Make Sales</h1>
        <form action="" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                <input type="text" name="product_name" id="productname" value="<?php echo $row['product_name']; ?>">
                <input type="text" name="product_quantity" id="productquantity" value="" placeholder="Enter Quantity" oninput="calculateAmount()">
                <input type="text" name="product_amount" id="productamount" value="<?php echo $row['product_amount']; ?>" placeholder="Enter Amount" readonly>
                <input type="hidden" name="sales">
                <button type="submit">Sell Product</button>
        </form>
            <?php  ?>
        </div>
    </div>
    <script>
function calculateAmount() {
    // Get the quantity and price from the form
    var quantity = document.getElementById('productquantity').value;
    var price = <?php echo $row['product_amount']; ?>; // Replace with the actual price from your database

    // Calculate the amount
    var amount = quantity * price;

    // Update the amount input field
    document.getElementById('productamount').value = amount;
}
</script>
</body>
</html>
