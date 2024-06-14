<style>
    .bodysp {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .thongtinqlban {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        margin-top: 20px;
    }

    .thongtingiayct,
    .ttphukienct {
        overflow-y: auto;
        max-height: 392px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 10px;
        transition: box-shadow 0.3s ease;
    }

    .noidungspb {
        display: flex;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        transition: transform 0.3s ease;
    }

    .noidungspb:hover {
        transform: scale(1.05);
    }

    .hinhsp img {
        max-width: 100px;
        max-height: 100px;
        border-radius: 5px;
    }

    .thongtin {
        margin-left: 10px;
    }

    .thongtin_tensp h6 {
        margin: 0;
        color: #333;
        font-size: 1.2rem;
    }

    .thongtinsanp p {
        margin: 5px 0;
    }

    h2 {
        margin-top: 20px;
        color: #333;
    }

    .tonggia {
        text-align: center;
        margin-top: 10px;
        font-size: 1.5rem;
        color: #333;
    }
</style>

<h5 style="text-align: center;">Thống kê bán hàng</h5>
<div class="thongtinqlban">
    <div class="thongtingiay">
        <div class="thongtingiayct"> 
            <?php
            include 'connect.php';

            $sql = "SELECT d.Madon, d.Soluong, d.Size, g.Magiay, g.Tengiay, g.Dongia, g.Hinh 
                    FROM dongiao d
                    JOIN giay g ON d.Magiay = g.Magiay";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $tonggiagiay = 0;
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="noidungspb">
                        <div class="hinhsp">
                            <img class="hinhsp" src="<?php echo $row["Hinh"] ?>" alt="">
                        </div>
                        <div class="thongtin">
                            <div class="thongtin_tensp">
                                <h6>Mã đơn hàng: <?php echo $row["Madon"]; ?></h6>
                            </div>
                            <div class="thongtin_thotctsp">
                                <div class="thongtinsanp">
                                    <p style="text-decoration: none; color: #333;font-size: 1.2rem;">Tên sản phẩm: <?php echo $row["Tengiay"] ?></p>
                                    <p>Giá: <?php echo $row["Dongia"] ?> đ</p>
                                    <p>Size: <?php echo $row["Size"] ?></p>
                                    <p>Số lượng: <?php echo $row["Soluong"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    
                    $tonggiagiay += $row["Dongia"]*$row["Soluong"];
                }

            } else {
                echo "Chưa bán đơn giày nào.";
            }

            $conn->close();
            ?>
        </div>
        <div class="tonggia">
            <h2>Tổng doanh thu giày: <?php echo $tonggiagiay ?></h2>
        </div>
    </div>
    <div class="ttphukien">
        <div class="ttphukienct">
            <?php
                include 'connect.php';

                $sql = "SELECT d.Madon, d.Soluong, d.Size, o.Magiay, o.Tengiay, o.Dongia, o.Hinh 
                        FROM dongiao d
                        JOIN phukien o ON d.Magiay = o.Magiay";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $tonggiapk = 0;
                    while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="noidungspb">
                        <div class="hinhsp">
                            <img class="hinhsp" src="<?php echo $row["Hinh"] ?>" alt="">
                        </div>
                        <div class="thongtin">
                            <div class="thongtin_tensp">
                                <h6>Mã đơn hàng: <?php echo $row["Madon"]; ?></h6>
                            </div>
                            <div class="thongtin_thotctsp">
                                <div class="thongtinsanp">
                                    <p style="text-decoration: none; color: #333;font-size: 1.2rem;">Tên sản phẩm: <?php echo $row["Tengiay"] ?></p>
                                    <p>Giá: <?php echo $row["Dongia"] ?> đ</p>
                                    <p>Size: <?php echo $row["Size"] ?></p>
                                    <p>Số lượng: <?php echo $row["Soluong"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php        
                        $tonggiapk += $row["Dongia"]*$row["Soluong"];
                    }
                } else {
                    echo "Chưa bán đơn hàng phụ kiện nào.";
                }
                
                $conn->close();
            ?>
        </div>
        <div class="tonggia">
        <h2>Tổng doanh thu kiện: <?php echo $tonggiapk ?></h2>
        </div>
    </div>
</div>