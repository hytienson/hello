<?php require "layout/header.php"; // Đây là dòng code để require (kết nối) file header.php ?> 
<?php
require_once('database/config.php'); // Kết nối đến file cấu hình database
require_once('database/dbhelper.php'); // Kết nối đến file chứa các hàm xử lý database
?>
<!-- END HEADR -->
<main>
    <div class="container">
        <div id="ant-layout">
            <section class="search-quan">
                <i class="fas fa-search"></i>
                <form action="thucdon.php" method="GET">
                    <input name="search" type="text" placeholder="Tìm món hoặc thức ăn">
                </form>
            </section>
            <section class="main-layout">
                <div class="row">
                    <?php
                    $sql = 'select * from category';  // Truy vấn danh sách các loại thức ăn
                    $categoryList = executeResult($sql); // Thực hiện truy vấn và lấy kết quả
                    $index = 1; // Biến đếm cho vòng lặp
                    foreach ($categoryList as $item) { // Hiển thị thông tin về từng loại thức ăn
                        echo '
                                    <div class="box">
                                        <a href="thucdon.php?id_category=' . $item['id'] . '">
                                            <p>' . $item['name'] . '</p>
                                            <div class="bg"></div>
                                            <img src="images/bg/tải xuống.jpg" alt="">
                                        </a>
                                    </div>
                                    ';
                    }
                    ?>
                </div>
            </section>
        </div>
        <div class="bg-grey">

        </div>
        <!-- END LAYOUT  -->
        <section class="main">
            <section class="recently">
                <div class="title">
                    <h1>Được yêu thích nhất</h1>
                </div>
                <div class="product-recently">
                    <div class="row">
                        <?php
                        $sql = 'SELECT * from product, order_details where order_details.product_id=product.id order by order_details.num DESC limit 4';
                        // Truy vấn và lấy danh sách sản phẩm được yêu thích nhất
                        $productList = executeResult($sql);// Thực hiện truy vấn và lấy kết quả
                        $index = 1; // Biến đếm cho vòng lặp
                        foreach ($productList as $item) { // Hiển thị thông tin về từng sản phẩm được yêu thích
                            echo '
                                <div class="col">
                                    <a href="details.php?id=' . $item['product_id'] . '">
                                        <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p>' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                        </div>
                                        <div class="more">
                                            <div class="star">
                                                <img src="images/icon/icon-star.svg" alt="">
                                                <span>4.6</span>
                                            </div>
                                            <div class="time">
                                                <img src="images/icon/icon-clock.svg" alt="">
                                                <span>15 comment</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                        }
                        ?>
                    </div>
                </div>
            </section>
            <!-- end Món ngon gần bạn -->

            <section class="restaurants">
                <div class="title">
                    <h1>Thực đơn tại quán <span class="green">Nhóm 5 Coffee</span></h1>
                </div>
                <div class="product-restaurants">
                    <div class="row">
                        <?php
                        try {
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $limit = 12;
                            $start = ($page - 1) * $limit;
                            $sql = "SELECT * FROM product limit $start,$limit";// Truy vấn danh sách sản phẩm theo trang
                            executeResult($sql);
                            // $sql = 'select * from product limit $star,$limit';
                            $productList = executeResult($sql);

                            $index = 1;
                            foreach ($productList as $item) {// Hiển thị thông tin về từng sản phẩm
                                echo '
                                <div class="col">
                                    <a href="details.php?id=' . $item['id'] . '">
                                        <img class="thumbnail" src="admin/product/'. $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p>' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                        </div>
                                        <div class="more">
                                            <div class="star">
                                                <img src="images/icon/icon-star.svg" alt="">
                                                <span>4.6</span>
                                            </div>
                                            <div class="time">
                                                <img src="images/icon/icon-clock.svg" alt="">
                                                <span>15 comment</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                            }
                        } catch (Exception $e) {
                            die("Lỗi thực thi sql: " . $e->getMessage());
                        }
                        ?>
                    </div>
                    <div class="pagination">
                        <ul>
                            <?php
                            $sql = "SELECT * FROM `product`";// Truy vấn để đếm tổng số sản phẩm
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);// Kết nối đến cơ sở dữ liệu
                            $result = mysqli_query($conn, $sql);// Thực hiện truy vấn
                            if (mysqli_num_rows($result)) {
                                $numrow = mysqli_num_rows($result);// Đếm số sản phẩm
                                $current_page = ceil($numrow / 12);// Tính số trang dựa trên số sản phẩm và số sản phẩm trên mỗi trang
                                // echo $current_page;
                            }
                            for ($i = 1; $i <= $current_page; $i++) {
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page) {
                                    echo '
                                    <li><a href="?page=' . $i . '">' . $i . '</a></li>';
                                } else {
                                    echo '
                                    <li><a href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
        </section>
    </div>
</main>
<?php require_once('layout/footer.php'); // Kết nối đến file footer.php
?>
</div>
</body>

</html>