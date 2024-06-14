
<?php
       include 'connect.php';
       $maTaiKhoan = $_GET['mataikhoan'];
       $sql = "SELECT dongiao.Madonnhan, dongiao.Soluong, dongiao.Size, dongiao.Tinhtrang, giay.Tengiay, giay.hinh, giay.Dongia, khachhang.Fullname, khachhang.Sodt, khachhang.Diachi
               FROM dongiao
               INNER JOIN giay ON dongiao.Magiay = giay.Magiay
               INNER JOIN khachhang ON dongiao.MaTaiKhoan = khachhang.MaTaiKhoan
               WHERE dongiao.MaTaiKhoan = '$maTaiKhoan'";    
       $result = $conn->query($sql);
       
       if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
               ?>
               <div class="thontinsp">
                   <div class="thongtin">
                       <div class="thongtin_tensp">
                           <h6>Mã đơn hàng: <?php echo $row["Madonnhan"]; ?></h6>
                       </div>
                       <div class="thongtin-chitietsp">
                           <div class="thongtin hinh">
                               <?php echo "<img src='" . $row["hinh"] . "'>"; ?>
                           </div>
                           <div class="thongtin_thotctsp">
                               <a href="#" style="text-decoration: none; color: #333;font-size: 1.2rem;">Tên sản phẩm: <?php echo $row["Tengiay"] ?></a>
                               <p>Giá: <?php echo $row["Dongia"] ?></p>
                               <p>Size: <?php echo $row["Size"] ?></p>
                               <p>Số lượng: <?php echo $row["Soluong"] ?></p>
                               <p>Fullname: <?php echo $row["Fullname"] ?></p>
                               <p>Sodt: <?php echo $row["Sodt"] ?></p>
                               <p>Diachi: <?php echo $row["Diachi"] ?></p>
                               <p>Tình trạng: <?php echo $row["Tinhtrang"] ?></p>
                           </div>
                       </div>
                   </div>
                   <div class="thongtin-chitietsp_btn">
                       <form method="POST" action="">
                           <input type="hidden" name="maRoHang" value="<?php echo isset($row["Madon"]) ? $row["Madon"] : 0 ?>">
                           <button name="xoa" class="btn">Không thể hủy đơn</button>
                       </form>
                   </div>
               </div>
       <?php
           }
       } else {
           echo "<p style='text-align: center;'>Bạn không có đơn hàng nào.</p>";
       }
       
       $conn->close();
?>
<?php
include 'connect.php';
$maTaiKhoan = $_GET['mataikhoan'];
$sql = "SELECT dongiao.Madonnhan, dongiao.Soluong, dongiao.Tinhtrang, phukien.Tengiay, phukien.hinh, phukien.Dongia, khachhang.Fullname, khachhang.Sodt, khachhang.Diachi
        FROM dongiao
        INNER JOIN phukien ON dongiao.Magiay = phukien.Magiay
        INNER JOIN khachhang ON dongiao.MaTaiKhoan = khachhang.MaTaiKhoan
        WHERE dongiao.MaTaiKhoan = '$maTaiKhoan'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="thontinsp">
            <div class="thongtin">
                <div class="thongtin_tensp">
                    <h6>Mã đơn hàng: <?php echo $row["Madonnhan"]; ?></h6>
                </div>
                <div class="thongtin-chitietsp">
                    <div class="thongtin hinh">
                        <?php echo "<img src='" . $row["hinh"] . "'>"; ?>
                    </div>
                    <div class="thongtin_thotctsp">
                        <a href="#" style="text-decoration: none; color: #333; font-size: 1.2rem;">Tên sản phẩm: <?php echo $row["Tengiay"] ?></a>
                        <p>Giá: <?php echo $row["Dongia"] ?></p>
                        <p>Số lượng: <?php echo $row["Soluong"] ?></p>
                        <p>Fullname: <?php echo $row["Fullname"] ?></p>
                        <p>Sodt: <?php echo $row["Sodt"] ?></p>
                        <p>Diachi: <?php echo $row["Diachi"] ?></p>
                        <p>Tình trạng: <?php echo $row["Tinhtrang"] ?></p>
                    </div>
                </div>
            </div>
            <div class="thongtin-chitietsp_btn">
                <form method="POST" action="">
                    <input type="hidden" name="maRoHang" value="<?php echo isset($row["Madon"]) ? $row["Madon"] : 0 ?>">
                    <button name="xoa" class="btn">Không thể hủy đơn</button>
                </form>
            </div>
        </div>
    <?php
    }
} else {
    echo "<p style='text-align: center;'>Bạn không có đơn hàng nào.</p>";
}

$conn->close();
?>
