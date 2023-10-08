<?php
require_once "process.php";
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     echo "logged in";
//     exit;
// }
$user_id = $_SESSION['id'];
// if (!$user_id) {
//     echo "User ID not found in the session.";
//     exit;
// } else{
$query = "SELECT * from reg_form WHERE user_id = $user_id";
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
        <?php
        // if (mysqli_num_rows($result) > 1) {
        //     while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h2>Welcome " . $row['username'] . "</h2>";
                    echo "<p>Full Name: " . $row['lastname'] . " " . $row['firstname'] . "</p>";
                    echo "<p>Email: " . $row['email'] . "</p>";
                    echo "<p>Phone Number: " . $row['phone'] . "</p>";
        //     } 
        // }
        ?>
        
    </div>
    
</body>
</html>