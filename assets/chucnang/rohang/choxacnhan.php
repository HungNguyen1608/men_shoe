<?php
       include 'connect.php';
       $maTaiKhoan = $_GET['mataikhoan'];
       $sql = "SELECT muahang.Madon, muahang.Soluong, muahang.Size, muahang.yeucau, muahang.ptthanhtoan, giay.Tengiay, giay.hinh, giay.Dongia, khachhang.Fullname, khachhang.Sodt, khachhang.Diachi
               FROM muahang
               INNER JOIN giay ON muahang.Magiay = giay.Magiay
               INNER JOIN khachhang ON muahang.MaTaiKhoan = khachhang.MaTaiKhoan
               WHERE muahang.MaTaiKhoan = '$maTaiKhoan'";    
       $result = $conn->query($sql);
       
       if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
               ?>
               <div class="thontinsp">
                   <div class="thongtin">
                       <div class="thongtin_tensp">
                           <h6>Mã đơn hàng: <?php echo $row["Madon"]; ?></h6>
                       </div>
                       <div class="thongtin-chitietsp">
                           <div class="thongtin hinh">
                               <?php echo "<img src='" . $row["hinh"] . "'>"; ?>
                           </div>
                           <div class="thongtin_thotctsp">
                               <a href="#" style="text-decoration: none; color: #333;font-size: 1.2rem;">Tên sản phẩm: <?php echo $row["Tengiay"] ?></a>
                               <p>Giá: <?php echo $row["Dongia"] ?></p>
                               <p>Thông tin: <?php echo $row["yeucau"] ?></p>
                               <p>Size: <?php echo $row["Size"] ?></p>
                               <p>Số lượng: <?php echo $row["Soluong"] ?></p>
                               <p>Phương thức thanh toán: <?php echo $row["ptthanhtoan"] ?></p>
                               <p>Fullname: <?php echo $row["Fullname"] ?></p>
                               <p>Sodt: <?php echo $row["Sodt"] ?></p>
                               <p>Diachi: <?php echo $row["Diachi"] ?></p>
                           </div>
                       </div>
                   </div>
                   <div class="thongtin-chitietsp_btn">
                       <form method="POST" action="">
                           <input type="hidden" name="maRoHang" value="<?php echo isset($row["Madon"]) ? $row["Madon"] : 0 ?>">
                           <button name="xoa" class="btn">Hủy đơn</button>
                       </form>
                   </div>
               </div>
       <?php
           }
       } else {
           echo "<p style='text-align: center;'>Bạn không có đơn hàng giày nào.</p>";
       }
       
       $conn->close();
?>
<?php
include 'connect.php';
if(isset($_POST['xoa'])) {
    $maRoHang = $_POST['maRoHang'];
    
    // Thực hiện câu truy vấn xóa dữ liệu trong bảng mua hàng
    $sql = "DELETE FROM muahang WHERE Madon = '$maRoHang'";
    // Thực hiện truy vấn
    $result = $conn->query($sql);
    
    if ($result) {
        echo "<script>alert('Đã xóa đơn hàng thành công.');</script>";
    } else {
        echo "Xóa thông tin thất bại";
    }
}
?>
<?php
       include 'connect.php';
       $maTaiKhoan = $_GET['mataikhoan'];
       $sql = "SELECT muahang.Madon, muahang.Soluong, muahang.yeucau, muahang.ptthanhtoan, phukien.Tengiay, phukien.hinh, phukien.Dongia, khachhang.Fullname, khachhang.Sodt, khachhang.Diachi
               FROM muahang
               INNER JOIN phukien ON muahang.Magiay = phukien.Magiay
               INNER JOIN khachhang ON muahang.MaTaiKhoan = khachhang.MaTaiKhoan
               WHERE muahang.MaTaiKhoan = '$maTaiKhoan'";    
       $result = $conn->query($sql);
       
       if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
               ?>
               <div class="thontinsp">
                   <div class="thongtin">
                       <div class="thongtin_tensp">
                           <h6>Mã đơn hàng: <?php echo $row["Madon"]; ?></h6>
                       </div>
                       <div class="thongtin-chitietsp">
                           <div class="thongtin hinh">
                               <?php echo "<img src='" . $row["hinh"] . "'>"; ?>
                           </div>
                           <div class="thongtin_thotctsp">
                               <a href="#" style="text-decoration: none; color: #333;font-size: 1.2rem;">Tên sản phẩm: <?php echo $row["Tengiay"] ?></a>
                               <p>Giá: <?php echo $row["Dongia"] ?></p>
                               <p>Thông tin: <?php echo $row["yeucau"] ?></p>
                               <p>Số lượng: <?php echo $row["Soluong"] ?></p>
                               <p>Phương thức thanh toán: <?php echo $row["ptthanhtoan"] ?></p>
                               <p>Fullname: <?php echo $row["Fullname"] ?></p>
                               <p>Sodt: <?php echo $row["Sodt"] ?></p>
                               <p>Diachi: <?php echo $row["Diachi"] ?></p>
                           </div>
                       </div>
                   </div>
                   <div class="thongtin-chitietsp_btn">
                       <form method="POST" action="">
                           <input type="hidden" name="maRoHang" value="<?php echo isset($row["Madon"]) ? $row["Madon"] : 0 ?>">
                           <button name="xoa" class="btn">Hủy đơn</button>
                       </form>
                   </div>
               </div>
       <?php
           }
       } else {
           echo "<p style='text-align: center;'>Bạn không có đơn hàng phụ kiên nào.</p>";
       }
       
       $conn->close();
?>