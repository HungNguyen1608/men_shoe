<?php
// Kết nối đến cơ sở dữ liệu
include 'connect.php';
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Câu lệnh SQL SELECT
$sql = "SELECT Manhap, Magiay, Ngaynhap, Mancc, Soluong FROM thongtinnhap";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị thông tin từ bảng
    while ($row = $result->fetch_assoc()) {
        echo "Manhap: " . $row["Manhap"] . " - Magiay: " . $row["Magiay"] . " - Ngaynhap: " . $row["Ngaynhap"] . " - Mancc: " . $row["Mancc"] . " - Soluong: " . $row["Soluong"] . "<br>";
    }
} else {
    echo "<h5 style='text-align: center;'>Không có dữ liệu nhập hàng.</h5>";
}

// Đóng kết nối
$conn->close();
?>