<?php
// Kết nối đến CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopbangiay";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}
// Kiểm tra xem người dùng đã nhấn nút "Cập nhật thông tin" hay chưa
if (isset($_POST["submit"])) {
    // Kiểm tra xem các trường tồn tại trong mảng $_POST hay không
    if (isset($_POST["sdt"]) && isset($_POST["tentk"])) {
        // Lấy dữ liệu từ form
        $sodt = $_POST['sdt'];
        $tentk = $_POST['tentk'];
        $matkhau_moi = $_POST['mkmoi'];

        // Tìm khóa trong bảng taikhoan
        $sql_taikhoan = "SELECT * FROM taikhoan WHERE Sodt = '$sodt' AND Tentaikhoan = '$tentk'";
        $result_taikhoan = $conn->query($sql_taikhoan);

        if ($result_taikhoan->num_rows > 0) {
            // Lấy giá trị mataikhoan từ bảng taikhoan
            $row_taikhoan = $result_taikhoan->fetch_assoc();
            $mataikhoan = $row_taikhoan['Mataikhoan'];

            // Cập nhật mật khẩu mới trong bảng taikhoan
            $sql_update = "UPDATE taikhoan SET Matkhau = '$matkhau_moi' WHERE Mataikhoan = '$mataikhoan'";
            if ($conn->query($sql_update) === TRUE) {
                echo "Cập nhật mật khẩu mới thành công";
            } else {
                echo "Lỗi khi cập nhật mật khẩu mới: " . $conn->error;
            }
        } else {
            echo "Số điện thoại hoặc Tên tài khoản không chính xác";
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a style="text-decoration: none;color: #111;" href="dangnhapc.php">Đăng nhập</a>
            <h2>CẬP NHẬT MẬT KHẨU</h2>
        </div>
        <form method="POST" action="">
            <div class="ttkh-sdt">
                <label for="fullname">Tên tài khoản:</label>
                <input type="text" name="tentk" placeholder="Nhập tên tài khoản" value="<?php echo isset($tentk) ? htmlspecialchars($tentk) : ''; ?>" required>
            </div>
            <div class="ttkh-sdt">
            <label for="fullname">Nhập số điện thoại của bạn:</label>
            <input type="number" name="sdt" placeholder="Nhập số điện thoại" value="<?php echo isset($sdt) ? htmlspecialchars($sdt) : ''; ?>" required>
            </div>
            <div class="ttkh-email">
                 <label for="Email">Mật khẩu mới</label>
                <input type="text" name="mkmoi" placeholder="Nhập mật khẩu mới" value="<?php echo isset($matkhau_moi) ? htmlspecialchars($matkhau_moi) : ''; ?>" required>   
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