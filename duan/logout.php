<?php
session_start();
session_unset();  // Hủy tất cả session
session_destroy();  // Hủy session hiện tại

header("Location: login.php");  // Chuyển hướng về trang đăng nhập
exit;
?>
