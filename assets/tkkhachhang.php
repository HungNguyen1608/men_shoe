<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>thông tin khách hàng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        .tieude{
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            margin-bottom: 20px;
            padding: 10px 20px;
           
        }

        .menu {
            background-color: #333;
            color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .menu_title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .content {
            flex: 1;
            margin-left: 20px;
        }

        .account_settings_header,
        .info_settings {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .section_title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .settings_features {
            display: flex;
            flex-direction: column;
        }

        .setting_feature a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        .setting_feature a:hover {
            background-color: #555;
        }

    </style>

</head>
<body>
    <div class="tieude">
        <div class="prd-only_quaylaict" >
            <a href="giaodientk.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>"><i style="color: #111;padding:10px;font-size: 3rem;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        <h1>THÔNG TIN TÀI KHOẢN</h1>
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
    <div class="container">
        <div class="menu">
            <div class="menu_title">Menu</div>
            <div class="menu_settings"></div>
        </div>
        <div class="content">
            <div class="account_settings">
                <div class="account_settings_header">
                    <p class="section_title">Cài đặt Tài khoản</p>
                    <div class="settings_features">
                        <div class="setting_feature"><a href="capnhapten.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>">Cập nhật Tên</a></div>
                        <div class="setting_feature"><a href="capnhapmk.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>">Cập nhật Mật khẩu</a></div>
                    </div>
                </div>
                <div class="info_settings">
                    <p class="section_title">Cài đặt Thông tin</p>
                    <div class="settings_features">
                        <div class="setting_feature"><a href="thongtinkhachhang.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>">Cập nhật Thông tin</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
