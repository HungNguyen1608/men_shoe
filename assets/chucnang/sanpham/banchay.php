<div class="home-product">
    <div class="hienthi__ngang">
        <?php
            include 'connect.php';
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Xử lý tìm kiếm
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
            $sql = "SELECT * FROM giay WHERE daban > 50";
            if (!empty($searchTerm)) {
                $sql .= " AND Tengiay LIKE '%$searchTerm%'";
            }
            $result = $conn->query($sql);
            
            // Phân trang
            $totalRows = $result->num_rows;
            $rowsPerPage = 18;
            $totalPages = ceil($totalRows / $rowsPerPage);
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $startRow = ($page - 1) * $rowsPerPage;
            
            $sql .= " LIMIT $startRow, $rowsPerPage";
            $result = $conn->query($sql);
            
            // Hiển thị thông tin trong bảng
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
                <div class="hienthi__column_2-4">
                        <a class="home-product-item" href="giaodientk.php?page_layout=chitietsp2&mataikhoan=<?php echo $mataikhoan; ?>&Magiay=<?php echo $row['Magiay']; ?>">
                            <div class="home-product-item__img" style="background-image: url(<?php if(isset($row['hinh'])) echo $row['hinh'] ?>);"></div>
                                <h4 class="home-product-item__name"><?php echo $row['Tengiay'] ?></h4>
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
                                    <span class="home-product-item__price-current"><?php 
                                            if(isset($row['Dongia'])) {
                                            echo $row['Dongia'];
                                            }
                                            ?>đ</span>
                                </div>
                                <div class="home-product-item__action">
                                    <span class="home-product-item__like">
                                    <i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                    </span>
                                    <div class="home-product-item__rating">
                                        <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                        <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                        <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                        <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                        <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                    </div>
                                    <span class="home-product-item__sold">Đã bán <?php if(isset($row['daban'])) echo $row['daban'] ?></span>
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
                                    <span class="home-product-item__sale-off-percent"><?php if(isset($row['giamgia'])) echo $row['giamgia'] ?>%</span>
                                    <span class="home-product-item__sale-off-label">GIẢM</span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <span class="home-product-item__sale-off-percent"><?php if(isset($row['giamgia'])) echo $row['giamgia'] ?>%</span>
                                    <span class="home-product-item__sale-off-label">GIẢM</span>
                                </div>
                        </a>
                </div>
        <?php
                }
            } else {
                echo "Không có dữ liệu";
            }
            // Đóng kết nối đến cơ sở dữ liệu
            $conn->close();
        ?>
    </div>
    <div style="display: flex;align-items: center;">
        <span class="home-filter__page-num">
            <?php
                if ($totalRows > 0) {
                    echo "$page / $totalPages";
                } else {
                    echo " $page / $totalPages";
                }
            ?>
        </span>
        <ul style="display: flex;list-style-type: none;">
            <?php if ($page > 1): ?>
                <li>
                    <a href="?page_layout=banchay&page=<?php echo ($page - 1); ?><?php echo $searchTerm ? "&search=$searchTerm" : ''; ?>&mataikhoan=<?php echo $mataikhoan; ?>" class="home-filter__page-btn">
                        <i class="home-filter__page--icon fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                        <i class="home-filter__page--icon fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i=1; $i<=$totalPages; $i++): ?>
                <li>
                    <a href="?page_layout=banchay&page=<?php echo $i; ?><?php echo $searchTerm ? "&search=$searchTerm" : ''; ?>&mataikhoan=<?php echo $mataikhoan; ?>" class="home-filter__page-btn <?php if ($i==$page) echo 'active'; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li>
                    <a href="?page_layout=banchay&page=<?php echo ($page + 1); ?><?php echo $searchTerm ? "&search=$searchTerm" : ''; ?>&mataikhoan=<?php echo $mataikhoan; ?>" class="home-filter__page-btn">
                        <i class="home-filter__page--icon fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                        <i class="home-filter__page--icon fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
