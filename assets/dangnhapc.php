<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cssmenu.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/messenger.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
<div class="modal" style="justify-content: center;height: 100%;width: 100%; align-items: center;">
            <div class="modal__lammo">
            </div>
            <?php
        $conn = mysqli_connect("localhost", "root", "", "shopbangiay") or die("Kết nối SQL không thành công!");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dangnhap"])) {
            $tentaikhoan = $_POST["tentaikhoan"];
            $matkhau = $_POST["matkhau"];
            $checkExistQuery = "SELECT Mataikhoan, Phanquyen FROM taikhoan WHERE Tentaikhoan = '$tentaikhoan' AND Matkhau = '$matkhau' LIMIT 1";
            $checkExistResult = mysqli_query($conn, $checkExistQuery);
        
            if (mysqli_num_rows($checkExistResult) > 0) {
                $row = mysqli_fetch_assoc($checkExistResult);
                $mataikhoan = $row["Mataikhoan"];
                $phanquyen = $row["Phanquyen"];
                
                // Add the check for Phanquyen column
                if ($phanquyen == 1) {
                    header("Location: giaodienadmin.php?mataikhoan=" . $mataikhoan);
                } else {
                    header("Location: giaodientk.php?page_layout=sanphammoi&mataikhoan=" . $mataikhoan);
                }
                
                exit;
            } else {
                $tb= "Tên tài khoản hoặc mật khẩu không đúng.";
                // echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác');
				// window.location.href='dangnhapc.php';</script>";
            }
        }
        mysqli_close($conn);
    ?>
            <form method="POST" action="">

                <div class="modal__body">
                    <div class="modal__noidung">
                        <div>
                            <div class="modal__noidung-tieude">
                                <h2 class="modal__noidung-tieude-chinh">Đăng nhập</h2>
                                <sapm class="modal__noidung-tieude-chuyen"><a href="dangkyc.php" style="color:red;text-decoration: none;">Đăng ký</a></sapm>
                            </div>
                            <div class="modal__noidung-nhap">
                            <input minlength="4" maxlength="20" class="modal__noidung-text" type="text" placeholder="Nhập tên tài khoản" name="tentaikhoan">
                            </div>
                            <div class="modal__noidung-nhap">
                            <input  minlength="5" maxlength="50" class="modal__noidung-text" type="password" placeholder="Nhập mật khẩu" name="matkhau" required>
                            </div>
                            <div class="thongbao">
                                <h5 style="color:red;">
                                    <?php echo isset($tb) ? htmlspecialchars($tb) : ''; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="modal__noidung-link">
                            <a href="quenmk.php" class="modal__noidung-link-help-qmk">Quên Mật Khẩu</a>
                            <samp class="gach"></samp>
                            <a href="#" onclick="erroms();" class="modal__noidung-link-help">Cần Trợ Giúp</a>         
                         </div>
                        
                        <div class="modal__noidung-DN">
                            <button  class="btn"><a href="index.php?page_layout=sanpham" style="text-decoration: none;">TRỞ LẠI</a></button>
                            <button  name="dangnhap" class="btn btn--chinh" >ĐĂNG NHẬP</button>

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
                         <div id="measenger">
                             <div class="measenger"></div>
                         </div>
                        </div>
                    </div>
                </div>
            </form>
</div>
   
    
</body>
 <!--thoong bao measenger-->
 <!--thoong bao measenger-->
<script>
    function measenger({title='', msg='', type='info', duration= 30000000000}){
        const main=document.getElementById('measenger');
        // tạo main
        if(main){
            const measenger=document.createElement('div');
             //(tự động xóa thông báo) sau khi hiện ra hết thời gian duration thì mất hẳn 
            const tudongxoa = setTimeout (function(){
                main.removeChild(measenger);

            },duration)
            // xóa nthoong báo khi click vào icon
            measenger.onclick=function(e){
                if(e.target.closest('.measenger__close'))
                {
                    main.removeChild(measenger);

                }
            }
            // các icon
            const icon={
                thanhcong:'fa fa-check-circle',
                error:'fa fa-exclamation',
                loi:'fa fa-exclamation-circle',

            }

            measenger.classList.add('measenger',`measenger--${type}`);
            // cài thời gian nhạt
            const thoigianmat=(duration/1000).toFixed(2);
           // chuyển phần hiệu ứng sang html 
            measenger.style.animation=` animation: truot ease ${thoigianmat} ,modi linear 1s  3s forwards`;
            //    thêm vào measenger
            measenger.innerHTML=`
            <div class="measenger__icon">
                <i class="${icon[type]}" aria-hidden="true"></i>
            </div>
            <div class="measenger__body">
                <h3 class="measenger__title">${title}</h3>
                <p class="measenger__msg">${msg}</p>
            </div>
            <div class="measenger__close">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            `;
                main.appendChild(measenger);
        }
    }
    
    function erroms() {
        console.log('Error function called');
        measenger({
            title: 'Failure',
            msg: 'Tài khoản hoặc mật khẩu không chính xác!',
            type: 'error',
            duration: 3000
        });
    }
    

</script>

</html>
