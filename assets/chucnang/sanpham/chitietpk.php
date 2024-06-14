<link rel="stylesheet" href="css/main.css">
<style>
    .prd-block {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .prd-item {
        display: flex;
    }

    .prd-item img {
        border-radius: 10px;
        width: 420px;
        height: auto;
        transition: transform 0.3s ease-in-out;
    }

    .prd-item img:hover {
        transform: scale(1.1);
    }

    .noidungchitiet {
        margin-left: 20px;
    }

    .noidungchitiet_tensp a {
        font-size: 2rem;
        text-decoration: none;
        color: black;
    }

    .noidungchitiet_thongtin {
        line-height: 28px;
        margin: 0 22px;
    }

    .price span {
        font-size: 1.6rem;
    }

    
    .quantity_custom {
        display: flex;
        align-items: center;
    }

    .quantity {
        margin: 0 10px;
    }

    .btnct {
        margin-top: 5%;
    }

    .btnct a {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        text-align: center;
        color: #111;
        background-color: #FFB74D;
        height: 36px;
        border-radius: 5px;
        padding: 5px 15px;
    }

    /* Add hover effect to the button */
    .btnct a:hover {
        background-color: #FF9800;
    }
</style>
<div class="prd-block">
    <div class="prd-only">
    <?php
        $mataikhoan = $_GET['mataikhoan'];
        $conn = mysqli_connect("localhost","root","","shopbangiay");
        $id_sp = $_GET['Magiay'];
        $sql = "SELECT * FROM phukien WHERE Magiay ='$id_sp'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
    ?>
         <div  class="prd-item" style="display: flex">
            <a href="#"><img style="border-radius: 10px;width: 420px;height: auto;" width="80" height="144" src="<?php echo $row['hinh'] ?>" /></a>
            <div class="noidungchitiet">
                <h3><a style="text-decoration: none; color: black; font-size: 2rem" href="index.php?page_layout=chitietsp&Magiay=<?php echo $row['Tengiay'] ?>"><?php echo $row['Tengiay'] ?></a></h3>
                <p class="price"><span>Giá: <?php if(isset($row['Dongia'])) echo $row['Dongia'] ?> VNĐ</span></p>
                <?php
                    }
                ?>
                <!--PHP RỎ HÀNG -->
                <?php
                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);
                        $conn = mysqli_connect("localhost","root","","shopbangiay");
                        if ($conn->connect_error) {
                             die("Kết nối không thành công: " . $conn->connect_error);
                        }

                        // Lấy giá trị từ biến POST
                        if (isset($_POST['themgiohang'])) {
                        $mataikhoan = $_GET['mataikhoan'];
                        $magiay = $_GET['Magiay'];
                        $soluong = isset($_POST['quantity']) ? $_POST['quantity'] : '';

                        // Tạo câu lệnh SQL INSERT
                        $sql = "INSERT INTO rohang (Mataikhoan, Magiay, Soluong) VALUES ('$mataikhoan', '$magiay', '$soluong')";

                        if ($conn->query($sql) === TRUE) {
                             $tbct= "Thêm thông tin thành công";
                        } else {
                            $tbct= "Lỗi khi thêm thông tin: " . $conn->error;
                        }
                    }

                        // Đóng kết nối
                        $conn->close();
                    ?>
                <form method="POST" action="">
                    <div class="clear">
                        <div class="sizegiay">
                            <div class="woocommerce-variation-add-to-cart variations_button">
                                <div class="quantity_custom">
                                    <span class="giam"></span>
                                    <div class="quantity">
                                        <label class="screen-reader-text" for="quantity">Số lượng</label>
                                        <input style="width: 39px;height: 22px;" type="number" step="1" min="1" max="" name="quantity" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">
                                    </div>
                                    <span class="tang">
                                    </span>
                                </div>
                            </div>
                            <div style="margin-top: 5%;" class="btnct">
                                <button style="color:#111; background-color: #FFB74D;height: 36px; align-items: center;justify-content: center;display: flex;text-decoration: none;text-align: center;" class="btn btnchitiet" name="themgiohang" type="submit">Thêm vào rỏ hàng</button>
                            </div>
                            <button id="muaNgayBtn" style="color:#111; background-color: #FFB74D;height: 36px; align-items: center;justify-content: center;display: flex;text-decoration: none;text-align: center;" class="btn btnchitiet" name="muahang" type="button" onclick="muaNgay()">Mua ngay</button>
                        </div>
                    </div>
                </form>
                <script>
                    document.querySelector('[name="quantity"]').addEventListener('input', function() {
                        document.getElementById('soluong_link').href = "giaodienmuahang.php?mataikhoan=<?php echo $_GET['mataikhoan']; ?>&Magiay=<?php echo $_GET['Magiay']; ?>&Soluong=" + this.value + "&Size=" + (document.querySelector('[name="size"]:checked') ? document.querySelector('[name="size"]:checked').value : '');
                    });
                </script>
                <script>
                    function muaNgay() {
                        // Lấy giá trị quantity từ input
                        var quantity = document.querySelector('input[name="quantity"]').value;
                        // Tạo đường link với tham số quantity và size (nếu cần)
                        var link = "giaodienmuahangpk.php?mataikhoan=<?php echo $_GET['mataikhoan']; ?>&Magiay=<?php echo $_GET['Magiay']; ?>&Soluong=" + quantity;

                        // In ra giá trị để kiểm tra
                        console.log("Link:", link);

                        // Thực hiện hành động khi nhấn nút "Mua ngay" (ví dụ: chuyển hướng trang)
                        window.location.href = link;
                    }
                </script>

                
            </div>
        </div>
    
    </div>
    </div>
</div>  

             
