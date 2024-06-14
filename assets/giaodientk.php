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
            <?php
                include_once('chucnang/giaodien/phantren.php');
            ?>
           <div class="noidung">
                <div class="hienthi">
                    <div class="hienthi__ngang app__content">
                        <?php
                                include_once('chucnang/giaodien/menudanhmuc.php');
                        ?>
                       
                        <div class="hienthi__column_10">
                            <?php
                                include_once('chucnang/giaodien/phantrensanpham.php');
                            ?>
                           <?php
                                if(isset($_GET['page_layout'])){
                                    switch($_GET['page_layout']){
                                        case 'sanpham':include_once('chucnang/sanpham/sanphammoi2.php');;break;
                                        case 'dangnhap':include_once('chucnang/taikhoan/dangnhap.php');;break;
                                        case 'dangky':include_once('chucnang/taikhoan/dangky.php');break;
                                        case 'chitietsp2':include_once('chucnang/sanpham/chitiepsp2.php');break;
                                        case 'danhsachsp':include_once('chucnang/sanpham/danhsachsp.php');break;
                                        case 'nike':include_once('chucnang/sanpham/giaynike.php');break;
                                        case 'gucci':include_once('chucnang/sanpham/gucci.php');break;
                                        case 'giayluoi':include_once('chucnang/sanpham/giayluoi.php');break;
                                        case 'giayda':include_once('chucnang/sanpham/giayda.php');break;
                                        case 'adidas':include_once('chucnang/sanpham/giayadidas.php');break;
                                        case 'converse':include_once('chucnang/sanpham/converse.php');break;
                                        case 'balance':include_once('chucnang/sanpham/balance.php');break;
                                        case 'phukien':include_once('chucnang/sanpham/phukien.php');break;
                                        case 'muahang':include_once('giaodienmuahang.php');break;
                                        case 'chitietpk':include_once('chucnang/sanpham/chitietpk.php');break;
                                        case 'banchay':include_once('chucnang/sanpham/banchay.php');break;
                                        case 'giamdan':include_once('chucnang/sanpham/giagiamdan.php');break;
                                        case 'tangdan':include_once('chucnang/sanpham/giatangdan.php');break;
                                        case 'giam50':include_once('chucnang/sanpham/giamgia50.php');break;
                                        case 'tat':include_once('chucnang/sanpham/tat.php');break;
                                        case 'day':include_once('chucnang/sanpham/day.php');break;
                                        case 'lienhe':include_once('lienhe.php');break;
                                        default:
                                            include_once('chucnang/sanpham/sanphammoi2.php');
                                    }
                                }else{
                                    include_once('chucnang/sanpham/sanphammoi2.php');
                                }
                            ?>


                        </div>
                    </div>
                </div>
           </div>
           <?php
                include_once('chucnang/giaodien/phanphu.php');
            ?>


        </div>
    </form>

</body>
</html>