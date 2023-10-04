<?php
require_once "process.php";
$query = "SELECT * from reg_form";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="homestyling.css">
</head>
<body>
<?php 
    require_once "nav.php" 
    ?>
    <div class="right-side">
        <h1>PEDIFORTE SHOPPING COMPLEX</h1>
        <h2>Welcome <?php echo $row['username']; ?> </h2>
        <p>Full Name: <?php echo $row['lastname'] . " " . $row['firstname']; ?> </p>
        <p>Email: <?php echo $row['email']; ?></p>
        <p>Phone Number: <?php echo $row['phone']; ?></p>
    </div>
    
</body>
</html>