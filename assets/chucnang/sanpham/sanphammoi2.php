<div class="home-product">
            <div class="hienthi__ngang">
            <?php
              $mataikhoan = isset($_GET['mataikhoan']) ? $_GET['mataikhoan'] : '';
              $conn = mysqli_connect("localhost","root","","shopbangiay");
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              $rowsPerPage = 18;
              $startRow = ($page - 1) * $rowsPerPage;
              $totalRowsQuery = "SELECT COUNT(*) as total FROM giay";
              $totalRowsResult = mysqli_query($conn, $totalRowsQuery);
              $totalRows = mysqli_fetch_assoc($totalRowsResult)['total'];
              $totalPages = ceil($totalRows / $rowsPerPage);
              
              // Add search functionality
              $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
              $searchQuery = "SELECT * FROM giay WHERE Tengiay LIKE '%$searchTerm%'";
              $sql = $searchTerm ? $searchQuery : "SELECT * FROM giay";
              $sql .= " ORDER BY Magiay DESC LIMIT $startRow, $rowsPerPage";
              
              $query = mysqli_query($conn, $sql);
              
              while($row = mysqli_fetch_array($query)){
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
                                <span class="home-product-item__price-current"><?php if(isset($row['Dongia'])) echo $row['Dongia'] ?>đ</span>
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
            ?>
                <div class="clear"></div>
        </div>
        <div class="home-filter__page">
            <span class="home-filter__page-num">
                <?php
                if ($totalRows > 0) {
                    echo "$page / $totalPages";
                } else {
                    echo " $page / $totalPages";
                }
                ?>
            </span>
            <div class="home-filter__page-control">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo ($page - 1); ?>&mataikhoan=<?php echo $mataikhoan; ?><?php echo $searchTerm ? "&search=$searchTerm" : ''; ?>" class="home-filter__page-btn">
                        <i class="home-filter__page--icon fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                <?php else: ?>
                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                        <i class="home-filter__page--icon fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>

                <?php for ($i=1; $i<=$totalPages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>&mataikhoan=<?php echo $mataikhoan; ?><?php echo $searchTerm ? "&search=$searchTerm" : ''; ?>" class="home-filter__page-btn <?php if ($i==$page) echo 'active'; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?php echo ($page + 1); ?>&mataikhoan=<?php echo $mataikhoan; ?><?php echo $searchTerm ? "&search=$searchTerm" : ''; ?>" class="home-filter__page-btn">
                        <i class="home-filter__page--icon fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                <?php else: ?>
                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                        <i class="home-filter__page--icon fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <!-- <php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $searchTerm = $_POST['search'];
                    echo "Dữ liệu tìm kiếm: " . $searchTerm;
                }
            ?> -->
</div>