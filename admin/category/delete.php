<?php
require_once('..database/dbhelper.php');//Kết nối tới tệp dbhelper.php để thực hiện các thao tác liên quan đến cơ sở dữ liệu
?>
<?php
// Kiểm tra xem trường 'id' đã được gửi hay chưa thông qua phương thức POST
if (isset($POST['id'])) {
    $id = $POST['id'];// Gán giá trị từ trường 'id' vào biến $id


$sql = 'delete from category where id= ' . $id;// Tạo truy vấn SQL để xóa dữ liệu từ bảng 'category' dựa trên id
execute($sql);// Thực thi truy vấn SQL
header('Location: index.php');// Chuyển hướng người dùng đến trang 'index.php'
die();// Dừng kịch bản
}
?>