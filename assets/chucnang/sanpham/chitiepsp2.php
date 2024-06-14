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
        $sql = "SELECT * FROM giay WHERE Magiay ='$id_sp'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
    ?>
         <div  class="prd-item" style="display: flex">
            <a href="index.php?page_layout=chitietsp&Magiay=<?php echo $row['Magiay'] ?>"><img style="border-radius: 10px;width: 420px;height: auto;" width="80" height="144" src="<?php echo $row['hinh'] ?>" /></a>
            <div class="noidungchitiet">
                <h3><a style="text-decoration: none; color: black; font-size: 2rem" href="index.php?page_layout=chitietsp&Magiay=<?php echo $row['Tengiay'] ?>"><?php echo $row['Tengiay'] ?></a></h3>
                <p class="price"><span>Giá: <?php if(isset($row['Dongia'])) echo $row['Dongia'] ?> VNĐ</span></p>
                <p>Hãng giày: <?php if(isset($row['Hanggiay'])) echo $row['Hanggiay'] ?></p>
                <p>Thông tin: <?php if(isset($row['Thongtin'])) echo $row['Thongtin'] ?></p>
                <p>Màu: <?php if(isset($row['Mau'])) echo $row['Mau'] ?></p>
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
                        $size = isset($_POST['size']) ? $_POST['size'] : '';

                        // Tạo câu lệnh SQL INSERT
                        $sql = "INSERT INTO rohang (Mataikhoan, Magiay, Soluong, Size) VALUES ('$mataikhoan', '$magiay', '$soluong', '$size')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script>alert('Đã thêm vào giỏ hàng!');</script>";
                        } else {
                            $tbct= "Lỗi khi thêm thông tin: " . $conn->error;
                        }
                    }

                        // Đóng kết nối
                        $conn->close();
                    ?>
                <!--PHP MUA HÀNG -->
                <!-- <php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);

                    // Kiểm tra nếu có tham số trong URL và giá trị từ biến POST
                    if (isset($_GET['mataikhoan'], $_GET['Magiay'], $_POST['muahang'])) {
                        $mataikhoan = $_GET['mataikhoan'];
                        $magiay = $_GET['Magiay'];
                        $soluong = isset($_POST['quantity']) ? $_POST['quantity'] : '';
                        $size = isset($_POST['size']) ? $_POST['size'] : '';

                        // Kiểm tra kết nối cơ sở dữ liệu
                        $conn = mysqli_connect("localhost", "root", "", "shopbangiay");
                        if ($conn->connect_error) {
                            die("Kết nối không thành công: " . $conn->connect_error);
                        }

                        // Sử dụng prepared statement để ngăn chặn SQL injection
                        $sql = "INSERT INTO muahang (Mataikhoan, Magiay, Soluong, Size) VALUES (?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssss", $mataikhoan, $magiay, $soluong, $size);

                        if ($stmt->execute()) {
                            $tbmh= "Thêm thông tin thành công";
                        } else {
                        $tbmh= "Lỗi khi thêm thông tin: " . $stmt->error;
                        }

                        // Đóng kết nối và đóng prepared statement
                        $stmt->close();
                        $conn->close();

                        // Chuyển hướng sau khi thêm thông tin thành công
                        header("Location: giaodienmuahang.php?mataikhoan=" . $mataikhoan . "&Magiay=" . $magiay);
                        exit;
                    }
                ?> -->


                <form method="POST" action="">
                    <div class="clear">
                        <div class="sizegiay">
                            <div class="sizegiay-item">
                                <h3>Size</h3>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="29">
                                        <span class="size_giay-item-CT-s">29</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="30">
                                        <span class="size_giay-item-CT-s">30</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="31">
                                        <span>31</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="32">
                                        <span>32</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="33">
                                        <span>33</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="34">
                                        <span>34</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="35">
                                        <span>35</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="36">
                                        <span>36</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="37">
                                        <span>37</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="38">
                                        <span>38</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="39">
                                        <span>39</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="40">
                                        <span>40</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="41">
                                        <span>41</span>
                                    </div>
                                </div>
                                <div class="size_giay-item">
                                    <div class="size_giay-item-CT">
                                        <input type="radio" name="size" value="42">
                                        <span>41</span>
                                    </div>
                                </div>
                                <!-- Các size giày khác -->
                            </div>
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
                        // Lấy giá trị size và quantity từ các input
                        var size = document.querySelector('input[name="size"]:checked');
                        var quantity = document.querySelector('input[name="quantity"]').value;

                        // Kiểm tra xem size có được chọn không
                        if (size) {
                            // Tạo đường link với các tham số size và quantity
                            var link = "giaodienmuahang.php?mataikhoan=<?php echo $_GET['mataikhoan']; ?>&Magiay=<?php echo $_GET['Magiay']; ?>&Soluong=" + quantity + "&Size=" + size.value;

                            // In ra giá trị để kiểm tra
                            console.log("Link:", link);

                            // Chuyển hướng trang
                            window.location.href = link;
                        } else {
                            // Nếu size không được chọn, thông báo lỗi
                            console.log("Vui lòng chọn size");
                        }
                    }
                </script>

            </div>
        </div>
    
    </div>
    </div>
</div>  

             
