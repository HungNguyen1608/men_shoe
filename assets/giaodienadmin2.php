<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chucnang/Admin/admin.css">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navigation {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        .navigation a {
            text-decoration: none;
            color: white;
            padding: 10px;
            margin: 0 5px;
            border: 1px solid #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .navigation a:hover {
            background-color: #555;
        }

        .content {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="navigation">
        <a href="?page_layout=qlsanpham">Quản lý sản phẩm</a>
        <a href="?page_layout=qlloaisp">Quản lý loại sản phẩm</a>
        <a href="?page_layout=quanlynhaphang">Quản lý nhập hàng</a>
        <a href="?page_layout=thongke">Thống kê bán hàng</a>
        <a href="?page_layout=thongtinkhachang">Thông tin khách hàng</a>
        <a href="?page_layout=qltaikhoan">Quản lý tài khoản</a>
    </div>
    <div class="content">
        <div class="phantren"></div>
        <div class="noidung">
            <div class="than">
                 <div>
                    <div>
                    <?php
                        if(isset($_GET['page_layout'])){
                            switch($_GET['page_layout']){
                                case 'qltaikhoan': include_once('chucnang/Admin/qltaikhoan.php'); break;
                                case 'qlsanpham': include_once('chucnang/Admin/qlsanpham.php'); break;
                                case 'qlloaisp': include_once('chucnang/Admin/qlloaisp.php'); break;
                                case 'quanlynhaphang': include_once('chucnang/Admin/qlnhaphang.php'); break;
                                case 'thongke': include_once('chucnang/Admin/thongkebanhang.php'); break;
                                case 'thongtinkhachang': include_once('chucnang/Admin/thongtinkhachhang.php'); break;
                                default:
                                    include_once('chucnang/Admin/qlsanpham.php');
                            }
                        } else {
                            include_once('chucnang/Admin/qlsanpham.php');
                        }
                    ?>
                    </div>
                 </div>
            </div>
            <div class="phanphu"></div>
        </div>
    </div>
</body>
</html>
