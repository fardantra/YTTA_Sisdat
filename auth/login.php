<?php
session_start();
include '../config/base.php';

// TEMPORARY LOGIN UI, PLS CHANGE IT LATER

// if the user is alreaddy logged in, redirect to dashboard
if(isset($_SESSION['user_id'])){
    header("Location:" . BASE_URL . "pages/dashboard.php");
    exit(); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Your Team's Task Assistant</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com "></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Login ke Akun Anda</h2>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>

    <form action="login-process.php" method="POST" class="space-y-4">
      <div>
        <label for="" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="username" name="username" id="username" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
        Login
      </button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
      Belum punya akun?
      <a href="register.php" class="text-blue-500 hover:underline">Daftar di sini</a>
    </p>
  </div>

</body>
</html>