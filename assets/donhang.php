<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 10px;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .rohangtieude {
            display: flex;
            align-items: center;
            text-align: center;
            margin-bottom: 20px;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            justify-content: space-between;
        }

        .rohangtieude h1 {
            font-size: 24px;
            margin: 0;
        }

        .thontinsp {
            justify-content: space-between;
            margin: 20px 0;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 15px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            display: flex;

        }

        .thontinsp:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .thongtin_tensp h6 {
            background-color: #333;
            color: #fff;
            padding: 8px;
            margin: 0;
            text-align: center;
        }

        .thongtin {
            display: flex;
            align-items: center;
        }

        .thongtin .hinh img {
            max-width: 100px;
            max-height: 100px;
            margin: 0 15px;
            border-radius: 5px;
        }

        .thongtin-chitietsp {
            display: flex;
            flex-grow: 1;
            justify-content: space-between;
        }

        .thongtin-chitietsp p {
            margin: 8px 0;
        }

        .thongtin-chitietsp_btn {
            display: flex;
            align-items: center;
        }

        .thongtin-chitietsp_btn a, .thongtin-chitietsp_btn button {
            margin-right: 10px;
            padding: 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .thongtin-chitietsp_btn a:hover, .thongtin-chitietsp_btn button:hover {
            background-color: #555;
        }

        .thontinsp:empty::before {
            content: "Không có sản phẩm trong rỏ hàng.";
            color: #999;
            display: block;
            padding: 15px;
        }

        .hinh{
            width: 130px;
            height: 142px;
        }
        .rohang_thongtin_btn {
            display: inline-block;
            margin-right: 10px;
        }

        .rohang_thongtin_btn a {
            text-decoration: none;
            padding: 10px;
            background-color: #333;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .rohang_thongtin_btn a:hover {
            background-color: #555;
        }

</style>
    <title>Đơn hàng</title>
</head>
<body>
<div class="rohangtieude">
         <div class="prd-only_quaylaict" >
         <a href="giaodientk.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>"><i style="color: white;padding:10px;font-size: 3rem;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        <h1>CÁC ĐƠN HÀNG</h1>
        <h5>
            <?php
                $mataikhoan = $_GET['mataikhoan'];
                $conn = mysqli_connect("localhost","root","","shopbangiay");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT Tentaikhoan FROM taikhoan WHERE Mataikhoan = $mataikhoan";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "Xin chào: ".$row["Tentaikhoan"];
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
        </h5>
        
    </div>

    <div class="rohang_thongtin">
        <div class="rohang_thongtin_btn"><a href="donhang.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>&page_layout=danggiao">Đang giao</a></div>
        <div class="rohang_thongtin_btn"><a href="donhang.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>&page_layout=choxacnhan">Chờ xác nhận</a></div>
    </div>
    <form action="" method="post">
    <?php
                                if(isset($_GET['page_layout'])){
                                    switch($_GET['page_layout']){
                                        case 'choxacnhan':include_once('chucnang/rohang/choxacnhan.php');;break;
                                        case 'danggiao':include_once('chucnang/rohang/daxacnhan.php');;break;
                                        default:
                                            include_once('chucnang/rohang/choxacnhan.php');
                                    }
                                }else{
                                    include_once('chucnang/rohang/choxacnhan.php');
                                }
                            ?>

    </form>
    
</body>
</html>