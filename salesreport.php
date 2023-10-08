<?php
require_once "process.php";
$query = "SELECT * from sales";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
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
.table{
    margin: 100px 0px;
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
        <h1>Sales Report</h1>
        <?php
        if (isset($_GET['editsuccess']) && $_GET['editsuccess'] == 1) {
                echo '<script>alert("Sales edited successfully")</script>';
            }
            ?>
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
                            {  $id = $row['sales_id'];
                    ?>
                    <td> <?php echo $id; ?> </td>
                    <td> <?php echo $row['product_name']; ?> </td>
                    <td> <?php echo $row['product_quantity']; ?> </td>
                    <td> <?php echo $row['product_amount']; ?> </td>
                    <td><a href="editsales.php?editid=<?php echo $id; ?>">Edit</a></td>
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