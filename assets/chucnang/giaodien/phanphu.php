<footer class="phanphu">
                <div class="hienthi">
                    <div class="hienthi__ngang">
                        <div class="ps-home-contact__form">
                            <header>
                                <h3 style="font-size: 1.9rem;">Liên hệ</h3>
                                <p>Có góp ý hoặc khiếu nại vui lòng điền vào form. Xin cảm ơn.</p>
                            </header>
                            <footer class="ps-home-contact__form__nd">
                            <?php
                                // Kiểm tra nút "Gửi" đã được nhấn hay chưa
                                if (isset($_POST['send_email'])) {
                                    // Kết nối tới CSDL
                                    include('connect.php');

                                    // Lấy dữ liệu từ form
                                    $hoten = $_POST['name'];
                                    $email = $_POST['email'];
                                    $ykien = $_POST['content'];

                                    // Thực hiện câu lệnh INSERT INTO
                                    $sql = "INSERT INTO khieunai (Hoten, Email, Ykien) VALUES ('$hoten', '$email', '$ykien')";

                                    if ($conn->query($sql) === TRUE) {
                                        echo "<script>alert('Đã giửi ý kiến đóng góp!.');</script>";
                                    } else {
                                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                                    }

                                    // Đóng kết nối
                                    $conn->close();
                                }
                            ?>
                                <form action="" method="post" style="width: 100%;">
                                    <div class="form-group">
                                        <label>Họ tên<span>*</span></label>
                                        <input  id="myInput" name="name" class="form-control form-control-nho " type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Email<span>*</span></label>
                                        <input name="email" class="form-control form-control-nho" type="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Góp ý(kiếu nại)của bạn!<span>*</span></label>
                                        <textarea name="content" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <button name="send_email" class="ps-btn">Gửi</button>
                                    </div>
                                </form>
                            </footer>
                        </div>
                        <div class="hienthi__column_1">
                            <div class="hienthi__column_1-1">
                                <h3 class="hienthi__column_1-1-tieude">Thông tin shop:</h3>
                                <div class="hienthi__column_1-1-noidung">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span  class="hienthi__column_1-1-noidung-nd">Số 234 Lĩnh Nam ,Hoàng Mai ,Hà Nội.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                    <i class="fa-solid fa-phone"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">0987657432</span>
                                </div>
                                <div class="hienthi__column_1-1-noidung">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span class="hienthi__column_1-1-noidung-nd">Số 181 Lê Lợi,Thành Đoan ,Hà Nội. </span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                    <i class="fa-solid fa-phone"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">0987456789</span>
                                </div>
                                <div class="hienthi__column_1-1-noidung">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span class="hienthi__column_1-1-noidung-nd">Số 213 Lê Lợi,Hà Nội.</span>
                                </div>
                                
                                <div class="hienthi__column_1-2-noidung">
                                    <i class="fa-solid fa-phone"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">0987634523</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa-solid fa fa-envelope" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">ledong@gmail.com</span>
                                </div>
                            </div>

                            <div class="hienthi__column_1-2">
                                <h3 class="hienthi__column_1-2-tieude">Liên hệ với shop</h3>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Hướng dẫn đặt hàng.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Đổi trả sản phẩm.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Điều khoản và điều kiện thanh toán.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Chính sách giao hàng và nhân hàng.</span>
                                </div>
                                <div class="hienthi__column_1-2-noidung">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="hienthi__column_1-2-noidung-nd">Giới thiệu shop.</span>
                                </div>
                            </div>
                            <div class="hienthi__column_1-3">
                                <div class="hienthi__column_1-3-noidung">
                                        <img class="anhshop" src="img/anhshop.jpg" alt="ảnh shop">
                                </div>
                                <div class="hienthi__column_1-3-noidung">
                                        <img class="anhshop" src="img/anhshop2.jpg" alt="ảnh shop">
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </footer>