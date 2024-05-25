<?php
// Bắt đầu session
session_start();

// Xóa tất cả các biến session
session_unset();

// Hủy session
session_destroy();
header('Location: login.php');
exit();
?>