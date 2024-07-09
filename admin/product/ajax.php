<?php
require_once('../database/dbhelper.php'); // Import file chứa các hàm để làm việc với cơ sở dữ liệu

if (!empty($_POST)) {
    if (isset($_POST['action'])) {
        $action = $_POST['action']; // Lấy giá trị action từ dữ liệu gửi đi

        switch ($action) {
            case 'delete':
                if (isset($_POST['id'])) {
                    $id = $_POST['id']; // Lấy giá trị id từ dữ liệu gửi đi

                    $sql = 'delete from product where id = '.$id; // Xây dựng truy vấn SQL để xóa sản phẩm với id tương ứng
                    execute($sql); // Thực hiện truy vấn để xóa sản phẩm khỏi cơ sở dữ liệu
                }
                break;
        }
    }
}
?>
