<?php
// Kết nối đến CSDL
$conn = mysqli_connect("localhost","root","","shopbangiay");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Mã tài khoản cần tìm
$mataikhoan = "your_mataikhoan";

// Câu truy vấn SQL
$sql = "SELECT * FROM rohang WHERE Mataikhoan = '$mataikhoan'";

$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    // In ra thông tin từng rỏ hàng
    while($row = $result->fetch_assoc()) {
        echo "<h3>Mã rỏ hàng: " . $row["MaRoHang"]. "</h3>";
        echo "<p>Mã tài khoản: " . $row["Mataikhoan"]. "</p>";
        echo "<p>Thông tin rỏ hàng: " . $row["ThongtinRoHang"]. "</p>";
        // Thêm các thông tin khác tương ứng với cấu trúc bảng rohang
        echo "<br>";
    }
} else {
    echo "<p>Không tìm thấy thông tin rỏ hàng với mã tài khoản này</p>";
}

// Đóng kết nối
$conn->close();
?>