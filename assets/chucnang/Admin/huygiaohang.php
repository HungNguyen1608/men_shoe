<?php
// Kết nối đến cơ sở dữ liệu
include("connect.php");
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xử lý khi button xóa được nhấn
if (isset($_POST['delete'])) {
    $madon = $_POST['madon']; // Lấy mã đơn từ form

    // Thêm thông tin vào bảng "thongbao"
    $mataikhoan = $_POST['mataikhoan']; // Lấy mã tài khoản từ form
    $noidung = "Đơn hàng đã bị hủy";

    $sql_insert = "INSERT INTO thongbao (Mataikhoan, Madon, Noidung) VALUES ('$mataikhoan', '$madon', '$noidung')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Đã thêm thông tin vào bảng thongbao.";

        // Xóa thông tin trong bảng "dongiao"
        $sql_delete = "DELETE FROM dongiao WHERE Madon = '$madon'";

        if ($conn->query($sql_delete) === TRUE) {
            echo "Đã xóa thành công.";
        } else {
            echo "Lỗi xóa dữ liệu: " . $conn->error;
        }
    } else {
        echo "Lỗi thêm thông tin vào bảng thongbao: " . $conn->error;
    }
}

// Lấy thông tin từ bảng "dongiao"
$sql = "SELECT * FROM dongiao";
$result = $conn->query($sql);

?>

<!-- Form hiển thị thông tin -->
<form method="POST">
    <?php
    if ($result->num_rows > 0) {
        // Duyệt qua từng dòng dữ liệu và hiển thị
        while ($row = $result->fetch_assoc()) {
            echo "Madonnhan: " . $row["Madonnhan"]. " - Mataikhoan: " . $row["Mataikhoan"]. " - Makhach: " . $row["Makhach"]. " - Magiay: " . $row["Magiay"]. " - Soluong: " . $row["Soluong"]. " - Size: " . $row["Size"]. " - Tinhtrang: " . $row["Tinhtrang"]. " - Madon: " . $row["Madon"]. "<br>";

            // Hiển thị button xóa cho mỗi dòng
            echo "<input type='hidden' name='mataikhoan' value='" . $row["Mataikhoan"] . "'>";
            echo "<input type='hidden' name='madon' value='" . $row["Madon"] . "'>";
            echo "<input type='submit' name='delete' value='Xóa'><br><br>";
        }
    } else {
        echo "Không có dữ liệu trong bảng.";
    }
    ?>
</form>

<?php
// Đóng kết nối
$conn->close();
?>