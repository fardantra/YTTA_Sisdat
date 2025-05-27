<?php
session_start();
include '../config/base.php';

session_destroy();
header("Location: " . BASE_URL . "auth/login.php");
exit();
?>