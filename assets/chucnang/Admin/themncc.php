<style>
        .fromthemncc {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
</style>
<?php
include 'connect.php';
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ biểu mẫu và thêm vào cơ sở dữ liệu khi người dùng nhấn nút "Thêm"
if (isset($_POST["submit"])) {
    $mancc = $_POST["mancc"];
    $tenncc = $_POST["tenncc"];
    $diachincc = $_POST["diachincc"];
    $sdtncc = $_POST["sdtncc"];

    $sql = "INSERT INTO ncc (Mancc, Tenncc, Diachincc, Sdtncc) VALUES ('$mancc', '$tenncc', '$diachincc', '$sdtncc')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm thông tin thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>
<div class="fromthemncc">
    <h2>Thêm thông tin NCC</h2>
    <form method="POST" action="">
        <label for="mancc">Mã NCC:</label>
        <input type="text" name="mancc" id="mancc" required><br><br>

        <label for="tenncc">Tên NCC:</label>
        <input type="text" name="tenncc" id="tenncc" required><br><br>

        <label for="diachincc">Địa chỉ NCC:</label>
        <input type="text" name="diachincc" id="diachincc" required><br><br>

        <label for="sdtncc">Số điện thoại NCC:</label>
        <input type="text" name="sdtncc" id="sdtncc" required><br><br>

        <input type="submit" name="submit" value="Thêm">
    </form>
</div>
