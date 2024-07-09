!DOCTYPE html>
<html lang="en">
<?php
require_once('database/config.php'); // Import tệp cấu hình của cơ sở dữ liệu
require_once('database/dbhelper.php');// Import tệp hỗ trợ truy vấn cơ sở dữ liệu
?>


<head>
    <meta charset="UTF-8"> <!-- Thiết lập bộ kí tự cho trang là UTF-8 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- Thiết lập chế độ tương thích trình duyệt -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Thiết lập hiển thị trên thiết bị di động -->
    <link rel="stylesheet" href="css/index.css"><!-- Liên kết đến tệp CSS để trang web có thể định dạng lại -->
    <link rel="stylesheet" href="css/product.css"><!-- Liên kết đến tệp CSS để trang web có thể định dạng lại -->
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css"><!-- Liên kết đến tệp CSS của FontAwesome cho biểu tượng -->
    <title>Codedoan Coffee</title><!-- Thiết lập tiêu đề trang -->
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="container">
                <section class="logo">
                    <a href=""><img src="images/logo-grabfood.svg" alt=""></a><!-- Đặt logo và liên kết về trang chính -->
                    <section class="location">
                        <i class="fas fa-map-marker-alt"></i><!-- Sử dụng biểu tượng FontAwesome cho địa chỉ -->
                        <input type="text" placeholder="Nhập địa chỉ của bạn"><!-- Ô nhập địa chỉ -->
                    </section>
                </section>

                <section class="menu-right"><!-- Phần menu bên phải -->
                    <div class="cart">
                        <a href=""><img src="images/icon/cart.svg" alt=""></a><!-- Biểu tượng giỏ hàng và liên kết đến trang giỏ hàng -->
                    </div>
                    <div class="login">
                        <a href="">Đăng nhập</a> <!-- Liên kết đến trang đăng nhập -->
                    </div>
                </section>
            </div>
        </header>
        <!-- END HEADR -->
        <main>
            <div class="container">
                <div id="ant-layout">
                    <section class="search-quan">
                        <i class="fas fa-search"></i> <!-- Biểu tượng tìm kiếm và ô nhập tìm kiếm -->
                        <input type="text" placeholder="Tìm món hoặc thức ăn">
                    </section>
                </div>
                <div class="bg-grey">

                </div>
                <!-- END LAYOUT  -->
                <section class="main">
                    <section class="oder-product"> <!-- Phần sản phẩm đặt hàng -->
                        <div class="title">
                            <section class="main-order">
                                <h1>Tên sp</h1>
                                <div class="box">
                                    <img src="https://www.highlandscoffee.com.vn/vnt_upload/product/03_2018/TRATHANHDAO.png" alt="">
                                    <div class="about">
                                        <p>Một trải nghiệm thú vị khác! Sự hài hòa giữa vị trà cao cấp, vị sả thanh mát và những miếng đào thơm ngon mọng nước sẽ mang đến cho bạn một thức uống tuyệt vời.</p>
                                        <div class="size">
                                            <p>Size:</p>
                                            <ul>
                                                <li><a href="">S</a></li>
                                                <li><a href="">M</a></li>
                                                <li><a href="">L</a></li>
                                            </ul>
                                        </div>
                                        <div class="number">
                                            <span class="number-buy">Số lượng</span>
                                            <input type="number">
                                        </div>
                                        <p class="price">Giá: <span>100.000 VNĐ</span></p>
                                        <a class="buy-now" href="">Mua ngay</a><!-- Liên kết đến trang đặt hàng -->

                                    </div>
                                </div>
                            </section>
                        </div>
                        <aside>
                            <h1>Gợi ý cho bạn</h1>
                            <div class="row">
                                <?php
                                $sql = 'select * from product limit 3';// Truy vấn cơ sở dữ liệu để lấy 3 sản phẩm
                                $productList = executeResult($sql);// Thực hiện truy vấn và lấy danh sách sản phẩm
                                $index = 1;
                                foreach ($productList as $item) {
                                    echo '
                                <div class="col">
                                    <a href="">
                                        <img src="' . $item['thumbnail'] . '" alt="">
                                        <div class="about">
                                            <div class="title">
                                                <p>' . $item['title'] . '</p>
                                                <span>Giá: ' . $item['price'] . ' VNĐ</span>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                                }
                                ?>
                            </div>
                        </aside>
                    </section>

                    <!-- end Món ngon gần bạn -->
                    <section class="comment">
                        <h1>Nhận xét</h1>
                        <div class="container">
                            <div class="post">
                                <textarea name="" id="" cols="50" rows="10"></textarea><!-- Ô nhập bình luận -->
                                <button>Xuất bản</button><!-- Nút xuất bản bình luận -->
                            </div>
                            
                        </div>
                    </section>

                    <!-- end comment -->
                    <section class="restaurants"> <!-- Phần thực đơn tại quán -->
                        <div class="title">
                            <h1>Thực đơn tại quán <span class="green">Nhóm 5 coffee</span></h1>
                        </div>
                        <div class="product-restaurants">
                            <div class="row">
                                <?php
                                $sql = 'select * from product';// Truy vấn cơ sở dữ liệu để lấy tất cả sản phẩm
                                $productList = executeResult($sql);// Thực hiện truy vấn và lấy danh sách sản phẩm
                                $index = 1;
                                foreach ($productList as $item) {
                                    echo '
                                <div class="col">
                                    <a href="">
                                        <img class="thumbnail" src="' . $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p>' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . $item['price'] . ' VNĐ</span>
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
                </section>
            </div>
        </main>
    </div>

</body>

</html>
