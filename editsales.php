<?php

require_once "process.php";
$id = $_GET['editid'];
$query = "SELECT * from sales WHERE sales_id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
</style>
<body>
<?php 
    require_once "nav.php" 
    ?>
    <div class="right-side">
        <h1>PEDIFORTE SHOPPING COMPLEX</h1>
        <h1>Edit Product</h1>
         <form action="process.php" method="POST">
                <input type="hidden" name="sales_id" value="<?php echo $row['sales_id']; ?>">
                <input type="text" name="product_name" id="productname" value="<?php echo $row['product_name']; ?>">
                <input type="text" name="product_quantity" id="productquantity" value=" <?php echo $row['product_quantity']; ?>">
                <input type="text" name="product_amount" id="productamount" value=" <?php echo $row['product_amount']; ?>">
                <input type="hidden" name="editsales">
                <button type="submit">Edit Sale</button>
            </form>
            <?php  ?>
    </div>
    
</body>
</html>
