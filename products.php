<?php
require_once "process.php";
$query = "SELECT * from products";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
    padding: 0px 20px;
}
input{
    width: 250px;
    padding: 10px;
    font-size: 20px;
}
button{
    width: 200px;
    padding: 5px;
    font-size: 20px;
    margin-top: 20px;
    background-color: rgb(39, 22, 3);
    color: white;
    border-radius: 10px;
}
.table{
    margin: 100px;
    font-size: 1.5rem;
}
table, th, td{
    border: 2px solid black;
    border-collapse: collapse;
    padding: 30px;
}
.table a{
    text-decoration: none;
    padding: 8px;
    background-color: rgb(39, 22, 3);
    color: white;
    border-radius: 10px;
}
</style>
<body>
<?php 
    require_once "nav.php" 
    ?>
    <div class="right-side">
        <h1>Add New Product</h1>
        <div class="form">
            <form action="process.php" method="POST">
            <?php
            // Check if product is added successful
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<script>alert("Product added successfully")</script>';
            }
            if (isset($_GET['editsuccess']) && $_GET['editsuccess'] == 1) {
                echo '<script>alert("Product edited successfully")</script>';
            }
            if (isset($_GET['delete']) && $_GET['delete'] == 1) {
                echo '<script>alert("Product deleted successfully")</script>';
            }
            ?>
                <input type="text" name="product_name" id="productname" placeholder="Product Name">
                <input type="text" name="product_quantity" id="productquantity" placeholder="Product Quantity">
                <input type="text" name="product_amount" id="productamount" placeholder="Product Amount">
                <input type="hidden" name="add">
                <button type="submit">Add Product</button>
            </form>
        </div>
        <div class="table">
            <table>
                    <th>ID</td>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Amount</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <tr>
                        <?php
                            while($row = mysqli_fetch_assoc($result))
                            {  $id = $row['product_id'];
                    ?>
                    <td> <?php echo $id; ?> </td>
                    <td> <?php echo $row['product_name']; ?> </td>
                    <td> <?php echo $row['product_quantity']; ?> </td>
                    <td> <?php echo $row['product_amount']; ?> </td>
                    <td><a href="edit.php?editid=<?php echo $id; ?>">Edit</a></td>
                    <td><a href="delete.php?deleteid=<?php echo $id; ?>">Delete</a></td>
                    </tr>
                    <?php
                     }
                    ?>
            </table>
        </div>
    </div>
</body>
</html>