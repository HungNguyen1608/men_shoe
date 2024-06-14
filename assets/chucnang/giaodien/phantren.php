<style>
    #hinhgiohang{
    width: 100%;
}
</style>
<header style=" background: url(img/anhnentren.jpg) center center no-repeat;background-size: 100%;" class="phantren">
                    <div class="hienthi_pt">
                        <nav class="phantren__navbar">
                            <ul class="phantren__navbar-list">
                                <li class="phantren__navbar-item  phantren__navbar-item--vaoch hienthianhqa">
                                <img class="phantren__logo-shopee" src="logo.png" alt="">
                                    <div class="phantren__anh">
                                        <img src="img/QAcode.png" alt="ảnh QA" class="phantren__anh-QA">
                                        <div class="phantren__anh--taiud">
                                            <a href="" class="phantren__anh--taiud--link">
                                                <img src="img/appstor.png" alt="" class="phantren__anh--ct">
                                            </a>
                                            <a href="" class="phantren__anh--taiud--link">
                                                <img src="img/ggplay.png" alt="" class="phantren__anh--ct">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="phantren__navbar-item"> 
                                    <samp class="phantren__navbar--nointer"></samp>
                                    <a href="https://www.facebook.com/profile.php?id=100015580000177&mibextid=ZbWKwL" class="phantren__navbar-icon-link">
                                        <img class="icon-face" src="img/facebook_5968764.png" alt="">
                                    </a>
                                    <a href="https://www.facebook.com/profile.php?id=100015580000177&mibextid=ZbWKwL" class="phantren__navbar-icon-link">
                                        <img class="icon-face" src="img/instagram_2111463.png" alt="">
                                    </a>
                                </li>
                            </ul>
                            <ul class="phantren__navbar-list">
                                <li class="phantren__navbar-item phantren__navbar-icon-tb">
                                    <a href="" class="phantren__navbar-item-link phantren__navbar-icon-link ">
                                        <img class="phantren__navbar-icon-link-icon" src="img/bell_10585388.png" alt="">THÔNG BÁO </a>
                                    <div class="phantren__navbar-item-thongbao">
                                        <header class="phantren__thongbao-tieude">
                                            <h3 class="h3">Tất cả thông báo</h3>
                                        </header>
                                        <div class="noidung__thongbao" style="text-align: center">
                                            <?php
                                                        include("connect.php"); // Kết nối đến cơ sở dữ liệu
                                                        
                                                        $mataikhoan = $_GET['mataikhoan']; // Lấy giá trị của mataikhoan từ URL
                                                        
                                                        // Câu truy vấn SQL
                                                        $sql = "SELECT DISTINCT thongbao.Noidung, dongiao.Madon, giay.hinh, giay.Tengiay, dongiao.Soluong, giay.Dongia, thongbao.Mathongbao, thongbao.Madon
                                                        FROM thongbao
                                                        LEFT JOIN dongiao ON thongbao.Madon = dongiao.Madon
                                                        LEFT JOIN giay ON dongiao.Magiay = giay.Magiay
                                                        WHERE thongbao.Mataikhoan = '$mataikhoan'
                                                        ORDER BY Mathongbao DESC";
                                                
                                                
                                                $result = $conn->query($sql); // Thực thi câu truy vấn
                                                
                                                if ($result->num_rows > 0) {
                                                    // Lặp qua từng dòng dữ liệu và in ra Noidung và hinh
                                                            while($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <ul class="phantren__thongbao-thaan" style=" height: auto; background-image: url(shop/img/banchuadangnhap.png);">
                                                                    <a href="thongbao.php?mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>" class="phantren__thongbao-thaan-link">
                                                               
                                                                        <div class="noidung__thongbao--nd">
                                                                            <img src="<?php echo $row['hinh']; ?>" alt="" class="anh__thongbao">
                                                                            <div class="noidung__thongbao--nd--ct">
                                                                                <h4 class="noidung__thongbao--nd--ct--tenhanggiay"><?php echo $row['Tengiay']; ?></h4>
        
                                                                                <p class="noidung__thongbao--nd--ct--noidung"><?php echo $row['Noidung']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </ul>
                                                    <?php
                                                            }
                                                        } else {
                                                            echo "<p style='text-align: center;background-color: #fff; margin: 0;padding: 10px;color: #111;' >Không có thông báo nào</p>";
                                                        }

                                                        $conn->close(); // Đóng kết nối đến cơ sở dữ liệu
                                            ?>
                                                    </div>
                                                    <header class="phantren__thongbao-phanduoi">
                                                        <a href="thongbao.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>" style="text-decoration: none; color: #111;" class="h3">Chi tiết</a>
                                                    </header>

                                    </div>
                                </li>
                                <li class="phantren__navbar-item"> 
                                    <a href="giaodientk.php?page_layout=lienhe&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>" class="phantren__navbar-item-link phantren__navbar-icon-link">
                                        <i class="phantren__navbar-icon fa-sharp fa-solid fa-circle-question"></i>
                                        TRỢ GIÚP
                                    </a>
                                </li>
                                <li class="phantren__navbar-item">
                                <a href="tkkhachhang.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>" class="phantren__navbar-item-link phantren__navbar-item-link--dkdn phantren__navbar-item--vaoch">
                                    <?php
                                        // Get the value of mataikhoan from the URL
                                        $mataikhoan = $_GET['mataikhoan'];
                                        $conn = mysqli_connect("localhost","root","","shopbangiay");

                                        // Check the connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        // Query the taikhoan table to retrieve Tentaikhoan
                                        $sql = "SELECT Tentaikhoan FROM taikhoan WHERE Mataikhoan = $mataikhoan";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output the Tentaikhoan value
                                            while($row = $result->fetch_assoc()) {
                                                echo "Xin chào ".$row["Tentaikhoan"];
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        $conn->close();
                                    ?>
                                </a>
                                </li>
                                <li class="phantren__navbar-item">
                                    <a href="index.php" class="phantren__navbar-item-link phantren__navbar-item-link--dkdn">ĐĂNG XUẤT</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="phantren__navbar2">
                            <div class="phantren__navbar_tkrh">
                                <div class="divhientk">
                                <form action="samphammoi2.php" method="POST">
                                    <button type="submit" class="btn-icon-tk">
                                        <img class="btn-icon-tk-icon" src="img/search_6788683.png" alt="icontimkiem">
                                    </button>
                                    <div class="phantren__timkiem">
                                        <div class="timkiem">
                                            <input type="text" name="search" class="timkiem" placeholder="Nhập nội dung tìm kiếm">
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                </div>
                                <div class="phantren__rohang">
                                    <img class="phantren__rohang-icon" src="img/shopping-cart_6996411.png" alt="">
                                    <div class="phantren__rohang-sanpham">
                                        <div class="phantren__rohang-anh">
                                            <div class="phantren__rohang-anh_tieude" style="font-size: 1.5rem;text-align: center;color:red;">
                                                <p>Giỏ hàng</p>
                                            </div>
                                            <div class="phantren__rohang-anh_sp" >
                                            <?php
                                                include("connect.php");
                                                $mataikhoan = $_GET['mataikhoan'];
                                                $sql = "SELECT rohang.*, taikhoan.Tentaikhoan, giay.hinh, giay.Tengiay, giay.Dongia, giay.Thongtin 
                                                        FROM rohang 
                                                        JOIN taikhoan ON rohang.Mataikhoan = taikhoan.Mataikhoan 
                                                        JOIN giay ON rohang.Magiay = giay.Magiay 
                                                        WHERE rohang.Mataikhoan = '$mataikhoan' 
                                                        ORDER BY Marohang DESC";
                                                $result = $conn->query($sql);

                                                $counter = 0; // Counter variable

                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        if ($counter >= 3) {
                                                            break; // Break out of the loop when 4 products have been displayed
                                                        }
                                            ?>
                                                    <div  class="thontinsp">
                                                        <div class="thongtin">
                                                            <div style="padding: 12px;align-items: center;width: 100%;display: flex;overflow: hidden;" class="thongtin-chitietsp">
                                                                <div style="height: auto;width: 60px;" class="thongtin hinh">
                                                                    <img style="width: 48px;height: 48px;object-fit: contain;" src="<?php echo $row["hinh"] ?>" alt="">
                                                                </div>
                                                                <div class="thongtin_thotctsp">
                                                                    <a href="#" style="text-decoration: none; color: #333;font-size: 1.2rem;">Tên sản phẩm: <?php echo $row["Tengiay"] ?></a>
                                                                    <p>Giá: <?php echo $row["Dongia"] ?></p>
                                                                    <p>Số lượng: <?php echo $row["Soluong"] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                            $counter++; // Increment the counter after each product is displayed
                                                        }
                                                    } else {
                                                        echo "<img id='hinhgiohang' src=\"img/kocosanp.png\" alt=\"\">";
                                                    }
                                                    ?>
                                                <div style="text-align: center">
                                                    <a style="text-decoration: none" href="hienthirohang.php?mataikhoan=<?php $mataikhoan = $_GET['mataikhoan']; echo $mataikhoan;?>"> hiện thị giỏ hàng </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
                            </div>

                        </div>
                        <div class="phantren__navbar3" style="margin-top: 35px;">
                            <nav class="navigation" >
                                <div class="container-fluid" >
                                    <div class="navigation__column center" style="text-align: center;height: 50px;width: 100%;">
                                            <ul class="main-menu menu" style="padding-right: 40px;align-items: center;margin-top: -21px;text-align: center;display: flex;width: 100%;height: 50px;justify-content: center;">
                                                <li class="menu-item menu-item-has-children dropdown"><a style="text-decoration: none;color: #fff; text-align: center" href="giaodientk.php?page_layout=sanpham&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Trang chủ</a></li>
                                                <li  class="menu-item menu-item-has-children has-mega-menu"><a style="text-decoration: none;color: #fff; text-align: center" href="giaodientk.php?page_layout=banchay&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Bán chạy</a></li>
                                                <li class="menu-item"><a style="text-decoration: none;color: #fff; text-align: center" href="giaodientk.php?page_layout=giam50&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">sale 50%</a></li>
                                                <li class="menu-item"><a style="text-decoration: none;color: #fff; text-align: center" href="giaodientk.php?page_layout=phukien&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">phụ kiện</a></li>
                                                <li   class="menu-item menu-item-has-children dropdown">
                                                <a style="text-decoration: none;color: #fff; text-align: center" href="giaodientk.php?page_layout=sanpham&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Sản phẩm</a>
                                                            <ul class="sub-menu">
                                                                <li class="menu-item menu-item-has-children dropdown"><a style="text-decoration: none;"  href="blog-grid.php">Giày thể thao</a>
                                                                        <ul  class="sub-menu">
                                                                            <li class="menu-item"><a style="text-decoration: none; color: #111;"  href="giaodientk.php?page_layout=adidas&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Adidas</a></li>
                                                                            <li class="menu-item"><a style="text-decoration: none; color: #111;"  href="giaodientk.php?page_layout=nike&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Nike</a></li>
                                                                            <li class="menu-item"><a style="text-decoration: none; color: #111;"  href="giaodientk.php?page_layout=gucci&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Gucci</a></li>
                                                                            <li class="menu-item"><a style="text-decoration: none; color: #111;"  href="giaodientk.php?page_layout=balance&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Balance</a></li>
                                                                            <li class="menu-item"><a style="text-decoration: none; color: #111;"  href="giaodientk.php?page_layout=converse&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">converse</a></li>
                                                                        </ul>
                                                                </li>
                                                                <li class="menu-item"><a style="text-decoration: none;" href="giaodientk.php?page_layout=giayda&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Giày da</a></li>
                                                                <li class="menu-item"><a style="text-decoration: none;" href="giaodientk.php?page_layout=phukien&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Phụ kiện</a></li>
                                                            </ul>    
                                                </li>
                                                <li class="menu-item menu-item-has-children dropdown"><a style="text-decoration: none;color: #fff; text-align: center" style="text-decoration: none;color: #fff;" href="giaodientk.php?page_layout=lienhe&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>">Liên hệ</a>
                                                </li>
                                            </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
    </header>