<?php
    include("ketnoi.php");
    if (isset($_POST["submit"])) {
        // Lấy dữ liệu từ form
        $mataikhoan = $_GET['mataikhoan'];
        $fullname = $_POST["fullname"];
        $sdt = $_POST["sdt"];
        $diachi = $_POST["diachi"];
        $email = $_POST["email"];

        // Thực hiện truy vấn SELECT để kiểm tra xem khóa tồn tại hay không
        $checkSql = "SELECT * FROM khachhang WHERE Mataikhoan = '{$mataikhoan}'";
        $checkResult = mysqli_query($conn, $checkSql);

        // Nếu khóa tồn tại, thực hiện truy vấn UPDATE để cập nhật thông tin khách hàng
        if ($checkResult->num_rows > 0) {
            $updateSql = "UPDATE khachhang SET Fullname = '{$fullname}', Sodt = '{$sdt}', Diachi = '{$diachi}', Email = '{$email}' WHERE Mataikhoan = '{$mataikhoan}'";
            if (mysqli_query($conn, $updateSql)) {
                $tb = "Cập nhật thông tin khách hàng thành công";
            } else {
                echo "Lỗi: " . $updateSql . "<br>" . mysqli_error($conn);
            }
        } else {
            // Nếu khóa không tồn tại, thực hiện truy vấn INSERT để thêm thông tin khách hàng mới
            $insertSql = "INSERT INTO khachhang (Mataikhoan, Fullname, Sodt, Diachi, Email) VALUES ('{$mataikhoan}', '{$fullname}', '{$sdt}', '{$diachi}', '{$email}')";
            if (mysqli_query($conn, $insertSql)) {
                $tb = "Thêm thông tin khách hàng mới thành công";
            } else {
                echo "Lỗi: " . $insertSql . "<br>" . mysqli_error($conn);
            }
        }
    }

    // Thực hiện truy vấn SELECT để lấy thông tin khách hàng cần sửa
    $selectSql = "SELECT * FROM khachhang WHERE Mataikhoan = '{$_GET['mataikhoan']}'";
    $result = mysqli_query($conn, $selectSql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Lấy giá trị từ cơ sở dữ liệu để điền vào các trường nhập liệu trong form
            $fullname = $row["Fullname"];
            $sdt = $row["Sodt"];
            $diachi = $row["Diachi"];
            $email = $row["Email"];
        }
    }

    // Đóng kết nối với cơ sở dữ liệu
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Cập nhật thông tin</title>
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
            <a href="tkkhachhang.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>"><i style="color: #111; padding:10px;font-size: 3rem;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <h2>CẬP NHẬT THÔNG TIN</h2>
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
            <div class="ttkh-hoten">
                <label for="fullname">Họ và tên</label>
                <input type="text" name="fullname" placeholder="Họ và tên" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>" required>
            </div>
            <div class="ttkh-sdt">
            <label for="fullname">Số điện thoại</label>
                <input type="text" name="sdt" placeholder="Số điện thoại" value="<?php echo isset($sdt) ? htmlspecialchars($sdt) : ''; ?>" required>
            </div>
            <div class="ttkh-diachi">
            <label for="fullname">Địa chỉ</label>
                <input type="text" name="diachi" placeholder="Địa chỉ" value="<?php echo isset($diachi) ? htmlspecialchars($diachi) : ''; ?>" required>
            </div>
            <div class="ttkh-email">
                 <label for="Email">Email</label>
                <input type="email" name="email" placeholder="Email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>   
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