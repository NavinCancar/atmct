<?php

include('../connect.php');

// Xử lý khi người dùng bấm nút "Lưu"
if (isset($_POST['TA_SOHIEU']) ) {
    // Lấy các giá trị mới từ form
    $TA_SOHIEU = $_POST['TA_SOHIEU'];
    $TA_DIACHI = $_POST['TA_DIACHI'];
    $TA_VIDOX = $_POST['TA_VIDOX'];
    $TA_KINHDOY = $_POST['TA_KINHDOY'];
    $XP_MA = $_POST['XP_MA'];


        // Nếu ngân hàng tồn tại, thực hiện cập nhật thông tin
        $update_sql = "UPDATE TRU_ATM SET TA_DIACHI = '$TA_DIACHI', TA_VIDOX = '$TA_VIDOX', TA_KINHDOY = '$TA_KINHDOY',
         XP_MA = '$XP_MA' WHERE TA_SOHIEU = '$TA_SOHIEU'";
         echo  $update_sql;
       // echo $update_sql;
        if ($conn->query($update_sql) === TRUE) {
           // echo "Cập nhật thông tin ngân hàng thành công";
            header('Location: ../ds_truatm.php');
        } else {
            echo "Lỗi: " . $update_sql . "<br>" . $conn->error;
        }
} 
if (isset($_GET['check']) ) {
    $update_sql1 = "UPDATE PHONG_GIAO_DICH SET PGD_TT = 0 WHERE TA_SOHIEU = '".$_GET['sohieu']."'";
   // echo $update_sql;
    if ($conn->query($update_sql1) === TRUE) {
       // echo "Cập nhật thông tin ngân hàng thành công";
        header('Location: ../ds_truatm.php');
    } else {
        echo "Lỗi: " . $update_sql . "<br>" . $conn->error;
    }
}


// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>