<section class="recently">
                <div class="title">
                    <h1>Bánh mì</h1>
                </div>
                <div class="product-recently">
                    <div class="row">
                        <?php
                        // Truy vấn cơ sở dữ liệu để lấy danh sách sản phẩm trong danh mục có id_category=3
                        $sql = 'select * from product where id_category=3';
                        // $sql = 'select * from category';
                        $productList = executeResult($sql);// Thực thi truy vấn và lưu danh sách sản phẩm vào biến $productList
                        // $categoryList = executeResult($sql);
                        $index = 1;

                    // Lặp qua danh sách sản phẩm và hiển thị thông tin mỗi sản phẩm
                        foreach ($productList as $item) {
                            echo '
                                <div class="col">
                                    <a href="details.php?id=' . $item['id'] . '">
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