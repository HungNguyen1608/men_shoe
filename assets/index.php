<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="plugins/revolution/css/navigation.css">
    <!-- 1 ấn ! enter để hiện đủ -->
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <title>shop</title>
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
        
</head>
<body>
    <form action="" method="POST"> 
        <div style="" class="app">
            <!-- 1 phần đầu trang wed dùng thẻ <header class="phantren"></header> -->
            <header style="background: url(img/anhnentren.jpg) center center no-repeat;background-size: 100%;" class="phantren">
                <!-- .hiểnthì cài đặt phần base -->
                <div class="hienthi_pt">
                    

                    <!-- phần trên cùng của phần trên <nav class="phantren__navbar"> -->
                    <nav class="phantren__navbar">
                        <ul class="phantren__navbar-list">
                            <li class="phantren__navbar-item  phantren__navbar-item--vaoch hienthianhqa">
                            <img class="phantren__logo-shopee" src="logo.png" alt="">
                                <!-- ảnh hiện trong phần vào cữa hàng QA -->
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
                        <!-- phần Đăng nhâp đắng ký -->
                        <ul class="phantren__navbar-list">
                            <!-- Thông báo -->
                            <li class="phantren__navbar-item phantren__navbar-icon-tb">
                                <!-- link gắn với list -->
                                <a href="" class="phantren__navbar-item-link phantren__navbar-icon-link ">
                                    <!-- icon -->
                                    <img class="phantren__navbar-icon-link-icon" src="img/bell_10585388.png" alt="">
                                    THÔNG BÁO
                                </a>
                                 <div class="phantren__navbar-item-thongbao">
                                    <header class="phantren__thongbao-tieude">
                                        <h3 class="h3">Tất cả thông báo</h3>
                                    </header>
                                        <ul class="phantren__thongbao-thaan" style=" height: auto; background-image: url(shop/img/banchuadangnhap.png);">
                                            <a href="" class="phantren__thongbao-thaan-link">
                                                <div class="noidung__thongbao" style="height: 400px;">
                                                    <img src="img/banchuadangnhap.png" style=" width: 350px;" alt="">   
                                                </div>
                                            </a>
                                        </ul>
                                </div>
                                <!-- <div class="phantren__navbar-item-thongbao">
                                    <header class="phantren__thongbao-tieude">
                                        <h3 class="h3">Tất cả thông báo</h3>
                                    </header>
                                        <php
                                            include("ketnoi.php");
                                            $sql="select * from thongbao";
                                            $query=mysqli_query($conn,$sql);
                                        ?>
                                    <php
                                        $limit = 3; // Số lượng sản phẩm hiển thị ban đầu
                                        $offset = 0; // Vị trí bắt đầu trong dữ liệu
                                        while($rows=mysqli_fetch_array($query)){
                                    ?>
                                
                                        <ul class="phantren__thongbao-thaan">
                                            <a href="" class="phantren__thongbao-thaan-link">
                                                <img  src="img/khong-co-gi-dau-1.jpg" alt="ảnh QA" alt="" class="anh__thongbao">
                                                <div class="noidung__thongbao">
                                                    <h3 class="noidung__thongbao--ten"><php echo $rows['Ten_khach_hang'] ?></h3>
                                                    <p class="noidung__thongbao--nd"><php echo $rows['Email'] ?></p>
                                                </div>
                                            </a>
                                        </ul>
                                    <php
                                        $limit--;
                                        $offset++;
                                        }
                                    ?>
                                    <div id="hientatca" onclick="hientatca()">Hiện tất cả</div>
                                    <script>
                                        function hientatca() {
                                            var elements = document.querySelectorAll('.phantren__thongbao-thaan');
                                            for (var i = <php echo $offset; ?>; i < elements.length; i++) {
                                                elements[i].style.display = 'block';
                                            }
                                            document.getElementById('hientatca').style.display = 'none';
                                        }
                                    </script>
                                </div> -->

                                
                                
                            </li>
                            <li class="phantren__navbar-item"> 
                                <!-- link gắn với list -->
                                <a href="index.php?page_layout=lienhe" class="phantren__navbar-item-link phantren__navbar-icon-link">
                                <!-- icon hình -->
                                    <i class="phantren__navbar-icon fa-sharp fa-solid fa-circle-question"></i>
                                    TRỢ GIÚP
                                </a>
                            </li>
                            <li class="phantren__navbar-item"> 
                                <!-- link gắn với list -->
                                <a href="dangkyc.php" class="phantren__navbar-item-link phantren__navbar-item-link--dkdn phantren__navbar-item--vaoch">
                                    ĐĂNG KÝ 
                                </a>
                             </li>
                            <li class="phantren__navbar-item">
                                <!-- link gắn với list -->
                                <a href="dangnhapc.php" class="phantren__navbar-item-link phantren__navbar-item-link--dkdn">ĐĂNG NHẬP</a>
                             </li>
                        </ul>
                    </nav>
                    <!-- phần thứ 2 của phần trên -->
                        <!-- phần khung tìm kiếm -->
                    <div class="phantren__navbar2">
                        <div class="phantren__navbar_tkrh">
                        <div class="divhientk">
                            <a href="index.php?page_layout=timkiem">
                                <button class="btn-icon-tk" onclick="navigateToTimkiem()">
                                    <img class="btn-icon-tk-icon" src="img/search_6788683.png" alt="icontimkiem">
                                </button>
                            </a>
                            <div class="phantren__timkiem">
                                <div class="timkiem">
                                    <form action="chucnang/sanpham/timkiem.php" method="POST">
                                        <input type="text" name="search" class="timkiem" placeholder="Nhập nội dung tìm kiếm">
                                    </form>
                                    <div class="div_timkiem-lstk">
                                        <div class="div_timkiem-lstk-dv">
                                            <p class="div_timkiem-lstk-sp">Lịch sữ tìm kiếm</p>
                                        </div>
                                        <div class="div_timkiem-lstk-body">
                                            <ul class="div_timkiem-lstk-body-ul">
                                                <li class="div_timkiem-lstk-body-lis">
                                                    <a href="" class="linktimkiem">Không có gì để mặc</a>
                                                </li>
                                            </ul>
                                            <ul class="div_timkiem-lstk-body-ul">
                                                <li class="div_timkiem-lstk-body-lis">
                                                    <a href="" class="linktimkiem">Mua đồ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function navigateToTimkiem() {
                                window.location.href = 'index.php?page_layout=timkiem';
                            }
                        </script>
                            <div class="phantren__rohang">
                               <img class="phantren__rohang-icon" src="img/shopping-cart_6996411.png" alt="">
                                <div class="phantren__rohang-anh">
                                    <img class="rohang-anh" style="height: 100%;width: 100%;" src="img/kocosanp.png" alt="">
                                </div>
    
                            </div>
                        </div>

                    </div>
                    <div class="phantren__navbar3" style="margin-top: 35px;">
                        <nav class="navigation" >
                            <div class="container-fluid" >
                                <div class="navigation__column center" style="text-align: center;height: 50px;width: 100%;">
                                        <ul class="main-menu menu" style="padding-right: 40px;align-items: center;margin-top: -21px;text-align: center;display: flex;width: 100%;height: 50px;justify-content: center;">
                                            <li class="menu-item menu-item-has-children dropdown"><a style="color: #fff; text-align: center" href="index.php">Trang chủ</a></li>
                                            <li  class="menu-item menu-item-has-children has-mega-menu"><a style="color: #fff; text-align: center" href="index.php?page_layout=banchay">Bán chạy</a></li>
                                            <li class="menu-item"><a style="color: #fff; text-align: center" href="index.php?page_layout=giam50">sale 50%</a></li>
                                            <li class="menu-item"><a style="color: #fff; text-align: center" href="index.php?page_layout=phukien">phụ kiện</a></li>
                                            <li   class="menu-item menu-item-has-children dropdown">
                                                    <a style="color: #fff; text-align: center"href="index.php?page_layout=timkiem">Sản phẩm</a>
                                                       
                                                        <ul class="sub-menu">
                                                            <li  class="menu-item menu-item-has-children dropdown"><a style="text-decoration: none;" href="">Giày thể thao</a>
                                                                    <ul  class="sub-menu">
                                                                        <li  class="menu-item"><a style="text-decoration: none;"  href="index.php?page_layout=adidas">Adidas</a></li>
                                                                        <li  class="menu-item"><a style="text-decoration: none;"  href="index.php?page_layout=nike">Nike</a></li>
                                                                        <li  class="menu-item"><a style="text-decoration: none;"  href="index.php?page_layout=gucci">Gucci</a></li>
                                                                        <li  class="menu-item"><a style="text-decoration: none;" href="index.php?page_layout=balenciaga">Balenciaga</a></li>
                                                                        <li  class="menu-item"><a  style="text-decoration: none;" href="index.php?page_layout=converse">converse</a></li>
                                                                    </ul>
                                                            </li>
                                                            <li  class="menu-item"><a  style="text-decoration: none;" href="index.php?page_layout=giayda">Giày da</a></li>
                                                        </ul>
                                                    
                                            </li>
                                            <li class="menu-item menu-item-has-children dropdown"><a style="color: #fff;" href="index.php?page_layout=lienhe">Liên hệ</a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </nav>
                    
                    </div>
                    

                </div>

            </header>
            <!-- 2 phần nội dung trang wed <div class="noidung">  -->
           <div class="noidung">
                <div class="hienthi">
                    <div class="hienthi__ngang app__content">
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
                            <li class="hanggiayten"><img class="angmenup" src="img/nike-logo.png" alt=""><a style=" margin-left: 8px; text-decoration: none; color: black;" href="index.php?page_layout=nike">Nike</a></li>
                            <li class="hanggiayten"><img class="angmenup" src="img/adidas.png" alt=""><a style=" margin-left: 8px; text-decoration: none; color: black;" href="index.php?page_layout=adidas">Adidas</a></li>
                            <li class="hanggiayten"><img class="angmenup" src="img/Gucci_Logo.svg.png" alt=""><a style=" margin-left: 8px; text-decoration: none; color: black;" href="index.php?page_layout=gucci">Gucci</a></li>
                            <li class="hanggiayten"><img class="angmenup" src="img/Converse.png" alt=""><a style=" margin-left: 8px; text-decoration: none; color: black;" href="index.php?page_layout=converse">Converse</a></li>
                            <li class="hanggiayten"><img class="angmenup" src="img/Balenciaga.png" alt=""><a style=" margin-left: 8px; text-decoration: none; color: black;" href="index.php?page_layout=balenciaga">Balenciaga</a></li>
                        </ul>
                    </span>
                </li>
                <li class="categoru-item">
                    <span href="index.php?page_layout=phukien" class="categoru-item__link_2 pk categoru-item__link">Phụ kiện<div class="lopao2"></div>
                    <ul class="phukien_list">
                        <li class="phukienten"><a style=" margin-left: 8px; text-decoration: none; color: black;" href="index.php?page_layout=tat">Tất</a></li>
                        <li class="phukienten"><a style=" margin-left: 8px; text-decoration: none; color: black;" href="index.php?page_layout=day">Dây giày</a></li>
                    </ul>
                </span>
                </li>
                <li class="categoru-item">
                    <a href="" class="categoru-item__link_3 categoru-item__link">Mới nhất <div class="lopao3"></div></a>
                </li> 
            </div>
           
        </ul>
                            </nav>

                        </div>
                        <div class="hienthi__column_10">
                            <!-- phần trên -->
                                <div class="home-filter">
                                    <span class="home-filter__label">Sắp xếp theo</span>
                                    <button class="home-filter__btn btn">Phổ biến</button>
                                    <button class="home-filter__btn btn">Mới nhất</button>
                                    <div class="select-input">
                                        <span class="select-input__lable">Giá</span>
                                        <i class=" select-input__icon fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul class="select-input__list">
                                            <li class="select-input__item">
                                                <a href="index.php?page_layout=giamdan" class="select-input__link">Giảm dần</a>
                                            </li>
                                            <li class="select-input__item">
                                                <a href="index.php?page_layout=tangdan" class="select-input__link">Tăng dần</a>
                                            </li>
                                        </ul>
                                    
                                    </div>
                                
                                </div>
                            <!-- phần nội dung sản phẩm -->
                                <?php
                                    if(isset($_GET['page_layout'])){
                                        switch($_GET['page_layout']){
                                            case 'gioithieu':include_once('chucnang/menungang/gioithieu.php');break;
                                            case 'dangnhap':include_once('chucnang/taikhoan/dangnhap.php');;break;
                                            case 'dangky':include_once('chucnang/taikhoan/dangky.php');break;
                                            case 'chitietsp':include_once('chucnang/sanpham/chitietsp.php');break;
                                            case 'chitietpk':include_once('chucnang/sanpham/chitietpkindex.php');break;
                                            case 'chuyentrang':header('location:chucnang/sanpham/sanphammoi.php');break;
                                            case 'timkiem':include_once('chucnang/sanpham/timkiem.php');break;
                                            case 'nike':include_once('chucnang/sanpham/loaigiayindex.php/giaynike.php');break;
                                            case 'gucci':include_once('chucnang/sanpham/loaigiayindex.php/gucci.php');break;
                                            case 'giayluoi':include_once('chucnang/sanpham/loaigiayindex.php/giayluoi.php');break;
                                            case 'giayda':include_once('chucnang/sanpham/loaigiayindex.php/giayda.php');break;
                                            case 'adidas':include_once('chucnang/sanpham/loaigiayindex.php/giayadidas.php');break;
                                            case 'converse':include_once('chucnang/sanpham/loaigiayindex.php/converse.php');break;
                                            case 'balenciaga':include_once('chucnang/sanpham/loaigiayindex.php/balance.php');break;
                                            case 'phukien':include_once('chucnang/sanpham/loaigiayindex.php/phukien.php');break;
                                            case 'giam50':include_once('chucnang/sanpham/loaigiayindex.php/giamgia50.php');break;
                                            case 'tangdan':include_once('chucnang/sanpham/giatangdan.php');break;
                                            case 'giamdan':include_once('chucnang/sanpham/giagiamdan.php');break;
                                            case 'banchay':include_once('chucnang/sanpham/loaigiayindex.php/banchay.php');break;
                                            case 'lienhe':include_once('lienhe.php');break;
                                            case 'tat':include_once('chucnang/sanpham/loaigiayindex.php/tat.php');break;
                                            case 'day':include_once('chucnang/sanpham/loaigiayindex.php/day.php');break;

                                            default:
                                                 include_once('chucnang/sanpham/timkiem.php');
                                            
                                        }
                                    }else{
                                        include_once('chucnang/sanpham/timkiem.php');
                                    }
                                    ?>


                        </div>
                    </div>
                </div>
           </div>
              
            <!-- 3 phần phụ của trang wed dùng footer -->
            <footer class="phanphu">
                <div class="hienthi">
                    <div class="hienthi__ngang">
                        <div class="ps-home-contact__form">
                            <header>
                                <h3 style="font-size: 1.9rem;">Liên hệ</h3>
                                <p>Có góp ý hoặc khiếu nại vui lòng điền vào form. Xin cảm ơn.</p>
                            </header>
                            <footer class="ps-home-contact__form__nd">
                            <?php
                                // Kiểm tra nút "Gửi" đã được nhấn hay chưa
                                if (isset($_POST['send_email'])) {
                                    // Kết nối tới CSDL
                                    include('connect.php');

                                    // Lấy dữ liệu từ form
                                    $hoten = $_POST['name'];
                                    $email = $_POST['email'];
                                    $ykien = $_POST['content'];

                                    // Thực hiện câu lệnh INSERT INTO
                                    $sql = "INSERT INTO khieunai (Hoten, Email, Ykien) VALUES ('$hoten', '$email', '$ykien')";

                                    if ($conn->query($sql) === TRUE) {
                                        echo "<script>alert('Đã giửi ý kiến đóng góp!.');</script>";
                                    } else {
                                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                                    }

                                    // Đóng kết nối
                                    $conn->close();
                                }
                            ?>
                                <form style="width: 100%;" action="" method="post">
                                <div class="form-group">
                                    <label>Họ tên<span>*</span></label>
                                    <input name="name" class="form-control form-control-nho " type="text">
                                </div>
                                <div class="form-group">
                                    <label>Email<span>*</span></label>
                                    <input name="email" class="form-control form-control-nho" type="email">
                                </div>
                                <div class="form-group">
                                    <label>Góp ý(kiếu nại)của bạn!<span>*</span></label>
                                    <textarea name="content" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button name="send_email" class="ps-btn">Gửi</button>
                                </div>
                                </form>
                            </footer>
                        </div>
                        <div class="hienthi__column_1">
                            <div class="hienthi__column_1-1">
                                <h3 class="hienthi__column_1-1-tieude">Thông tin shop:</h3>
                                <div class="hienthi__column_1-1-noidung">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span  class="hienthi__column_1-1-noidung-nd">Số 234 Lĩnh Nam ,Hoàng Mai ,Hà Nội.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                    <i class="fa-solid fa-phone"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">0987657432</span>
                                </div>
                                <div class="hienthi__column_1-1-noidung">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span class="hienthi__column_1-1-noidung-nd">Số 181 Lê Lợi,Thành Đoan ,Hà Nội. </span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                    <i class="fa-solid fa-phone"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">0987456789</span>
                                </div>
                                <div class="hienthi__column_1-1-noidung">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span class="hienthi__column_1-1-noidung-nd">Số 213 Lê Lợi,Hà Nội.</span>
                                </div>
                                
                                <div class="hienthi__column_1-2-noidung">
                                    <i class="fa-solid fa-phone"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">0987634523</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa-solid fa fa-envelope" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">ledong@gmail.com</span>
                                </div>
                            </div>

                            <div class="hienthi__column_1-2">
                                <h3 class="hienthi__column_1-2-tieude">Liên hệ với shop</h3>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Hướng dẫn đặt hàng.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Đổi trả sản phẩm.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Điều khoản và điều kiện thanh toán.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Chính sách giao hàng và nhân hàng.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Giới thiệu shop.</span>
                                </div>
                            </div>
                            <div class="hienthi__column_1-3">
                                <div class="hienthi__column_1-3-noidung">
                                        <img class="anhshop" src="img/anhshop.jpg" alt="ảnh shop">
                                </div>
                                <div class="hienthi__column_1-3-noidung">
                                        <img class="anhshop" src="img/anhshop2.jpg" alt="ảnh shop">
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </footer>

        </div>

        
    </form>
</body>
</html>