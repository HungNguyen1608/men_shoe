<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Trang Thông Báo Đơn Hàng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .rohangtieude {
            align-items: center;
            justify-content: space-between;
            display: flex;
            background-color: #111;
            color: white;
            padding: 10px;
        }

        .noidungcttb {
            padding: 20px;
        }

        /* Các phần tử thông báo */
        .phantren__thongbao-thaan {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
        }

        .phantren__thongbao-thaan:hover {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
        }

        .phantren__thongbao-thaan-link {
            text-decoration: none;
            color: #333;
        }

        /* Nội dung thông báo */
        .noidung__thongbao--nd {
            display: flex;
            align-items: center;
        }

        .anh__thongbao {
            max-width: 80px;
            margin-right: 15px;
            border-radius: 5px;
        }

        .noidung__thongbao--nd--ct--tenhanggiay {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .noidung__thongbao--nd--ct--noidung {
            margin-bottom: 5px;
        }

        /* Nút xoá thông báo */
        .btnxoatb {
            margin-top: 10px;
        }

        .btnxoatb input {
            padding: 8px 15px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btnxoatb input:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="rohangtieude">
        <div class="prd-only_quaylaict">
            <a href="giaodientk.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>"><i style="color: white;padding:10px;font-size: 3rem;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        <h1>Thông báo</h1>
        <h5>
            <?php
                include("connect.php");
                $mataikhoan = mysqli_real_escape_string($conn, $_GET['mataikhoan']);
                $sql = "SELECT Tentaikhoan FROM taikhoan WHERE Mataikhoan = '$mataikhoan'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "Xin chào: ".$row["Tentaikhoan"];
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
            ?>
        </h5>
    </div>
    <div class="noidungcttb">
        <?php
            include("connect.php");
            $mataikhoan = mysqli_real_escape_string($conn, $_GET['mataikhoan']);
            $sql = "SELECT DISTINCT thongbao.Noidung, dongiao.Madon, giay.hinh, giay.Tengiay, dongiao.Soluong, giay.Dongia, thongbao.Mathongbao, thongbao.Madon
            FROM thongbao
            LEFT JOIN dongiao ON thongbao.Madon = dongiao.Madon
            LEFT JOIN giay ON dongiao.Magiay = giay.Magiay
            WHERE thongbao.Mataikhoan = '$mataikhoan'
            ORDER BY Mathongbao DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                <form action="" method="POST">
                    <ul class="phantren__thongbao-thaan">
                        <a href="#" class="phantren__thongbao-thaan-link">
                            <div class="noidung__thongbao--nd">
                                <img src="<?php echo $row['hinh']; ?>" alt="" class="anh__thongbao">
                                <div class="noidung__thongbao--nd--ct">

                                    <h4 class="noidung__thongbao--nd--ct--tenhanggiay"><?php echo $row['Tengiay']; ?></h4>
                                    <p>Đơn hàng:<?php echo $row['Madon']; ?></p>
                                    <p class="noidung__thongbao--nd--ct--noidung">Số lượng:<?php echo $row['Soluong']; ?></p>
                                    <p class="noidung__thongbao--nd--ct--noidung">Tình trạng:<?php echo $row['Noidung']; ?></p>
                                    <p class="noidung__thongbao--nd--ct--noidung">Thành tiền: <?php echo number_format($row['Soluong'] * $row['Dongia']); ?> đ</p>
                                    <p>Chưa tính phí giao hàng</p>
                                </div>
                            </div>
                        </a>
                    </ul>
                    <div class="btnxoatb">
                        <input type="submit" name="xoathongbao" value="Xoá thông báo">
                        <input type="hidden" name="mataikhoan" value="<?php echo urlencode($mataikhoan); ?>">
                        <input type="hidden" name="mathongbao" value="<?php echo urlencode($row['Mathongbao']); ?>">
                    </div>
                </form>

        <?php
                }
            } else {
                echo "<p style='text-align: center; background-color: #fff; margin: 0; padding: 10px; color: #111;'>Không có thông báo nào</p>";
            }

            $conn->close();
        ?>
    </div>
    <?php
    // Đoạn code xóa thông báo
    include("connect.php");
    
    if(isset($_POST['xoathongbao'])){
        $mathongbao = $_POST['mathongbao'];
        $conn = mysqli_connect("localhost", "root", "", "shopbangiay");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sử dụng Prepared Statements để bảo vệ chống SQL Injection
        $sql = $conn->prepare("DELETE FROM thongbao WHERE Mathongbao = ?");
        $sql->bind_param("i", $mathongbao); // i là kiểu dữ liệu INTEGER

        if ($sql->execute() === TRUE) {
            echo "Xóa thông báo thành công";
        } else {
            echo "Lỗi khi xóa thông báo: " . $conn->error;
        }

        $sql->close();
        $conn->close();
    }
?>

    </body>
    </html>
    