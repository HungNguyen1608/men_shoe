<?php
// Kết nối đến CSDL
$conn = new mysqli('localhost', 'root', '', 'shopbangiay');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    // Kiểm tra xem các trường tồn tại trong mảng $_POST hay không
    if (isset($_POST["tenmoi"]) && isset($_POST["mk"])) {
        // Lấy dữ liệu từ form
        $ten_moi = $_POST['tenmoi'];
        $mat_khau = $_POST['mk'];

        // Lấy giá trị mataikhoan từ URL
        $mataikhoan = $_GET['mataikhoan'];

        // Kiểm tra đúng mật khẩu cũ
        $sql_check = "SELECT * FROM taikhoan WHERE Mataikhoan = '$mataikhoan' AND Matkhau = '$mat_khau'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            // Cập nhật Tentaikhoan mới trong bảng taikhoan
            $sql_update = "UPDATE taikhoan SET Tentaikhoan = '$ten_moi' WHERE Mataikhoan = '$mataikhoan'";
            if ($conn->query($sql_update) === TRUE) {
                $tb= "Cập nhật thông tin thành công";
            } else {
                $tb= "Lỗi khi cập nhật thông tin: " . $conn->error;
            }
        } else {
            $tb= "Mật khẩu cũ không chính xác";
        }
    } else {
        $tb= "Vui lòng điền đầy đủ thông tin";
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
    <title>Cập nhật Tên</title>
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
            <h2>CẬP NHẬT TÊN TÀI KHOẢN</h2>
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
            <label for="fullname">Nhập tên mới</label>
            <input type="text" name="tenmoi" placeholder="Nhập tên" value="<?php echo isset($sdt) ? htmlspecialchars($sdt) : ''; ?>" required>
            </div>
            <div class="ttkh-mkcu">
            <label for="fullname">Nhập mật khẩu</label>
                <input type="text" name="mk" placeholder="Nhập mật khẩu " value="<?php echo isset($diachi) ? htmlspecialchars($diachi) : ''; ?>" required>
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