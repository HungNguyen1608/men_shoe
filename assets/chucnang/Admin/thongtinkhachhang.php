<style>
    .customer-info {
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }

    .customer-info:hover {
        background-color: #e8e8e8;
    }

    .customer-info h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .customer-info p {
        margin: 5px 0;
    }

    .delete-button {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-button:hover {
        background-color: #c82333;
    }
</style>

<?php
// Tạo kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopbangiay";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Truy vấn dữ liệu từ bảng "khachhang"
$query = "SELECT * FROM khachhang";
$result = mysqli_query($conn, $query);

// Kiểm tra và hiển thị thông tin
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='customer-info'>";
        echo "Mã khách hàng: " . $row['Makhach'] . "<br>";
        echo "Mã tài khoản: " . $row['Mataikhoan'] . "<br>";
        echo "Tên tài khoản: " . $row['Fullname'] . "<br>";
        echo "Số tài khoản: " . $row['Sodt'] . "<br>";
        echo "Địa chỉ: " . $row['Diachi'] . "<br>";
        echo "Email: " . $row['Email'] . "<br>";
    
        // Thêm nút xóa
        echo "<form method='POST'>";
        echo "<input type='hidden' name='khachhang_id' value='" . $row['Makhach'] . "'>";
        echo "<input type='submit' name='delete' value='Xóa'>";
        echo "</form>";
        
        echo "</div>";
        echo "<br>";
    }
} else {
    echo "Không có dữ liệu trong bảng khachhang.";
}

// Xử lý xóa dữ liệu khi nút được nhấp
if (isset($_POST['delete'])) {
    $khachhang_id = $_POST['khachhang_id'];
    
    // Thực hiện câu lệnh SQL để xóa hàng có khóa chính tương ứng
    $delete_query = "DELETE FROM khachhang WHERE Makhach = $khachhang_id";
    mysqli_query($conn, $delete_query);
    
    // Hiển thị thông báo sau khi xóa thành công
    echo "Đã xóa thông tin khách hàng có Makhach: " . $khachhang_id;
}

// Đóng kết nối
mysqli_close($conn);
?>
