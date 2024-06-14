<?php
include 'connect.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối tới cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xử lý thao tác sửa và xóa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["edit"])) {
        // Xử lý thao tác sửa
        $mancc = $_POST["mancc"];
        $tenncc = $_POST["tenncc"];
        $diachincc = $_POST["diachincc"];
        $sdtncc = $_POST["sdtncc"];

        // Cập nhật thông tin trong cơ sở dữ liệu
        $sql = "UPDATE ncc SET Tenncc='$tenncc', Diachincc='$diachincc', Sdtncc='$sdtncc' WHERE Mancc='$mancc'";

        if ($conn->query($sql) === TRUE) {
            echo "Cập nhật thông tin thành công.";
        } else {
            echo "Có lỗi xảy ra: " . $conn->error;
        }
    } elseif (isset($_POST["delete"])) {
        // Xử lý thao tác xóa
        $mancc = $_POST["mancc"];

        // Xóa thông tin trong cơ sở dữ liệu
        $sql = "DELETE FROM ncc WHERE Mancc='$mancc'";

        if ($conn->query($sql) === TRUE) {
            echo "Xóa thông tin thành công.";
        } else {
            echo "Có lỗi xảy ra: " . $conn->error;
        }
    }
}

// Truy vấn dữ liệu từ bảng NCC
$sql = "SELECT Mancc, Tenncc, Diachincc, Sdtncc FROM ncc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị dữ liệu
   
    while ($row = $result->fetch_assoc()) {
        ?>
        <div>
            <form method="post">
                <input type="hidden" name="mancc" value="<?php echo $row["Mancc"]; ?>">
                <input type="text" name="tenncc" value="<?php echo $row["Tenncc"]; ?>">
                <input type="text" name="diachincc" value="<?php echo $row["Diachincc"]; ?>">
                <input type="text" name="sdtncc" value="<?php echo $row["Sdtncc"]; ?>">
                <input type="submit" name="edit" value="Sửa">
                <input type="submit" name="delete" value="Xóa">
            </form>

        </div>
        <?php
    }

} else {
    echo "<p style='color: red;text-align: center;'>Không có dữ liệu nha cung cấp.</p>";
}

$conn->close();
?>

<script>
    function confirmDelete(url) {
        if (confirm("Bạn có chắc chắn muốn xóa không?")) {
            window.location.href = url;
        }
    }
</script>
