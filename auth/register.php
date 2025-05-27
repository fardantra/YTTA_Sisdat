<?php
include '../config/base.php';
session_start();

// Jika user sudah login, arahkan ke dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "pages/dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Your Team's Task Assistant</title>
</head>
<body>
    <h1>Register</h1>
    <div>
        <?php if (isset($_SESSION['error'])): ?>
        <div>
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
        <?php endif; ?>

        <form action="register-process.php" method="POST">
            <label>Nama Lengkap:</label>
            <input type="text" name="fullname" id="fullname" required></br>
            <label>Email:</label>
            <input type="email" name="email" id="email" required></br>
            <label>Username:</label>
            <input type="username" name="username" id="username" required></br>
            <label>Password:</label>
            <input type="password" name="password" id="password" required></br>
            <button type="submit">
                Register
            </button>
    </div>    
        

</body>
</html>