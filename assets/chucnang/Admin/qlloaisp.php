<style>

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
        .themloaigiay {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopbangiay";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

if (isset($_POST['add'])) {
    $maloaigiay = $_POST['maloaigiay'];
    $new_category = $_POST['new_category'];
    
    $add_query = "INSERT INTO loaigiay (Maloaigiay, Tenloai) VALUES ('$maloaigiay', '$new_category')";
    mysqli_query($conn, $add_query);
    
    echo "Đã thêm loại giày mới: " . $new_category . " có Maloaigiay: " . $maloaigiay;
}

if (isset($_POST['delete'])) {
    $loaigiay_id = $_POST['loaigiay_id'];
    
    // Sử dụng prepared statement để bảo vệ giá trị chuỗi
    $delete_query = "DELETE FROM loaigiay WHERE Maloaigiay = ?";
    $stmt = $conn->prepare($delete_query);
    
    if ($stmt) {
        $stmt->bind_param("s", $loaigiay_id);
        $stmt->execute();
        
        echo "Đã xóa loại giày có Maloaigiay: " . $loaigiay_id;
    } else {
        echo "Lỗi trong quá trình xóa: " . $conn->error;
    }
}

if (isset($_POST['edit'])) {
    $loaigiay_id = $_POST['loaigiay_id'];
    $new_category = $_POST['new_category'];
    
    // Sử dụng prepared statement để bảo vệ giá trị chuỗi
    $update_query = "UPDATE loaigiay SET Tenloai = ? WHERE Maloaigiay = ?";
    $stmt = $conn->prepare($update_query);
    
    if ($stmt) {
        $stmt->bind_param("ss", $new_category, $loaigiay_id);
        $stmt->execute();
        
        echo "Đã cập nhật thông tin loại giày có Maloaigiay: " . $loaigiay_id;
    } else {
        echo "Lỗi trong quá trình cập nhật: " . $conn->error;
    }
}


$query = "SELECT * FROM loaigiay";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Maloaigiay</th><th>Tenloai</th><th>Thao tác</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Maloaigiay'] . "</td>";
        echo "<td>" . $row['Tenloai'] . "</td>";
        
        echo "<td>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='loaigiay_id' value='" . $row['Maloaigiay'] . "'>";
        echo "<input type='submit' name='delete' value='Xóa'>";
        echo "</form>";
        
        echo "<form method='POST'>";
        echo "<input type='hidden' name='loaigiay_id' value='" . $row['Maloaigiay'] . "'>";
        echo "<input type='text' name='new_category' value='" . $row['Tenloai'] . "'>";
        echo "<input type='submit' name='edit' value='Sửa'>";
        echo "</form>";
        echo "</td>";
        
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có dữ liệu trong bảng loaigiay.";
}

mysqli_close($conn);
?>

<form class="themloaigiay" method="POST">
    <label for="maloaigiay">Mã loại giày:</label>
    <input type="text" name="maloaigiay" required>
    
    <label for="new_category">Loại giày mới:</label>
    <input type="text" name="new_category" required>
    
    <input type="submit" name="add" value="Thêm">
</form>
    
  
