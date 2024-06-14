    <link rel="stylesheet" href="plugins/revolution/css/navigation.css">
    <!-- 1 ấn ! enter để hiện đủ -->
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <!-- linh cài đặt cấu hình css trang wed -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- linh liên kết các thành phần rtong bài -->
    <link rel="stylesheet" href="css/cssmenu.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- linh phông chữ lấy từ trang  roboto gg font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,500&display=swap" rel="stylesheet"></head>
    <!-- linh font icon phần font assest fontawesome-free-6 -->
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
<div class="home-product">
    <div class="hienthi__ngang">
        <?php
               
               $sql = "SELECT * FROM giay ORDER BY Magiay";
                $query = mysqli_query($conn, $sql);
                $total_results = mysqli_num_rows($query);
                
                $limit = 18; // Số lượng sản phẩm hiển thị ban đầu
                $total_pages = ceil($total_results / $limit); // Tính tổng số trang
                
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                
                $offset = ($page - 1) * $limit; // Vị trí bắt đầu trong dữ liệu
                
                $sql .= " LIMIT $offset, $limit";
                
                $query = mysqli_query($conn, $sql);
        ?>              
            <?php
                while($rows=mysqli_fetch_array($query)){                          
            ?>

            <!-- từng sản phẩm -->
            <div class="hienthi__column_2-4">
                     <a class="home-product-item" href="index.php?page_layout=chitietsp&Magiay=<?php echo $row['Magiay'] ?>">
                            <div class="home-product-item__img" style="background-image: url(<?php echo $rows['hinh'] ?>);">
                            <img src="<?php echo $rows['hinh'] ?>" alt="">
                            </div>
                            <h4 class="home-product-item__name"><?php echo $rows['Tengiay'] ?></h4>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-old"><?php 
                                    if(isset($row['Dongia'])) {
                                        $dg = $row['Dongia'];
                                        $giamgia = $row['giamgia'];
                                        if (is_numeric($giamgia)) {
                                            echo $dg + ($dg * $giamgia / 100);
                                        } else {
                                            echo "Giá trị của biến giamgia không phải là số.";
                                        }
                                    }
                                    ?>đ</span>
                                <span class="home-product-item__price-current"><?php echo $rows['Dongia'] ?></span>
                            </div>
                            <div class="home-product-item__action">
                                <span class="home-product-item__like">
                                    <!-- <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i> -->
                                    <i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                </span>
                                <div class="home-product-item__rating">
                                    <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                    <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                    <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                    <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                    <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                </div>
                                <span class="home-product-item__sold">Đã bán <?php echo $rows['dangban'] ?></span>
                            </div>
                            <div class="home-product-item__origin">
                                <span class="home-product-item__brand">Brand</span>
                                <span class="home-product-item__origin-name">Việt Nam</span>
                            </div>
                            <div class="home-product-item__favourite">
                                <i class="fa-solid fa-check"></i>
                                <span>Yêu thích</span>
                            </div>
                            <div class="home-product-item__sale-off">
                                <span class="home-product-item__sale-off-percent"><?php echo $rows['giamgia'] ?></span>
                                <span class="home-product-item__sale-off-label">GIẢM</span>
                            </div>
                            <div class="home-product-item__sale-off">
                                <span class="home-product-item__sale-off-percent"><?php echo $rows['giamgia'] ?></span>
                                <span class="home-product-item__sale-off-label">GIẢM</span>
                            </div>
                    </a>
                </div>
           <?php
                }
            ?> 
        </div>
    </div> 
        <div class="home-filter__page">
                                        
            <div class="pagination"></div>
            <span class="home-filter__page-num">
                <?php
                    if ($total_results > 0) {
                        
                        echo "$page /$total_pages";
                    } else {
                        
                        echo " $page / $total_pages";

                    }
                    ?>
            </span>
            <div class="home-filter__page-control">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>" class="home-filter__page-btn">
                        <i class="home-filter__page--icon fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                <?php else: ?>
                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                        <i class="home-filter__page--icon fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>

                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?php echo $page + 1; ?>" class="home-filter__page-btn">
                        <i class="home-filter__page--icon fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                <?php else: ?>
                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                        <i class="home-filter__page--icon fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
</div>
