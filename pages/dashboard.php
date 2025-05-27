
<?php
session_start();
include '../config/base.php';

if (!isset($_SESSION['user_id'])){
    header("Location:" . BASE_URL . "auth/login.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YTTA</title>
</head>
<body>    
    <?php
        echo "Welcome, " . $_SESSION['fullname'];
    ?>

    <form action = "../auth/logout.php" method="POST">
    <button type="submit">
        Logout
    </button>
</body>
</html>