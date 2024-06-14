<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HDBshop! | </title>
    <!-- Bootstrap -->
    <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>HDBshop!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">     
                <h2>
                     <?php
                                        // Get the value of mataikhoan from the URL
                                        $mataikhoan = $_GET['mataikhoan'];
                                        $conn = mysqli_connect("localhost","root","","shopbangiay");

                                        // Check the connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        // Query the taikhoan table to retrieve Tentaikhoan
                                        $sql = "SELECT Tentaikhoan FROM taikhoan WHERE Mataikhoan = $mataikhoan";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output the Tentaikhoan value
                                            while($row = $result->fetch_assoc()) {
                                                echo "Xin chào ".$row["Tentaikhoan"];
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        $conn->close();
                     ?>
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page_layout=qlsanpham&mataikhoan=<?php echo $mataikhoan; ?>">Giày</a></li>
                      <li><a href="?page_layout=phukien&mataikhoan=<?php echo $mataikhoan; ?>">Phụ kiện</a></li>
                      <li><a href="?page_layout=quanlynhaphang&mataikhoan=<?php echo $mataikhoan; ?>">Nhập hàng</a></li>
                      <li><a href="?page_layout=nhapphukien&mataikhoan=<?php echo $mataikhoan; ?>">Nhập phụ kiện</a></li>
                      <li><a href="?page_layout=qlloaisp&mataikhoan=<?php echo $mataikhoan; ?>">Loại hàng</a></li>
                      <li><a href="?page_layout=thongtinnhap&mataikhoan=<?php echo $mataikhoan; ?>">Thông tin nhập hàng</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Thống kê bán hàng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page_layout=qlbanhang&mataikhoan=<?php echo $mataikhoan; ?>">Quản lý bán hàng</a></li>
                      <li><a href="?page_layout=qlbanpk&mataikhoan=<?php echo $mataikhoan; ?>">Quản lý bán phụ kiện</a></li>
                      <li><a href="?page_layout=thongkebanhang&mataikhoan=<?php echo $mataikhoan;?>">Doanh thu</a></li>
                      <li><a href="?page_layout=ttgiaohang&mataikhoan=<?php echo $mataikhoan; ?>">Thông tin các đơn giao hàng</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Quản lý tài khoản <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page_layout=qltaikhoan&mataikhoan=<?php echo $mataikhoan; ?>">Thông tin tài khoản</a></li>
                      <li><a href="?page_layout=thongtinkhachang&mataikhoan=<?php echo $mataikhoan; ?>">Thông tin khách hàng</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Góp ý <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page_layout=khieunai&mataikhoan=<?php echo $mataikhoan; ?>">Ý kiến khách hàng</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Quản lý nhà cung câp <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page_layout=ttncc&mataikhoan=<?php echo $mataikhoan; ?>">Thông tin nhà cung cấp</a></li>
                      <li><a href="?page_layout=themncc&mataikhoan=<?php echo $mataikhoan; ?>">Thêm Nhà cung cấp</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="giaodientk.php?mataikhoan=<?php echo $mataikhoan; ?>">giao diện shop</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="index.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt=""><?php
                                        // Get the value of mataikhoan from the URL
                                        $mataikhoan = $_GET['mataikhoan'];
                                        $conn = mysqli_connect("localhost","root","","shopbangiay");

                                        // Check the connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        // Query the taikhoan table to retrieve Tentaikhoan
                                        $sql = "SELECT Tentaikhoan FROM taikhoan WHERE Mataikhoan = $mataikhoan";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output the Tentaikhoan value
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["Tentaikhoan"];
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        $conn->close();
                     ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          <div>
                    <?php
                        if(isset($_GET['page_layout'])){
                            switch($_GET['page_layout']){
                                case 'qltaikhoan': include_once('chucnang/Admin/qltaikhoan.php'); break;
                                case 'qlsanpham': include_once('chucnang/Admin/qlsanpham.php'); break;
                                case 'qlloaisp': include_once('chucnang/Admin/qlloaisp.php'); break;
                                case 'quanlynhaphang': include_once('chucnang/Admin/qlnhaphang.php'); break;
                                case 'thongke': include_once('chucnang/Admin/thongkebanhang.php'); break;
                                case 'thongtinkhachang': include_once('chucnang/Admin/thongtinkhachhang.php'); break;
                                case 'qlbanhang': include_once('chucnang/Admin/qlbanhang.php'); break;
                                case 'qlbanpk': include_once('chucnang/Admin/qlbanpk.php'); break;
                                case 'thongkebanhang': include_once('chucnang/Admin/thongkebanhang.php'); break;
                                case 'khieunai': include_once('chucnang/Admin/khieunai.php'); break;
                                case 'ttncc': include_once('chucnang/Admin/thongtinncc.php'); break;
                                case 'themncc': include_once('chucnang/Admin/themncc.php'); break;
                                case 'suattgiay': include_once('chucnang/Admin/suattgiay.php'); break;
                                case 'phukien': include_once('chucnang/Admin/qlphukien.php'); break;
                                case 'nhapphukien': include_once('chucnang/Admin/nhappk.php'); break;
                                case 'thongtinnhap': include_once('chucnang/Admin/thongtinnhap.php'); break;
                                case 'ttgiaohang': include_once('chucnang/Admin/huygiaohang.php'); break;
                                default:
                                    include_once('chucnang/Admin/qlsanpham.php');
                            }
                        } else {
                            include_once('chucnang/Admin/qlsanpham.php');
                        }
                    ?>
                    </div>
          </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script src="admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin/vendors/fastclick/lib/fastclick.js"></script>
    <script src="admin/build/js/custom.min.js"></script>
  </body>
</html>