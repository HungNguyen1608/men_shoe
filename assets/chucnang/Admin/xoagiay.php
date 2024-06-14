<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin Giày</title>
    <style>
        /* Thêm CSS mới */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .formnhaphg {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-height: 500px;
            overflow-y: auto;
        }

        h4 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kết nối đến cơ sở dữ liệu
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shopbangiay";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lấy giá trị từ form
    $magiay = $_POST['magiay'];

    // Chuẩn bị câu truy vấn SQL
    $sql = "DELETE FROM giay WHERE Magiay=?";

    // Chuẩn bị câu lệnh SQL và kiểm tra lỗi
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Lỗi: " . $conn->error;
        exit();
    }

    // Gán giá trị vào câu lệnh SQL
    $stmt->bind_param("s", $magiay);

    // Thực thi câu lệnh SQL và kiểm tra lỗi
    if ($stmt->execute()) {
        echo "Xóa dữ liệu thành công";
        
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng kết nối và giải phóng bộ nhớ
    $stmt->close();
    $conn->close();
}
?>
<?php
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shopbangiay";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ bảng ncc
    $sql_ncc = "SELECT * FROM ncc";
    $result_ncc = $conn->query($sql_ncc);

    // Lấy dữ liệu từ bảng loaigiay
    $sql_loaigiay = "SELECT * FROM loaigiay";
    $result_loaigiay = $conn->query($sql_loaigiay);

    // Lấy dữ liệu giày cần sửa
    $magiay_to_edit = isset($_GET['Magiay']) ? $_GET['Magiay'] : '';
    $sql_edit = "SELECT * FROM giay WHERE Magiay = '$magiay_to_edit'";
    $result_edit = $conn->query($sql_edit);
    $row_edit = $result_edit->fetch_assoc();

    // Đóng kết nối
    $conn->close();
?>

<form class="formnhaphg" action="" method="post">
    <h4 style="text-align: center;">XÓA THÔNG TIN SẢN PHẨM</h4>
    <input type="hidden" name="magiay" value="<?php echo $row_edit['Magiay']; ?>">

    <label for="tengiay">Tên giày:</label>
    <input type="text" name="tengiay" id="tengiay" value="<?php echo $row_edit['Tengiay']; ?>">

    <label for="maloaigiay">Loại giày:</label>
    <select name="maloaigiay" id="maloaigiay">
        <?php
        if ($result_loaigiay->num_rows > 0) {
            while ($row = $result_loaigiay->fetch_assoc()) {
                $selected = ($row['Maloaigiay'] == $row_edit['Maloaigiay']) ? 'selected' : '';
                echo "<option value='" . $row['Maloaigiay'] . "' $selected>" . $row['Tenloai'] . "</option>";
            }
        }
        ?>
    </select>

    <label for="soluong">Số lượng:</label>
    <input type="text" name="soluong" id="soluong" value="<?php echo $row_edit['Soluong']; ?>">

    <label for="dongia">Đơn giá:</label>
    <input type="text" name="dongia" id="dongia" value="<?php echo $row_edit['Dongia']; ?>">

    <label for="mau">Màu:</label>
    <input type="text" name="mau" id="mau" value="<?php echo $row_edit['Mau']; ?>">

    <label for="hanggiay">Hãng giày:</label>
    <input type="text" name="hanggiay" id="hanggiay" value="<?php echo $row_edit['Hanggiay']; ?>">

    <label for="thongtin">Thông tin:</label>
    <textarea name="thongtin" id="thongtin"><?php echo $row_edit['Thongtin']; ?></textarea>

    <label for="size">Size:</label>
    <input type="text" name="size" id="size" value="<?php echo $row_edit['Size']; ?>">

    <label for="ngaynhap">Ngày nhập:</label>
    <input type="date" name="ngaynhap" id="ngaynhap" value="<?php echo $row_edit['Ngaynhap']; ?>">

    <label for="hinh">Hình:</label>
    <input type="text" name="hinh" id="hinh" value="<?php echo $row_edit['hinh']; ?>">

    <label for="giamgia">Giảm giá:</label>
    <input type="text" name="giamgia" id="giamgia" value="<?php echo $row_edit['giamgia']; ?>">

    <label for="mancc">Nhà cung cấp:</label>
    <select name="mancc" id="mancc">
        <?php
        if ($result_ncc->num_rows > 0) {
            while ($row = $result_ncc->fetch_assoc()) {
                $selected = ($row['Mancc'] == $row_edit['Mancc']) ? 'selected' : '';
                echo "<option value='" . $row['Mancc'] . "' $selected>" . $row['Tenncc'] . "</option>";
            }
        }
        ?>
    </select>

    <input type="submit" value="Xóa">
</form>

</body>
</html>
