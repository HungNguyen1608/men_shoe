<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopbangiay";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối tới cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xử lý sự kiện xóa
if (isset($_POST['delete'])) {
    $mataikhoan = $_POST['delete'];

    // Xóa dữ liệu từ bảng "taikhoan"
    $sql = "DELETE FROM taikhoan WHERE Mataikhoan = '$mataikhoan'";
    $result = $conn->query($sql);

    if ($result) {
        echo "Xóa tài khoản thành công.";
    } else {
        echo "Xóa tài khoản thất bại: " . $conn->error;
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $newName = $_POST['newName'];

    // Cập nhật dữ liệu trong bảng "taikhoan"
    $sql = "UPDATE taikhoan SET Tentaikhoan = '$newName' WHERE Mataikhoan = '$id'";
    $result = $conn->query($sql);

    if ($result) {
        echo "Cập nhật tên tài khoản thành công.";
    } else {
        echo "Cập nhật tên tài khoản thất bại: " . $conn->error;
    }
}
if (isset($_POST['add'])) {
    $newMataikhoan = $_POST['newMataikhoan'];
    $newTentaikhoan = $_POST['newTentaikhoan'];
    $newPhanquyen = $_POST['newPhanquyen'];
    $newMatkhau = $_POST['newMatkhau'];

    // Thêm dữ liệu vào bảng "taikhoan"
    $sql = "INSERT INTO taikhoan (Mataikhoan, Tentaikhoan, Phanquyen, Matkhau) VALUES ('$newMataikhoan', '$newTentaikhoan', '$newPhanquyen', '$newMatkhau')";
    $result = $conn->query($sql);

    if ($result) {
        echo "Thêm tài khoản thành công.";
    } else {
        echo "Thêm tài khoản thất bại: " . $conn->error;
    }
}

// Hiển thị form thêm dữ liệu
echo "<form method='post'>";
echo "<input type='text' name='newMataikhoan' placeholder='Mã tài khoản'>";
echo "<input type='text' name='newTentaikhoan' placeholder='Tên tài khoản'>";
echo "<input type='password' name='newMatkhau' placeholder='Mật khẩu'>";
echo "<input type='text' name='newPhanquyen' placeholder='Phân quyền'>";
echo "<button type='submit' name='add'>Thêm</button>";
echo "</form>";
// Truy vấn dữ liệu từ bảng "taikhoan"
$sql = "SELECT * FROM taikhoan";
$result = $conn->query($sql);

// Kiểm tra và in ra thông tin
if ($result->num_rows > 0) {
    echo "<table id='taikhoan'>";
    echo "<tr>";
    echo "<th>Mã tài khoản</th>";
    echo "<th>Tên tài khoản</th>";
    echo "<th>Phân quyền</th>";
    echo "<th>Xóa</th>";
    echo "</tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Mataikhoan"] . "</td>";
        echo "<td>" . $row["Tentaikhoan"] . "</td>";
        echo "<td>" . $row["Phanquyen"] . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<button type='submit' name='delete' value='" . $row["Mataikhoan"] . "'>Xóa</button>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='text' name='newName' placeholder='Tên mới'>";
        echo "<input type='hidden' name='id' value='" . $row["Mataikhoan"] . "'>";
        echo "<button type='submit' name='update'>Sửa</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "Không có dữ liệu.";
}

// Đóng kết nối
$conn->close();
?>