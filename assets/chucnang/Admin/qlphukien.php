<style>

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            /* width: 960px; */
            max-width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .pagination a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
</style>
<form method="POST" action="">
    <input type="text" name="search" placeholder="Tên phụ kiện">
    <button type="submit">Tìm kiếm</button>
</form>

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
// Xử lý tìm kiếm
$mataikhoan = isset($_GET['mataikhoan']) ? $_GET['mataikhoan'] : '';
$search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$limit = 10; // Number of results per page
$offset = ($page - 1) * $limit;

$sqlCount = "SELECT COUNT(*) as total FROM phukien WHERE Tengiay LIKE '%$search%'";
$countResult = $conn->query($sqlCount);
$rowCount = $countResult->fetch_assoc();
$totalRows = $rowCount['total'];
$totalPages = ceil($totalRows / $limit);

$sql = "SELECT * FROM phukien WHERE Tengiay LIKE '%$search%' LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Kiểm tra và in ra thông tin
if ($result->num_rows > 0) {
    echo "<table id='bangphukien'>"; // Updated table id
    echo "<tr>";
    echo "<th>Mã phụ kiện</th>"; // Updated header
    echo "<th>Tên phụ kiện</th>"; // Updated header
    echo "<th>Số lượng</th>";
    echo "<th>Đơn giá</th>";
    echo "<th>Màu</th>";
    echo "<th>Hình</th>"; // Updated column
    echo "<th>Quản lý</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Magiay"] . "</td>"; // Updated column
        echo "<td>" . $row["Tengiay"] . "</td>"; // Updated column
        echo "<td>" . $row["Soluong"] . "</td>";
        echo "<td>" . $row["Dongia"] . "</td>";
        echo "<td>" . $row["Mau"] . "</td>";
        echo "<td>" . $row["hinh"] . "</td>"; // Updated column
        echo "<td>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='mataikhoan' value='" . $mataikhoan . "'>";
        echo "<input type='hidden' name='Magiay' value='" . $row['Magiay'] . "'>"; // Updated column
        echo "<button type='submit' name='delete'>Delete</button>";
        echo "</form>";
        echo " | ";
        echo "<a href='?page_layout=suattphukien&mataikhoan=" . $mataikhoan . "&Magiay=" . $row['Magiay'] . "'>Edit</a>"; // Updated column
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        // Thay đổi URL phân trang để giữ lại tham số tìm kiếm (search) và mataikhoan nếu có
        $url = "?page=$i";
        if (!empty($search)) {
            $url .= "&search=" . urlencode($search);
        }
        if (!empty($mataikhoan)) {
            $url .= "&mataikhoan=" . urlencode($mataikhoan);
        }
        echo "<a href='$url'>$i</a>";
    }
    echo "</div>";
} else {
    echo "Không tìm thấy kết quả.";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        // Kết nối đến cơ sở dữ liệu
        // ...
        
        // Lấy giá trị từ form
        $mataikhoan = $_POST['mataikhoan'];
        $magiay = $_POST['Magiay'];

        // Chuẩn bị câu truy vấn SQL
        $sql = "DELETE FROM phukien WHERE Magiay=?";

        // Chuẩn bị câu lệnh SQL và kiểm tra lỗi
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "Lỗi: " . $conn->error;
            exit();
        }

        // Gán giá trị vào câu lệnh SQL
        $stmt->bind_param("s", $magiay);

        // Thực thi câu lệnh SQL và kiểm tra lỗi
        if ($stmt->execute()) {
            echo "Xóa dữ liệu thành công";
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        // Đóng kết nối và giải phóng bộ nhớ
        $stmt->close();
        $conn->close();
    }
}
?>
