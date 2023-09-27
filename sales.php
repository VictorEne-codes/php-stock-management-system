<?php
require_once "process.php";
// require_once "products.php";
$query = "SELECT * from products";
$result = mysqli_query($conn, $query);
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
</style>
<body>
<?php 
    require_once "nav.php" 
    ?>
    <div class="right-side">
        <h1>Make Sales</h1>
        <div class="form">
            <form action="process.php" method="POST">
            <?php
            // Check if product is added successful
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<script>alert("Product Sold successfully")</script>';
            }
            ?>
                <!-- <label for="">Product Name</label><br><br> -->
                <select name="sell_products" id="sell_products">
                <?php
                            while($row = mysqli_fetch_assoc($result))
                            {   
                    ?>
                    <option value=""> <?php echo $row['product_name']; ?> 
                        
                    </option>
                    <?php
                     }
                    ?>

                </select><br><br>
                <input type="number" name="sell_product_quantity" id="productquantity" placeholder="Product Quantity">
                <br><br>
                <input type="text" name="sell_product_amount" id="productamount" placeholder="Product Amount">
                <input type="hidden" name="sell">
                <br><br>
                <button type="submit">Sell Product</button>
            </form>
        </div>
    </div>
</body>
</html>