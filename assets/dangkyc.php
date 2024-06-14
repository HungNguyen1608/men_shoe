<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cssmenu.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="modal"  style="justify-content: center;height: 100%;width: 100%; align-items: center;">
        <div class="modal__lammo">
            <?php
                // Kết nối đến cơ sở dữ liệu
                $conn = mysqli_connect("localhost", "root", "", "shopbangiay") or die("Kết nối SQL không thành công!");

                // Kiểm tra kết nối
                if (!$conn) {
                    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                }
                // Xử lý dữ liệu khi form được gửi đi
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $tentaikhoan = $_POST["tentaikhoan"];
                    $matkhau = $_POST["matkhau"];
                    $sdt = $_POST["sodt"];
                
                    // Kiểm tra độ dài của mật khẩu
                    if (strlen($matkhau) < 6) {
                        $tbmk = "Mật khẩu phải có ít nhất 6 ký tự";
                    } else {
                        // Query SQL để kiểm tra sự tồn tại của Tentaikhoan và Sodt trong bảng "taikhoan"
                        $checkExistQuery = "SELECT Tentaikhoan, Sodt FROM taikhoan WHERE Tentaikhoan = '$tentaikhoan' OR Sodt = '$sdt' LIMIT 1";
                        $checkExistResult = mysqli_query($conn, $checkExistQuery);
                
                        if (mysqli_num_rows($checkExistResult) > 0) {
                            $row = mysqli_fetch_assoc($checkExistResult);
                            if ($row['Tentaikhoan'] == $tentaikhoan) {
                                $tbtk = "Tên tài khoản đã tồn tại.";
                            }
                            if ($row['Sodt'] == $sdt) {
                                $tbphone = "Số điện thoại đã tồn tại.";
                            }
                        } else {
                            // Query SQL để thêm dữ liệu vào bảng "taikhoan"
                            $insertQuery = "INSERT INTO taikhoan (Tentaikhoan, Matkhau, Sodt) VALUES ('$tentaikhoan', '$matkhau', '$sdt')";
                
                            // Xử lý dữ liệu khi form được gửi đi
                            if (mysqli_query($conn, $insertQuery)) {
                                header("Location:dangnhapc.php");
                                exit;
                            } else {
                                echo "Lỗi: " . mysqli_error($conn);
                            }
                        }
                    }
                }
            

                // Đóng kết nối
                mysqli_close($conn);
            ?>
        </div>
        <!-- thân modal -->
        <div class="modal__body">
            <!-- Các phần HTML khác -->
            <!-- Form đăng ký -->
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="modal__noidung">
                    <div class="modal__noidung-tieude">
                                <h2 class="modal__noidung-tieude-chinh">Đăng Ký</h2>
                                <sapm class="modal__noidung-tieude-chuyen"><a href="dangnhapc.php" style="color:red;text-decoration: none;">Đăng nhập</a></sapm>
                    </div>
                    <div class="modal__noidung-nhap">
                        <input  minlength="9" maxlength="12" class="modal__noidung-text" type="number" name="sodt" placeholder="Số điện thoai" value = "<?php echo isset($sdt) ? htmlspecialchars($sdt) : ''; ?>">
                    </div>
                    <div class="thongbao">
                        <p style="color:red;"><?php echo isset($tbphone) ? htmlspecialchars($tbphone) : ''; ?></p>
                </div>
                    <div class="modal__noidung-nhap">
                        <input  minlength="5" maxlength="50" class="modal__noidung-text" type="text" name="tentaikhoan" placeholder="Tên tài khoản" value = "<?php echo isset($tentaikhoan) ? htmlspecialchars($tentaikhoan) : ''; ?>">
                    </div>
                    <div class="thongbao">
                        <p style="color:red;"><?php echo isset($tbtk) ? htmlspecialchars($tbtk) : ''; ?></p>
                </div>
                    <div class="modal__noidung-nhap">
                        <input  minlength="5" maxlength="50" class="modal__noidung-text" type="password" name="matkhau" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="thongbao">
                        <p style="color:red;"><?php echo isset($tbtm) ? htmlspecialchars($tbmk) : ''; ?></p>
                    </div>
                    <div class="modal__noidung-link">
                                <!-- <a href="" class="modal__noidung-link-help-qmk">Quên Mật Khẩu</a> -->
                                <!-- dùng spam làm gạch giữa -->
                                <!-- <samp class="gach"></samp> -->
                                <a href="" class="modal__noidung-link-help">Cần Trợ Giúp</a>         
                    </div>
                    <div class="modal__noidung-DN">
                        <button class="btn" type="reset"><a href="index.php?page_layout=sanpham" style="text-decoration: none;">TRỞ LẠI</a></button>
                        <button class="btn btn--chinh" type="submit">ĐĂNG KÍ</button>
                    </div>
                    <div class="modal__noidung-DN-lienket">
                            <a href="" class="btn btn--icon">
                                <i class="fa-brands fa-square-facebook"></i>
                                Kết nối với facebook
                            </a>
                            <a href="" class="btn btn--icon btn--icon--gg">
                                <i  class="fa-brands fa-google  icon--gg"></i>
                                Kết nối với Google
                            </a>
                    </div>
                </div>
            </form>
            <!-- Các phần HTML khác -->
        </div>
    </div>
    
</body>
</html>