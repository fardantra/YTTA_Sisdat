<?php
session_start();
include '../config/database.php';
include '../config/base.php';

$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

$sql = "SELECT * FROM User WHERE user_username='$username'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $user = $result->fetch_assoc();
    if(password_verify($password, $user['user_password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['fullname'] = $user['user_fullname'];
        header("Location: " . BASE_URL . "pages/dashboard.php");
    }
    else {
        $_SESSION['error'] = "Password salah.";
        header("Location: " . BASE_URL . "auth/login.php");
    }
}
else {
        $_SESSION['error'] = "Username tidak ditemukan.";
        header("Location: ". BASE_URL . "auth/login.php");
    }
?>
