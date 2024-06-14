<div class="home-product">
    <div class="hienthi__ngang">
        <?php
        $conn = mysqli_connect("localhost","root","","shopbangiay");
       
        $searchTerm = isset($_POST['search']) ? $_POST['search'] : 'converse';
        $sql = "SELECT * FROM giay WHERE Tengiay LIKE '%$searchTerm%'";

        $query = mysqli_query($conn, $sql);

        $totalRows = mysqli_num_rows($query);
        $rowsPerPage = 18;
        $totalPages = ceil($totalRows / $rowsPerPage);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $startRow = ($page - 1) * $rowsPerPage;

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
                    <a href="?page_layout=converse&page=<?php echo ($page - 1); ?><?php echo $searchTerm ? "&search=$searchTerm" : ''; ?>&mataikhoan=<?php echo $mataikhoan; ?>" class="home-filter__page-btn">
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
                    <a href="?page_layout=converse&page=<?php echo $i; ?><?php echo $searchTerm ? "&search=$searchTerm" : ''; ?>&mataikhoan=<?php echo $mataikhoan; ?>" class="home-filter__page-btn <?php if ($i==$page) echo 'active'; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li>
                    <a href="?page_layout=converse&page=<?php echo ($page + 1); ?><?php echo $searchTerm ? "&search=$searchTerm" : ''; ?>&mataikhoan=<?php echo $mataikhoan; ?>" class="home-filter__page-btn">
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