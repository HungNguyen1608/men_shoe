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

    .sizegiay {
        display: flex;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .size_giay-item-CT input[type="radio"] {
       
    }

    .size_giay-item-CT {
        position: relative;
        display: inline-block;
    }

    .size_giay-item-CT-s {
        display: inline-block;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .size_giay-item-CT input[type="radio"]:checked + .size_giay-item-CT-s {
        background-color: #FFB74D; 
        color: #fff; /* Change to your desired text color */
    }

    .size_giay-item-CT input {
        margin-right: 5px;
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
        $conn = mysqli_connect("localhost","root","","shopbangiay");
        $id_sp = $_GET['Magiay'];
        $sql = "SELECT * FROM giay WHERE Magiay ='$id_sp'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
    ?>
         <div  class="prd-item" style="display: flex">
             <div style="pading:10px;">
                <!-- <div class="prd-only_quaylaict" >
                    <i style="padding:10px;font-size: 3rem;" class="fa fa-arrow-left" aria-hidden="true"></i>
                </div> -->
                <a href="index.php?page_layout=chitietsp&Magiay=<?php echo $row['Magiay'] ?>"><img style="border-radius: 10px;max-width: 420px;height: auto;" width="80" height="144" src="<?php echo $row['hinh'] ?>" /></a>
                
            </div>
            <div class="noidungchitiet">
                <div class="noidungchitiet_tensp">
                    <h3><a style="font-size: 2rem;text-decoration: none;color: black;" href="index.php?page_layout=chitietsp&Magiay=<?php echo $row['Tengiay'] ?>"><?php echo $row['Tengiay'] ?></a></h3>
                </div>
                <!-- <p><php if(isset($row['Dongia'])) echo $row['Dongia'] ?></p> -->
                <div class="noidungchitiet_thongtin" style="line-height: 28px;margin: 0 22px;">
                    <p style="font-size: 1.6rem;">Hãng giày: <?php if(isset($row['Hanggiay'])) echo $row['Hanggiay'] ?></p>
                    <p style="font-size: 1.6rem;">Thông tin sản phẩm:  <?php if(isset($row['Thongtin'])) echo $row['Thongtin'] ?></p>
                    <p class="price"><span style="font-size: 1.6rem;">Giá: <?php if(isset($row['Dongia'])) echo $row['Dongia'] ?>đ</span></p>
                </div>
                <div class="clear">
                <!-- <style>
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
                </style> -->

                    <div class="sizegiay">
                        <!-- <div class="sizegiay-item">
                            <h3>Chọn size:</h3>
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
                                    <span class="size_giay-item-CT-s">31</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="32">
                                    <span class="size_giay-item-CT-s">32</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="33">
                                    <span class="size_giay-item-CT-s">33</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="34">
                                    <span class="size_giay-item-CT-s">34</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="35">
                                    <span class="size_giay-item-CT-s">35</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="36">
                                    <span class="size_giay-item-CT-s">36</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="37">
                                    <span class="size_giay-item-CT-s">37</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="38">
                                    <span class="size_giay-item-CT-s">38</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="39">
                                    <span class="size_giay-item-CT-s">39</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="40">
                                    <span class="size_giay-item-CT-s">40</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="41">
                                    <span class="size_giay-item-CT-s">41</span>
                                </div>
                            </div>
                            <div class="size_giay-item">
                                <div class="size_giay-item-CT">
                                    <input type="radio" name="size" value="42">
                                    <span class="size_giay-item-CT-s">42</span>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-disabled">
                            <div class="quantity_custom">
                                <span class="giam"></span>
                                <div class="quantity">
                                    <label style="font-size: 1.6rem;" class="screen-reader-text" for="quantity_654f73cb03cc5">Số lượng: </label>
                                    <input style="width: 39px;height: 22px;" type="number" step="1" min="1" max="" name="quantity" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">
                                </div>
                                <span class="tang"></span>
                            </div>
                        </div> -->
                        <div style="margin-top: 5%;" class="btnct">
                            <a style="font-size: 1.5rem;color:#111; background-color: #FFB74D;height: 36px; align-items: center;justify-content: center;display: flex;text-decoration: none;text-align: center;" style="" href="dangnhapc.php">Đăng nhâp</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php
        }
    ?>
    </div>
    
    </div>
    
   
</div>  
             
