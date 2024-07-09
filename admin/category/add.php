<?php
require_once('../database/dbhelper.php');//Kết nối đến tệp dbhelper.php để thực hiện các tác vụ liên quan đến cơ sở dữ liệu
$id = $name = '';// Khởi tạo biến $id và $name
// Kiểm tra xem trường tên đã được gửi đi hay chưa
if (!empty($_POST['name'])){
    $name = '';//Gán giá trị rỗng cho biến $name
    // Kiểm tra xem trường tên đã được đặt hay chưa
    if (isset($_POST['name'])) {
        $name = $_POST['name'];// Lấy giá trị từ trường tên trong biểu mẫu
        $name = str_replace('"', '\\"', $name);// Thay thế ký tự " bằng \"
    }
    // Kiểm tra xem trường id đã được đặt hay chưa
    if (isset($_POST['id'])) {
        $id = $_POST['id'];//Lấy giá trị từ trường id trong biểu mẫu
    }
    // Kiểm tra xem biến $name có giá trị hay không
    if (!empty($name)) {
        $created_at = $updated_at = date('Y-m-d H:s:i');// Gán thời gian hiện tại cho biến $created_at và $updated_at
        // Lưu vào DB
        if ($id == '') {
            // Thêm danh mục
            $sql = 'insert into category(name, created_at,updated_at) 
            values ("' . $name . '","' . $created_at . '","' . $updated_at . '")';
        } 
        else {
            // Sửa danh mục
            $sql = 'update category set name="' . $name . '", updated_at="' . $updated_at . '" where id=' . $id;
        }
        execute($sql);// Thực thi truy vấn SQL
        header('Location: index.php');// Chuyển hướng đến trang index.php
        die();
    }
}


// Kiểm tra và lấy thông tin danh mục từ cơ sở dữ liệu để hiển thị trên biểu mẫu
if (isset($_GET['id'])) {
    $id = $_GET['id'];// Lấy giá trị id từ URL
    $sql = 'select * from category where id=' . $id;// Tạo truy vấn SQL để lấy thông tin danh mục dựa trên id
    $category = executeSingleResult($sql);// Thực thi truy vấn và lấy kết quả trả về một mục
    // Kiểm tra xem danh mục có tồn tại hay không
    if ($category != null) {
        $name = $category['name'];// Gán giá trị tên từ cơ sở dữ liệu vào biến $name
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Danh Mục</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
    <li class="nav-item">
            <a class="nav-link" href="../index.php">Thống kê</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Quản lý danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product/">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Quản lý giỏ hàng</a>
        </li>
    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm/Sửa Danh Mục</h2>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Tên Danh Mục:</label>
                        <input type="text" id="id" name="id" value="<?= $id ?>" hidden='true'>
                        <input required="true" type="text" class="form-control" id="name" name="name" value="<?= $name ?>">
                    </div>
                    <button class="btn btn-success">Lưu</button>
                    <?php
                    $previous = "javascript:history.go(-1)";
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $previous = $_SERVER['HTTP_REFERER'];
                    }
                    ?>
                    <a href="<?= $previous ?>" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>