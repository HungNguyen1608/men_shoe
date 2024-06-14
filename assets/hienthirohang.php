<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Rỏ Hàng</title>

<style>
       body {
            font-family: Arial, sans-serif;
            margin: 10px;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .rohangtieude {
            display: flex;
            align-items: center;
            text-align: center;
            margin-bottom: 20px;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            justify-content: space-between;
        }

        .rohangtieude h1 {
            font-size: 24px;
            margin: 0;
        }

        .thontinsp {
            justify-content: space-between;
            margin: 20px 0;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 15px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            display: flex;

        }

        .thontinsp:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .thongtin_tensp h3 {
            background-color: #333;
            color: #fff;
            padding: 8px;
            margin: 0;
            text-align: center;
        }

        .thongtin {
            display: flex;
            align-items: center;
        }

        .thongtin .hinh img {
            max-width: 100px;
            max-height: 100px;
            margin: 0 15px;
            border-radius: 5px;
        }

        .thongtin-chitietsp {
            display: flex;
            flex-grow: 1;
            justify-content: space-between;
        }

        .thongtin-chitietsp p {
            margin: 8px 0;
        }

        .thongtin-chitietsp_btn {
            display: flex;
            align-items: center;
        }

        .thongtin-chitietsp_btn a, .thongtin-chitietsp_btn button {
            margin-right: 10px;
            padding: 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .thongtin-chitietsp_btn a:hover, .thongtin-chitietsp_btn button:hover {
            background-color: #555;
        }

        .thontinsp:empty::before {
            content: "Không có sản phẩm trong rỏ hàng.";
            color: #999;
            display: block;
            padding: 15px;
        }

        .hinh{
            width: 130px;
            height: 142px;
        }
</style>

</head>
<body>
    <div class="rohangtieude">
         <div class="prd-only_quaylaict" >
         <a href="giaodientk.php?mataikhoan=<?php echo urlencode($_GET['mataikhoan']); ?>"><i style="color: white;padding:10px;font-size: 3rem;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        <h1>GIỎ HÀNG</h1>
        <h5>
            <?php
                $mataikhoan = $_GET['mataikhoan'];

                $conn = mysqli_connect("localhost","root","","shopbangiay");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT Tentaikhoan FROM taikhoan WHERE Mataikhoan = $mataikhoan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "Xin chào: ".$row["Tentaikhoan"];
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
            ?>
        </h5>
    </div>
    <?php
    // Kết nối đến cơ sở dữ liệu
    include("connect.php");

    // Kiểm tra yêu cầu được gửi từ phía máy khách
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kiểm tra xem yêu cầu có chứa tham số `maRoHang` không
        if (isset($_POST['maRoHang'])) {
            // Lấy giá trị `maRoHang` từ yêu cầu
            $maRoHang = $_POST['maRoHang'];
            // Chuẩn bị truy vấn DELETE
            $sql = "DELETE FROM rohang WHERE Marohang = '$maRoHang'";
            
            // Thực thi truy vấn
            if ($conn->query($sql) == TRUE) {
                echo "Xóa sản phẩm thành công.";
            } else {
                echo "Lỗi xóa sản phẩm: " . $conn->error;
            }
        } else {
            echo "Yêu cầu không hợp lệ.";
        }
    }

    // Lấy giá trị `mataikhoan` từ yêu cầu GET
    $mataikhoan = $_GET['mataikhoan'];

    // Chuẩn bị truy vấn SELECT
    $sql = "SELECT rohang.*, taikhoan.Tentaikhoan, giay.hinh, giay.Tengiay, giay.Dongia, giay.Thongtin FROM rohang JOIN taikhoan ON rohang.Mataikhoan = taikhoan.Mataikhoan JOIN giay ON rohang.Magiay = giay.Magiay WHERE rohang.Mataikhoan = '$mataikhoan'";
    $result = $conn->query($sql);

    // Kiểm tra kết quả truy vấn
    if ($result->num_rows > 0) {
        $stt = 0;
        while($row = $result->fetch_assoc()) {
?>
<div class="thontinsp">
    <div class="thongtin">
        <div class="thongtin_tensp">
            <h3><?php echo $stt+=1; ?></h3>
        </div>
        <div class="thongtin-chitietsp">
            <div class="thongtin hinh">
                <?php echo "<img src='" . $row["hinh"] . "'>"; ?>
            </div>
            <div class="thongtin_thotctsp">
                <a href="#"  style="text-decoration: none; color: #333;font-size: 1.2rem;">Tên sản phẩm: <?php echo $row["Tengiay"] ?></a>
                <p>Giá: <?php echo $row["Dongia"] ?></p>
                <p>Thông tin: <?php echo $row["Thongtin"] ?></p>
                <p>Size: <?php echo $row["Size"] ?></p>
                <p>Số lượng: <?php echo $row["Soluong"] ?></p>
            </div>
        </div>
    </div>
    <div class="thongtin-chitietsp_btn">
        <a href="giaodienmuahang.php?mataikhoan=<?php $mataikhoan = $_GET['mataikhoan']; echo $mataikhoan;?>&Magiay=<?php echo $row["Magiay"] ?>&Soluong=<?php echo $row["Soluong"] ?>&Size=<?php echo isset($row["Size"]) ? $row["Size"] : ''; ?>">Mua ngay</a>
        <form method="POST" action="">
            <input  type="hidden" name="maRoHang" value="<?php echo isset($row["Marohang"]) ? $row["Marohang"] : 0 ?>">
            <button name="xoa" class="btn">Xóa</button>
        </form>
    </div>
</div>
<?php
    }
} else {
    echo "<p style='text-align: center;'>Không có Sản phẩm trong rỏ hàng.</p>";
}
?>
<?php
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shopbangiay";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Truy vấn dữ liệu từ bảng phụ kiện
    $sql = "SELECT rohang.*, taikhoan.Tentaikhoan, phukien.hinh, phukien.Tengiay, phukien.Dongia FROM rohang JOIN taikhoan ON rohang.Mataikhoan = taikhoan.Mataikhoan JOIN phukien ON rohang.Magiay = phukien.Magiay WHERE rohang.Mataikhoan = '$mataikhoan'";
    $result = $conn->query($sql);
    $stt = 0;
    if ($result->num_rows > 0) {
        // Hiển thị thông tin sản phẩm
        while ($row = $result->fetch_assoc()) {
            echo "<div class='thontinsp'>";
            echo "<div class='thongtin'>";
            echo "<div class='thongtin_tensp'>";
            echo "<h3>" . ++$stt . "</h3>";
            echo "</div>";
            echo "<div class='thongtin-chitietsp'>";
            echo "<div class='thongtin hinh'>";
            echo "<img src='" . $row["hinh"] . "'>";
            echo "</div>";
            echo "<div class='thongtin_thotctsp'>";
            echo "<a href='#' style='text-decoration: none; color: #333;font-size: 1.2rem;'>Tên sản phẩm: " . $row["Tengiay"] . "</a>";
            echo "<p>Giá: " . $row["Dongia"] . "</p>";
            echo "<p>Số lượng: " . $row["Soluong"] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='thongtin-chitietsp_btn'>";
            echo "<a href='giaodienmuahang.php?mataikhoan=" . $_GET['mataikhoan'] . "&Magiay=" . $row["Magiay"] . "&Soluong=" . $row["Soluong"] . "'>Mua ngay</a>";
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='maRoHang' value='" . (isset($row["Marohang"]) ? $row["Marohang"] : 0) . "'>";
            echo "<button name='xoa' class='btn'>Xóa</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        // echo "Không có sản phẩm nào trong bảng phụ kiện.";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
?>
</body>
</html>
