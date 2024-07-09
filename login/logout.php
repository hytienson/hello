<?php
// Bắt đầu phiên làm việc
session_start();
// Kiểm tra xem cookie 'username' đã được đặt và có giá trị hay không
if (isset($_COOKIE['username']) && ($_COOKIE['username'])) {
    // Xóa cookie 'username' bằng cách đặt thời gian sống là 0 (ngay lập tức hết hạn)
    setcookie("username", "", time() - 30 * 24 * 60 * 60, '/');
    // Tương tự, xóa cookie 'password'
    setcookie("password", "", time() - 30 * 24 * 60 * 60, '/');
    // Chuyển hướng người dùng về trang chính ('../index.php')
    header('Location: ../index.php');
}
