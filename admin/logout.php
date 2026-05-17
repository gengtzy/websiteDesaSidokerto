<?php
session_start();
session_unset();
session_destroy();

// Redirect kembali ke form login
require_once '../config/database.php';
header("Location: " . BASE_URL . "/login/login.php");
exit();
?>