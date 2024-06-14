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
        if (isset($_POST['submit'])) {
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
            $soluong = $_POST['soluong'];
            $dongia = $_POST['dongia'];
            $mau = $_POST['mau'];
            $hinh = $_POST['hinh'];
            $ngaynhap = $_POST['ngaynhap'];
            $mancc = $_POST['mancc'];

            // Kiểm tra nếu Magiay đã tồn tại trong bảng phukien
            $check_sql = "SELECT Magiay FROM phukien WHERE Magiay = ?";
            $check_stmt = $conn->prepare($check_sql);
            if (!$check_stmt) {
                echo "Lỗi: " . $conn->error;
                exit();
            }
            $check_stmt->bind_param("s", $magiay);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            if ($check_result->num_rows > 0) {
                // Magiay đã tồn tại, cập nhật thông tin trong bảng phukien
                $update_sql = "UPDATE phukien SET Tengiay = ?, Soluong = ?, Dongia = ?, Mau = ?, hinh = ?, Ngaynhap = ?, Mancc = ? WHERE Magiay = ?";
                $update_stmt = $conn->prepare($update_sql);
                if (!$update_stmt) {
                    echo "Lỗi: " . $conn->error;
                    exit();
                }
                $update_stmt->bind_param("ssssssss", $tengiay, $soluong, $dongia, $mau, $hinh, $ngaynhap, $mancc, $magiay);
                if ($update_stmt->execute()) {
                    echo "Cập nhật thông tin thành công";
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
                // Magiay không tồn tại, thêm bản ghi mới
                $insert_sql = "INSERT INTO phukien (Magiay, Tengiay, Soluong, Dongia, Mau, hinh, Ngaynhap, Mancc) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $insert_stmt = $conn->prepare($insert_sql);
                if (!$insert_stmt) {
                    echo "Lỗi: " . $conn->error;
                    exit();
                }
                $insert_stmt->bind_param("ssssssss", $magiay, $tengiay, $soluong, $dongia, $mau, $hinh, $ngaynhap, $mancc);
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

            $check_stmt->close();
            
            $conn->close();
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

// Đóng kết nối
$conn->close();
?>
 
<form class="formnhaphg" action="" method="post">
    <h4 style="text-align: center;">NHẬP THÔNG TIN SẢN PHẨM</h4>
    <label for="magiay">Mã phụ kiện:</label>
    <input type="text" name="magiay" id="magiay" required>

    <label for="tengiay">Tên phụ kiện:</label>
    <input type="text" name="tengiay" id="tengiay" required>
    <label for="soluong">Số lượng:</label>
  <input type="text" name="soluong" id="soluong" required>

  <label for="dongia">Đơn giá:</label>
  <input type="text" name="dongia" id="dongia" required>

  <label for="mau">Màu:</label>
  <input type="text" name="mau" id="mau" required>

  <label for="ngaynhap">Ngày nhập:</label>
    <input type="date" name="ngaynhap" id="ngaynhap" required>

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


  <label for="hinh">Hình:</label>
  <input type="text" name="hinh" id="hinh" required>

    <input name="submit" type="submit" value="Submit">
</form>
