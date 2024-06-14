<?php
// Kết nối đến CSDL
$conn = new mysqli('localhost', 'root', '', 'shopbangiay');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    // Kiểm tra xem các trường tồn tại trong mảng $_POST hay không
    if (isset($_POST["sdt"]) && isset($_POST["mkcu"]) && isset($_POST["mkmoi"])) {
        // Lấy dữ liệu từ form
        $sodt = $_POST['sdt'];
        $matkhau_cu = $_POST['mkcu'];
        $matkhau_moi = $_POST['mkmoi'];

        // Lấy giá trị mataikhoan từ URL
        $mataikhoan = $_GET['mataikhoan'];

        // Tìm khóa trong bảng khachhang
        $sql_taikhoan1 = "SELECT * FROM taikhoan WHERE Sodt = '$sodt'";
        $result_khachhang = $conn->query($sql_taikhoan1);

        // Tìm khóa trong bảng taikhoan
        $sql_taikhoan = "SELECT * FROM taikhoan WHERE Mataikhoan = '$mataikhoan'";
        $result_taikhoan = $conn->query($sql_taikhoan);

        // Kiểm tra xem dữ liệu có tồn tại trong cả hai bảng hay không
        if ($result_khachhang->num_rows > 0 && $result_taikhoan->num_rows > 0) {
            // Cập nhật mật khẩu mới trong bảng taikhoan
            $sql_update = "UPDATE taikhoan SET Matkhau = '$matkhau_moi' WHERE Mataikhoan = '$mataikhoan'";
            if ($conn->query($sql_update) === TRUE) {
                echo "Cập nhật mật khẩu mới thành công";
            } else {
                echo "Lỗi khi cập nhật mật khẩu mới: " . $conn->error;
            }
        } else {
            echo "Số điện thoại hoặc mật khẩu cũ không chính xác";
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin";
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Cập nhật mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            justify-content: space-between;
            align-items: center;
            display: flex;
            text-align: center;
            padding-bottom: 20px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 15px;
        }

        input {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
            border: none; /* remove border */
            padding: 12px; /* increase padding for better appearance */
        }

        input[type="submit"]:hover {
            background-color: #333; /* darken on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        <a style="text-decoration: none;color: #111;" href="tkkhachhang.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>">Quay lại</a>
            <h2>CẬP NHẬT MẬT KHẨU</h2>
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
        <form method="POST" action="">
            <div class="ttkh-sdt">
            <label for="fullname">Số điện thoại</label>
            <input type="text" name="sdt" placeholder="Nhập số điện thoại" value="<?php echo isset($sdt) ? htmlspecialchars($sdt) : ''; ?>" required>
            </div>
            <div class="ttkh-mkcu">
            <label for="fullname">Mật khẩu củ</label>
                <input type="text" name="mkcu" placeholder="Nhập mật khẩu hiện tại" value="<?php echo isset($diachi) ? htmlspecialchars($diachi) : ''; ?>" required>
            </div>
            <div class="ttkh-email">
                 <label for="Email">Mật khẩu mới</label>
                <input type="text" name="mkmoi" placeholder="Nhập mật khẩu mơi" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>   
            </div>
            <div style="text-align: center" class="ttkh-thongbao">
                <h5>
                <?php echo isset($tb) ? htmlspecialchars($tb) : ''; ?>
                </h5>
            </div>
            <input type="submit" name="submit" value="Cập nhật thông tin">
        </form>
    </div>
</body>
</html>