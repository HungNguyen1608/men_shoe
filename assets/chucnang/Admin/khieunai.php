<?php
include 'connect.php';

// Lấy dữ liệu từ bảng khieunai
$sql = "SELECT Makn, Hoten, Email, Ykien FROM khieunai";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Mã khieunai: " . $row["Makn"] . "</p>";
        echo "<p>Họ tên: " . $row["Hoten"] . "</p>";
        echo "<p>Email: " . $row["Email"] . "</p>";
        echo "<p>Ý kiến: " . $row["Ykien"] . "</p>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='Makn' value='" . $row["Makn"] . "'>";
        echo "<button type='submit' name='delete'>Xóa</button>";
        echo "</form>";
        echo "<hr>";
    }
} else {
    echo "Không có dữ liệu khieunai.";
}

if(isset($_POST['delete'])){
    $Makn = $_POST['Makn'];
    $deleteSql = "DELETE FROM khieunai WHERE Makn = '$Makn'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Đã xóa thành công.";
    } else {
        echo "Lỗi khi xóa dữ liệu: " . $conn->error;
    }
}

$conn->close();
?>