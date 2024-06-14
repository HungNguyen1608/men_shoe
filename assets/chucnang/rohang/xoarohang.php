<?php
        include("connect.php");
        if(isset($_GET["id"])){
            $delete_id = $_GET["id"];

            // Delete the customer record based on the delete_id
            $sql = "DELETE FROM rohang WHERE Marhang = '$delete_id'";
            $delete = mysqli_query($conn, $sql);

            if($delete){
                header("Location: hienthironhang.php");
            } else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    ?>
