<?php
session_start();
include '../config/database.php';
include '../config/base.php';

$fullname = $conn ->real_escape_string($_POST['fullname']);
$username = $conn ->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// check if the email/username is already taken 
$checkQuery = "SELECT * FROM User WHERE user_email = '$email' OR user_username = '$username'";
$result = $conn->query(($checkQuery));

if($result->num_rows>0){
    $_SESSION['error'] = "Email atau Username sudah digunakan";
    header("Location: register.php");
    exit();
}

$sql = "INSERT INTO User (user_username, user_fullname, user_email, user_password) 
        VALUES ('$username', '$fullname', '$email', '$password')";
        
if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = "Registrasi berhasil";
    $_SESSION['user_id'] = $conn->insert_id;
    header("Location: login.php");
}
else {
    $_SESSION['error'] = "Gagal registrasi: " . $conn->error;
    header("Location: register.php");
}
?>