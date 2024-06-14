<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- linh cài đặt cấu hình css trang wed -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- linh liên kết các thành phần rtong bài -->
    <link rel="stylesheet" href="css/cssmenu.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- linh phông chữ lấy từ trang  roboto gg font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,500&display=swap" rel="stylesheet"></head>
    <!-- linh font icon phần font assest fontawesome-free-6 -->
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .noidungtt{
            display: flex;
        }
        .thongtinkhachhang {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            width: 50%;
        }

        .thongtinkh,
        .thongtinkhachhang_pttt {
            width: 100%;
        }

        .thongtinkh h2,
        .thongtinkhachhang_pttt h2 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .thongtinkhct,
        .thongtinkhachhang_pttt_ct {
            padding: 22px;
            border: 1px solid;
            min-height: 100px;
            margin-top: 10px;
                
        }
        .thongtinkhachhang_pttt_ct{
            min-height: 100px;
        }

        .form_nhap {
            width: 100%;
            margin-bottom: 15px;
        }

        .form_nhap label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .woocommerce-input-wrapper {
            display: block;
        }

        .thongtinsp {
            /* margin-top: 20px; */
            padding: 20px;
            border-left: 2px solid #000;
            display: flex;
            justify-content: space-between;
        }

        .thongtinsp_item {
            /* display: flex; */
        }

        .thongtinsp_item img {
            border-radius: 10px;
            width: 388px;
            height: auto;
            margin-right: 20px;
        }

        .gdmuanoidungct {
            flex-grow: 1;
        }

        .gdmuanoidungct h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .price span {
            font-weight: bold;
        }

        .xacnhan input {
            padding: 10px;
            font-size: 1rem;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .input-text{
            width: 95%;
            min-height: 30px;
        }
        .yeucau{
            width: 95%;
            min-height: 100px;
        }
        .btn{
            width: 100%;
        }
        .thongtinkhachhang_pttt_ct-tienmat,
        .thongtinkhachhang_pttt_ct-ck{
            display: flex;
        }
    </style>
</head>
<body>
    <div>
        <?php
            include("chucnang/giaodien/phantren.php");
        ?>
        <div class="noidung">
                <div class="hienthi">
                    <div class="hienthi__ngang app__content">
                        <?php
                                include_once('chucnang/giaodien/menudanhmuc.php');
                        ?>
                        <?php
                                if (isset($_POST["submit"])) {
                                    $mataikhoan = $_GET['mataikhoan'];
                                    $magiay = $_GET['Magiay'];
                                    $soluong = $_GET['Soluong'];
                                    $size = $_GET['Size'];
                                    $yeucau = $_POST['yeucau'];
                                    $Pttt=$_POST['pttt'];

                                    $conn = mysqli_connect("localhost","root","","shopbangiay");

                                    // Lấy Makhach từ bảng khachhang dựa trên Mataikhoan
                                    $makhachSql = "SELECT Makhach FROM khachhang WHERE Mataikhoan = '$mataikhoan'";
                                    $makhachResult = mysqli_query($conn, $makhachSql);
                                    $makhachRow = mysqli_fetch_assoc($makhachResult);
                                    $makhach = $makhachRow['Makhach'];
                            
                                    // Thêm thông tin vào bảng muahang với Makhach lấy từ bảng khachhang
                                    $insertSql = "INSERT INTO muahang (Mataikhoan, Magiay, Soluong, Size, yeucau, Makhach, ptthanhtoan) 
                                                  VALUES ('$mataikhoan', '$magiay', '$soluong', '$size', '$yeucau', '$makhach', '$Pttt')";
                            
                                    if (mysqli_query($conn, $insertSql)) {
                                        $tbmh = "Thêm thông tin vào bảng muahang thành công";
                                    } else {
                                        $tbmh = "Lỗi: " . $insertSql . "<br>" . mysqli_error($conn);
                                    }
                            
                                    mysqli_close($conn);
                                }
                            ?>
                             <div class="hienthi__column_10">
                                 <form method="post" action="">
                                 <div class="tieude">
                                     <h1>MUA NGAY</h1>
                                 </div>
                                 <div class="noidungtt">
                                     <div class="thongtinkhachhang">
                                         <div class="thongtinkh">
                                             <h2>THÔNG TIN KHÁCH HÀNG</h2>
                                             <?php
                                                 include("ketnoi.php");
                                                 if (isset($_POST["submit"])) {
                                                     // Lấy dữ liệu từ form
                                                     $mataikhoan = $_GET['mataikhoan'];
                                                     $fullname = $_POST["fullname"];
                                                     $sdt = $_POST["sdt"];
                                                     $diachi = $_POST["diachi"];
                                                     $email = $_POST["email"];
     
                                                     // Thực hiện truy vấn SELECT để kiểm tra xem khóa tồn tại hay không
                                                     $checkSql = "SELECT * FROM khachhang WHERE Mataikhoan = '{$mataikhoan}'";
                                                     $checkResult = mysqli_query($conn, $checkSql);
     
                                                     // Nếu khóa tồn tại, thực hiện truy vấn UPDATE để cập nhật thông tin khách hàng
                                                     if ($checkResult->num_rows > 0) {
                                                         $updateSql = "UPDATE khachhang SET Fullname = '{$fullname}', Sodt = '{$sdt}', Diachi = '{$diachi}', Email = '{$email}' WHERE Mataikhoan = '{$mataikhoan}'";
                                                         if (mysqli_query($conn, $updateSql)) {
                                                             $tb = "Cập nhật thông tin khách hàng thành công";
                                                         } else {
                                                             echo "Lỗi: " . $updateSql . "<br>" . mysqli_error($conn);
                                                         }
                                                     } else {
                                                         // Nếu khóa không tồn tại, thực hiện truy vấn INSERT để thêm thông tin khách hàng mới
                                                         $insertSql = "INSERT INTO khachhang (Mataikhoan, Fullname, Sodt, Diachi, Email) VALUES ('{$mataikhoan}', '{$fullname}', '{$sdt}', '{$diachi}', '{$email}')";
                                                         if (mysqli_query($conn, $insertSql)) {
                                                             $tb = "Thêm thông tin khách hàng mới thành công";
                                                         } else {
                                                             echo "Lỗi: " . $insertSql . "<br>" . mysqli_error($conn);
                                                         }
                                                     }
                                                 }
     
                                                 // Thực hiện truy vấn SELECT để lấy thông tin khách hàng cần sửa
                                                 $selectSql = "SELECT * FROM khachhang WHERE Mataikhoan = '{$_GET['mataikhoan']}'";
                                                 $result = mysqli_query($conn, $selectSql);
     
                                                 if ($result->num_rows > 0) {
                                                     while ($row = $result->fetch_assoc()) {
                                                         // Lấy giá trị từ cơ sở dữ liệu để điền vào các trường nhập liệu trong form
                                                         $fullname = $row["Fullname"];
                                                         $sdt = $row["Sodt"];
                                                         $diachi = $row["Diachi"];
                                                         $email = $row["Email"];
                                                     }
                                                 }
     
                                                 // Đóng kết nối với cơ sở dữ liệu
                                                 mysqli_close($conn);
                                             ?>
                                            
                                             <div class="thongtinkhct">
                                                 <p class="form_nhap"  data-priority="1">
                                                     <label for="billing_last_name" class="">Họ và tên
                                                         <abbr class="required" title="bắt buộc">*</abbr>
                                                     </label>
                                                     <span class="woocommerce-input-wrapper">
                                                         <input type="text" class="input-text " name="fullname" id="" placeholder="Họ và tên" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>" autocomplete="family-name">
                                                     </span>
                                                 </p>
                                                 <p class="form_nhap"  data-priority="1">
                                                     <label for="billing_last_name" class="">Số điện thoại
                                                         <abbr class="required" title="bắt buộc">*</abbr>
                                                     </label>
                                                     <span class="woocommerce-input-wrapper">
                                                         <input type="text" class="input-text " name="sdt" id="" placeholder="Số Điện thoại" value="<?php echo isset($sdt) ? htmlspecialchars($sdt) : ''; ?>" autocomplete="family-name">
                                                     </span>
                                                 </p>
                                                 <p class="form_nhap"  data-priority="1">
                                                     <label for="billing_last_name" class="">Địa chỉ
                                                         <abbr class="required" title="bắt buộc">*</abbr>
                                                     </label>
                                                     <span class="woocommerce-input-wrapper">
                                                         <input type="text" class="input-text " name="diachi" id="" placeholder="Địa chỉ" value="<?php echo isset($diachi) ? htmlspecialchars($diachi) : ''; ?>" autocomplete="family-name">
                                                     </span>
                                                 </p>
                                                 <p class="form_nhap"  data-priority="1">
                                                     <label for="billing_last_name" class="">Email
                                                         <abbr class="required" title="bắt buộc">*</abbr>
                                                     </label>
                                                     <span class="woocommerce-input-wrapper">
                                                         <input type="text" class="input-text " name="email" id="" placeholder="Địa chỉ" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" autocomplete="family-name">
                                                     </span>
                                                 </p>
                                                 <p class="form_nhap"  data-priority="1">
                                                     <label for="billing_last_name" class="">Yêu cầu thêm khi giao hàng
                                                         <abbr class="required" title="bắt buộc">*</abbr>
                                                     </label>
                                                     <span class="woocommerce-input-wrapper">
                                                         <textarea type="text" class="input-text yeucau " name="yeucau" id="" placeholder="" value="" autocomplete="family-name"></textarea>
                                                     </span>
                                                 </p>
                                             
                                 
                                             </div>
                                         </div>
                                         <div class="thongtinkhachhang_pttt">
                                             <h2>PHƯƠNG THỨC THANH TOÁN</h2>
                                             <div class="thongtinkhachhang_pttt_ct">
                                                 <div style="margin: 10px;display: flex">
                                                     <div class="thongtinkhachhang_pttt_ct-tienmat">
                                                     <input type="radio" name="pttt" id="pttt1" value="Thanh toán bằng tiền mặt khi nhận hàng">
                                                         <label for="pttt1">Thanh toán bằng tiền mặt khi nhận hàng(COD)</label>
                                                     </div>
                                                 </div>
                                                 <div style="margin: 10px;display: flex">
                                                     <div class="thongtinkhachhang_pttt_ct-ck">
                                                     <input type="radio" name="pttt" id="pttt2" value="Chuyển khoản trước khi nhận hàng">
                                                         <label for="pttt2">Chuyển khoản trước khi nhân hàng</label>
                                                     </div>
                                                 </div>
                                             </div>
                                 
                                         </div>
                                         <div class="xacnhan">
                                             <input type="submit" name="submit" value="XÁC NHẬN">
                                         </div>
                                 
                                     </div>
                                     <div class="thongtinsp">
                                         <?php
                                             $mataikhoan = $_GET['mataikhoan'];
                                             $conn = mysqli_connect("localhost","root","","shopbangiay");
                                             $id_sp = $_GET['Magiay'];
                                             $sql = "SELECT * FROM giay WHERE Magiay ='$id_sp'";
                                             $query = mysqli_query($conn,$sql);
                                             while($row = mysqli_fetch_array($query)){
                                         ?>
                                             <div  class="thongtinsp_item" style="">
                                                 <a href="giaodien.php?page_layout=chitietsp&Magiay=<?php echo $row['Magiay'] ?>"><img  width="80" height="144" src="<?php echo $row['hinh'] ?>" /></a>
                                                 <div class="gdmuanoidungct">
                                                     <h3><a  style=" color: black; text-decoration: none;" href="giaodien.php?page_layout=chitietsp&Magiay=<?php echo $row['Tengiay'] ?>"><?php echo $row['Tengiay'] ?></a></h3>
                                                     <p>Giá: <?php if(isset($row['Dongia'])) echo $row['Dongia'] ?> VNĐ</p>
                                                     <p>Hãng giày: <?php if(isset($row['Hanggiay'])) echo $row['Hanggiay'] ?></p>
                                                     <p>Thông tin: <?php if(isset($row['Thongtin'])) echo $row['Thongtin'] ?></p>
                                                     <p><span>Màu: <?php if(isset($row['Mau'])) echo $row['Mau'] ?></span></p>
                                                 </div>
                                             </div>
                                         <?php
                                             }
                                         ?>
                                 
                                     </div>
                                 </div>
                                </form>
                             </div>                                        
                       
                    </div>
                </div>
        </div>
    </div>

</body>
</html>

