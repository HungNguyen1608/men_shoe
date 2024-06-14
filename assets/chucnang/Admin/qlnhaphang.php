<style>
        
        .formnhaphg {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-height: 500px;
            overflow-y: auto; /*Thêm thanh cuộn nếu form vượt quá chiều cao*/
        }

        label {
            display: block;
            margin-bottom: 8px;
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
    $tengiay = $_POST['tengiay'];
    $maloaigiay = $_POST['maloaigiay'];
    $soluong = $_POST['soluong'];
    $dongia = $_POST['dongia'];
    $mau = $_POST['mau'];
    $hanggiay = $_POST['hanggiay'];
    $thongtin = $_POST['thongtin'];
    $size = $_POST['size'];
    $ngaynhap = $_POST['ngaynhap'];
    $hinh = $_POST['hinh'];
    $giamgia = $_POST['giamgia'];
    $mancc = $_POST['mancc'];

    // Check if Magiay already exists in the giay table
    $check_sql = "SELECT Magiay FROM giay WHERE Magiay = ?";
    $check_stmt = $conn->prepare($check_sql);
    if (!$check_stmt) {
        echo "Lỗi: " . $conn->error;
        exit();
    }
    $check_stmt->bind_param("s", $magiay);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Magiay already exists, update the record
        $update_sql = "UPDATE giay SET Tengiay = ?, Maloaigiay = ?, Soluong = ?, Dongia = ?, Mau = ?, Hanggiay = ?, Thongtin = ?, Size = ?, Ngaynhap = ?, Hinh = ?, Giamgia = ?, Mancc = ? WHERE Magiay = ?";
        $update_stmt = $conn->prepare($update_sql);
        if (!$update_stmt) {
            echo "Lỗi: " . $conn->error;
            exit();
        }
        $update_stmt->bind_param("sssssssssssss", $tengiay, $maloaigiay, $soluong, $dongia, $mau, $hanggiay, $thongtin, $size, $ngaynhap, $hinh, $giamgia, $mancc, $magiay);
        if ($update_stmt->execute()) {
            echo "Cập nhật dữ liệu thành công";
            $ngaynhap =$_POST['ngaynhap'];
            $sql2 = "INSERT INTO thongtinnhap (Magiay, Soluong, Ngaynhap, Mancc) VALUES (?, ?, ?, ?)";
            $stmt2 = $conn->prepare($sql2);
            if (!$stmt2) {
                echo "Lỗi: " . $conn->error;
                exit();
            }
            $stmt2->bind_param("ssis", $magiay, $soluong, $ngaynhap, $mancc);
            if ($stmt2->execute()) {
                echo "Thêm thông tin nhập thành công";
            } else {
                echo "Lỗi: " . $stmt2->error;
            }
            $stmt2->close();
        } else {
            echo "Lỗi: " . $update_stmt->error;
        }
        $update_stmt->close();
    } else {
        // Magiay doesn't exist, insert new record
        $insert_sql = "INSERT INTO giay (Magiay, Tengiay, Maloaigiay, Soluong, Dongia, Mau, Hanggiay, Thongtin, Size, Ngaynhap, Hinh, Giamgia, Mancc)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        if (!$insert_stmt) {
            echo "Lỗi: " . $conn->error;
            exit();
        }
        $insert_stmt->bind_param("sssssssssssss", $magiay, $tengiay, $maloaigiay, $soluong, $dongia, $mau, $hanggiay, $thongtin, $size, $ngaynhap, $hinh, $giamgia, $mancc);
        if ($insert_stmt->execute()) {
            echo "Thêm dữ liệu thành công";
            $ngaynhap =$_POST['ngaynhap'];
            $sql2 = "INSERT INTO thongtinnhap (Magiay, Soluong, Ngaynhap, Mancc) VALUES (?, ?, ?, ?)";
            $stmt2 = $conn->prepare($sql2);
            if (!$stmt2) {
                echo "Lỗi: " . $conn->error;
                exit();
            }
            $stmt2->bind_param("ssis", $magiay, $soluong, $ngaynhap, $mancc);
            if ($stmt2->execute()) {
                echo "Thêm thông tin nhập thành công";
            } else {
                echo "Lỗi: " . $stmt2->error;
            }
            $stmt2->close();
        } else {
            echo "Lỗi: " . $insert_stmt->error;
        }
        $insert_stmt->close();
    }

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

// Đóng kết nối
$conn->close();
?>

<form class="formnhaphg" action="" method="post">
<h4 style="text-align: center;">NHẬP THÔNG TIN SẢN PHẨM</h4>
  <label for="magiay">Mã giày:</label>
  <input type="text" name="magiay" id="magiay" required>

  <label for="tengiay">Tên giày:</label>
  <input type="text" name="tengiay" id="tengiay" required>

  <label for="maloaigiay">Loại giày:</label>
  <select name="maloaigiay" id="maloaigiay">
    <?php
    if ($result_loaigiay->num_rows > 0) {
        while ($row = $result_loaigiay->fetch_assoc()) {
            echo "<option value='" . $row['Maloaigiay'] . "'>" . $row['Tenloai'] . "</option>";
        }
    }
    ?>
  </select>
  <label for="soluong">Số lượng:</label>
  <input type="text" name="soluong" id="soluong" required>

  <label for="dongia">Đơn giá:</label>
  <input type="text" name="dongia" id="dongia" required>

  <label for="mau">Màu:</label>
  <input type="text" name="mau" id="mau" required>

  <label for="hanggiay">Hãng giày:</label>
  <input type="text" name="hanggiay" id="hanggiay" required>

  <label for="thongtin">Thông tin:</label>
  <textarea name="thongtin" id="thongtin"></textarea>

  <label for="size">Size:</label>
  <input type="text" name="size" id="size" required>

  <label for="ngaynhap">Ngày nhập:</label>
  <input type="date" name="ngaynhap" id="ngaynhap" required>

  <label for="hinh">Hình:</label>
  <input type="text" name="hinh" id="hinh" required>

  <label for="giamgia">Giảm giá:</label>
  <input type="text" name="giamgia" id="giamgia" required>

  <label for="mancc">Nhà cung cấp:</label>
  <select name="mancc" id="mancc">
    <?php
    if ($result_ncc->num_rows > 0) {
        while ($row = $result_ncc->fetch_assoc()) {
            echo "<option value='" . $row['Mancc'] . "'>" . $row['Tenncc'] . "</option>";
        }
    }
    ?>
  </select>

  <input type="submit" value="Submit">
</form>
