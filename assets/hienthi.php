<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÔNG TIN SẢN PHẨM</title>
</head>
<body>
    <h1>CHỌN BẢNG CẦN HIỂN THỊ</h1>
    <from action="chinhsu.php" method="GET">
        <?php
            
            include("ketnoi.php");
            $sql="SELECT * FROM khach_hang";
            $query=mysqli_query($conn,$sql);

        ?>
        <div>
            <p>DANH SÁCH KHÁCH HÀNG</p>
            <a href="add.php">Them</a>
            <table border=1px>
                <tr>
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                </tr>
                <?php
                    while($rows=mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $rows['Ma_khach_hang'] ?></td>
                    <td><?php echo $rows['Ten_khach_hang'] ?></td>
                    <td><?php 
                    if($rows['Phai']==0)
                    {
                        echo "Nam";

                    }
                    else
                    {
                        echo"Nữ";
                    }           
                    ?></td>
                    <td><?php echo $rows['Dia_chi'] ?></td>
                    <td><?php echo $rows['Dien_thoai'] ?></td>
                    <td><?php echo $rows['Email'] ?></td>
                    <td><a href="chinhsu.php?id=<?php echo $rows['Ma_khach_hang']; ?>">Sữa</a></td>

                </tr>
                <?php
                }
                ?>
                
            </table>
        
        </div>
    </from>
    
</body>
</html>