<style>
    /* Thêm kiểu cho thontinsp container */
    .thontinsp {
        margin-bottom: 20px;
    }

    /* Thêm kiểu cho thongtin container */
    .thongtin {
        border-bottom: 1px solid #ccc;
        padding-bottom: 15px;
        margin-bottom: 15px;
    }

    /* Thêm kiểu cho thongtin_tensp container */
    .thongtin_tensp {
        background-color: #333;
        color: #fff;
        padding: 8px;
        margin: 0;
        text-align: center;
    }

    /* Thêm kiểu cho hinh container */
    .thongtin .hinh img {
        max-width: 100px;
        max-height: 100px;
        border-radius: 5px;
    }

    /* Thêm kiểu cho thongtin_thotctsp container */
    .thongtin_thotctsp {
        flex-grow: 1;
        padding-left: 15px;
        display: flex;
        justify-content: space-between;
    }

    /* Thêm kiểu cho thongtin-chitietsp_btn container */
    .thongtin-chitietsp_btn {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    /* Thêm kiểu cho button */
    .thongtin-chitietsp_btn button {
        padding: 10px;
        background-color: #333;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .thongtin-chitietsp_btn button:hover {
        background-color: #555;
    }

</style>
<?php
       include 'connect.php';
       $maTaiKhoan = $_GET['mataikhoan'];
       $sql = "SELECT muahang.Madon, muahang.Soluong, muahang.Size, muahang.yeucau, muahang.ptthanhtoan, giay.Tengiay, giay.hinh, giay.Dongia, khachhang.Fullname, khachhang.Sodt, khachhang.Diachi, giay.Magiay
        FROM muahang
        INNER JOIN giay ON muahang.Magiay = giay.Magiay
        INNER JOIN khachhang ON muahang.MaTaiKhoan = khachhang.MaTaiKhoan";
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
                                <div class="thongtinsanp">
                                    <a href="#" style="text-decoration: none; color: #333;font-size: 1.2rem;">Tên sản phẩm: <?php echo $row["Tengiay"] ?></a>
                                    <p>Giá: <?php echo $row["Dongia"] ?></p>
                                    <p>Thông tin: <?php echo $row["yeucau"] ?></p>
                                    <p>Size: <?php echo $row["Size"] ?></p>
                                    <p>Số lượng: <?php echo $row["Soluong"] ?></p>
                                </div>
                                <div class="thongtinkhachhang" style="margin-top: 37px;margin-right: 17px;">
                                    <p>Phương thức thanh toán: <?php echo $row["ptthanhtoan"] ?></p>
                                    <p>Fullname: <?php echo $row["Fullname"] ?></p>
                                    <p>Sodt: <?php echo $row["Sodt"] ?></p>
                                    <p>Diachi: <?php echo $row["Diachi"] ?></p>
                                </div>
                                <p>Số lượng giày còn lại:
                                    <?php
                                        $magiay = $row["Magiay"];
                                        $checkSql = "SELECT Soluong FROM giay WHERE Magiay = '$magiay'";
                                        $checkResult = $conn->query($checkSql);
                                        if ($checkResult->num_rows > 0) {
                                            $giayRow = $checkResult->fetch_assoc();
                                            $soluongGiay = $giayRow["Soluong"];
                                        } else {
                                            $soluongGiay = "Không có thông tin";
                                        }
                                        echo $soluongGiay;
                                    ?>
                                </p>
                           </div>
                       </div>
                   </div>
                   <div class="thongtin-chitietsp_btn">
                       <form method="POST" action="">
                           <input type="hidden" name="maRoHang" value="<?php echo isset($row["Madon"]) ? $row["Madon"] : 0 ?>">
                           <button name="xacnhan" class="btn">Xác nhân</button>
                       </form>
                   </div>
               </div>
               <?php
            // if (isset($_POST["xacnhan"]) && $_POST["maRoHang"] == $row["Madon"]) {
            //     $madon = $row["Madon"];
            //     $tinhtrang = "Đã Xác nhận đơn hàng";
            //     $magiay = $row["Magiay"];
            //     $size = $row["Size"];
            //     $soluong1 = $row["Soluong"];
               

            //     // Check if Soluong in giay table is greater than 0
            //     $checkSql = "SELECT Soluong FROM giay WHERE Magiay = '$magiay'";
            //     $checkResult = $conn->query($checkSql);
            //     if ($checkResult->num_rows > 0) {
            //         $row = $checkResult->fetch_assoc();
            //         $soluong = $row["Soluong"];
            //         if ($soluong > 0) {
            //             // Update Soluong in giay table
            //             $updateSql = "UPDATE giay SET Soluong = Soluong - $soluong1 WHERE Magiay = '$magiay'";
            //             if ($conn->query($updateSql) === TRUE) {
            //                 // Insert information into dongiao table
            //                 $sql = "INSERT INTO dongiao (Mataikhoan, Makhach, Magiay, Soluong, Size, Tinhtrang) SELECT muahang.Mataikhoan, Makhach, '$magiay', '$soluong1', '$size', '$tinhtrang' FROM muahang WHERE Madon = '$madon'";
            //                 if ($conn->query($sql) === TRUE) {
            //                     echo "Thêm thông tin vào bảng dongiao thành công";

            //                     // Delete the information from muahang table
            //                     $deleteSql = "DELETE FROM muahang WHERE Madon = '$madon'";
            //                     if ($conn->query($deleteSql) === TRUE) {
            //                         echo "Xóa thông tin khỏi bảng muahang thành công";
            //                     } else {
            //                         echo "Lỗi khi xóa thông tin khỏi bảng muahang: " . $conn->error;
            //                     }
            //                 } else {
            //                     echo "Lỗi khi thêm thông tin vào bảng dongiao: " . $conn->error;
            //                 }
            //             } else {
            //                 echo "Lỗi khi sửa thông tin trong bảng giay: " . $conn->error;
            //             }
            //         } else {
            //             echo "Không thể thêm thông tin vào bảng dongiao vì Soluong trong bảng giay đã đạt tới 0";
            //         }
            //     } else {
            //         echo "Lỗi khi kiểm tra Soluong trong bảng giay: " . $conn->error;
            //     }
            // }
            if (isset($_POST["maRoHang"]) && $_POST["maRoHang"] == $row["Madon"]) {
                $madon = $row["Madon"];
                $tinhtrang = "Đã Xác nhận đơn hàng";
                $magiay = $row["Magiay"];
                $size = $row["Size"];
                $soluong1 = $row["Soluong"];
            
                // Check if Soluong in giay table is greater than 0
                $checkSql = "SELECT Soluong FROM giay WHERE Magiay = ?";
                $checkStmt = $conn->prepare($checkSql);
                $checkStmt->bind_param("s", $magiay);
                $checkStmt->execute();
                $checkResult = $checkStmt->get_result();
                if ($checkResult->num_rows > 0) {
                    $row = $checkResult->fetch_assoc();
                    $soluong = $row["Soluong"];
                    if ($soluong > 0) {
                        // Start transaction
                        $conn->begin_transaction();
            
                        try {
                            // Update Soluong and increment daban in giay table
                            $updateSql = "UPDATE giay SET Soluong = Soluong - ?, daban = daban + ? WHERE Magiay = ?";
                            $updateStmt = $conn->prepare($updateSql);
                            $updateStmt->bind_param("sss", $soluong1, $soluong1, $magiay);
                            $updateStmt->execute();
            
                            // Insert information into dongiao table
                            $insertSql = "INSERT INTO dongiao (Mataikhoan, Makhach, Magiay, Soluong, Size, Tinhtrang, Madon) SELECT muahang.Mataikhoan, Makhach, ?, ?, ?, ?, muahang.Madon FROM muahang WHERE Madon = ?";
                            $insertStmt = $conn->prepare($insertSql);
                            $insertStmt->bind_param("sssss", $magiay, $soluong1, $size, $tinhtrang, $madon);
                            $insertStmt->execute();
                            // Add information to thongbao table
                            $noidung = "Đã xác nhận đơn hàng";
                            $insertThongbaoSql = "INSERT INTO thongbao (Mataikhoan, Noidung, Madon) SELECT muahang.Mataikhoan, ?, ? FROM muahang WHERE Madon = ?";
                            $insertThongbaoStmt = $conn->prepare($insertThongbaoSql);
                            $insertThongbaoStmt->bind_param("sss", $noidung, $madon, $madon);
                            $insertThongbaoStmt->execute();
                            
                            // Delete the information from muahang table
                            $deleteSql = "DELETE FROM muahang WHERE Madon = ?";
                            $deleteStmt = $conn->prepare($deleteSql);
                            $deleteStmt->bind_param("s", $madon);
                            $deleteStmt->execute();
            
            
                            // Commit transaction
                            $conn->commit();
            
                            echo "Xác nhận đơn hàng thành công";
                        } catch (Exception $e) {
                            // Rollback transaction in case of error
                            $conn->rollback();
                            echo "Lỗi: " . $e->getMessage();
                        }
                    } else {
                        echo "Không thể thêm thông tin vào bảng dongiao vì Soluong trong bảng giay đã đạt tới 0";
                    }
                } else {
                    echo "Lỗi khi kiểm tra Soluong trong bảng giay: " . $conn->error;
                }
            }
         }
}
?>