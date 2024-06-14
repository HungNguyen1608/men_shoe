<div class="hienthi__column_2">
    <nav class="category">
        <h3 class="category__tieude">
        <i class="category__tieude-icon fa-solid fa-list"></i>
        Danh mục</h3>
        <ul class="categoru-list">
            <div class="categoru-list-item">
                <li class="categoru-item categoru-item--active">
                    <span href="" class="categoru-item__link_1 hg  categoru-item__link">Hãng giày<div class="lopao"></div>
                    
                        <ul class="hanggiay_list">
                            <li class="hanggiayten"><img class="angmenup" src="img/nike-logo.png" alt=""> <a style="text-decoration: none; color: black; margin-left: 8px;"  href="giaodientk.php?page_layout=nike&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Nike</a></li>
                            <li class="hanggiayten"><img class="angmenup" src="img/adidas.png" alt=""><a style="text-decoration: none; color: black;margin-left: 8px;"  href="giaodientk.php?page_layout=adidas&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Adidas</a></li>
                            <li class="hanggiayten"><img class="angmenup" src="img/Gucci_Logo.svg.png" alt=""><a style="text-decoration: none;color: black;margin-left: 8px; "  href="giaodientk.php?page_layout=gucci&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Gucci</a></li>
                            <li class="hanggiayten"><img class="angmenup" src="img/Converse.png" alt=""><a style="text-decoration: none; color: black;margin-left: 8px;"  href="giaodientk.php?page_layout=converse&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">converse</a></li>
                            <li class="hanggiayten"><img class="angmenup" src="img/Balenciaga.png" alt=""> <a style="text-decoration: none; color: black;margin-left: 8px;"  href="giaodientk.php?page_layout=balance&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Balenciaga</a></li>
                        </ul>
                    </span>
                </li>
                <li class="categoru-item">
                    <span href="" class="categoru-item__link_2 pk categoru-item__link">Phụ kiện<div class="lopao2"></div>
                        <ul class="phukien_list">
                            <li class="phukienten"> <a style=" margin-left: 8px; text-decoration: none; color: black;" href="giaodientk.php?page_layout=tat&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Tất</a></li>
                            <li class="phukienten"><a style=" margin-left: 8px; text-decoration: none; color: black;" href="giaodientk.php?page_layout=day&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Dây giày</a></li>
                    
                        </ul>
                    </span>
                </li>
                <!-- <li class="categoru-item">
                    <a href="" class="categoru-item__link_3 categoru-item__link">Mới nhất <div class="lopao3"></div></a>
                </li>  -->
            </div>
            <div class="categoru-list-cn">
                <li class="categoru-item2">
                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                    <a href="hienthirohang.php?mataikhoan=<?php
                            // Lấy giá trị của mataikhoan từ URL
                            $mataikhoan = $_GET['mataikhoan'];
                            // In ra giá trị mataikhoan
                            echo $mataikhoan;
                        ?>" class="categoru-item__link_4 categoru-item__link">Giỏ hàng</a>
                </li>
                <li class="categoru-item2">
                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                    <a href="donhang.php?mataikhoan=<?php
                            // Lấy giá trị của mataikhoan từ URL
                            $mataikhoan = $_GET['mataikhoan'];
                            // In ra giá trị mataikhoan
                            echo $mataikhoan;
                        ?>" class="categoru-item__link_4 categoru-item__link">Các đơn hàng</a>
                </li>
                <li class="categoru-item2">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <a href="thongbao.php?mataikhoan=<?php
                            // Lấy giá trị của mataikhoan từ URL
                            $mataikhoan = $_GET['mataikhoan'];
                            // In ra giá trị mataikhoan
                            echo $mataikhoan;
                        ?>" class="categoru-item__link_5 categoru-item__link">Thông báo <div class="lopao5"></div></a>
                </li> 
                <li class="categoru-item2">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <a href="tkkhachhang.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>" class="categoru-item__link_6 categoru-item__link">Cài đặt tài khoản <div class="lopao6"></div></a>
                </li>                  
            </div>
        </ul>
    </nav>

</div>