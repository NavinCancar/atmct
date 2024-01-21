<?php

include('../connect.php');

// Xử lý khi người dùng bấm nút "Lưu"
if (isset($_POST['PGD_TEN']) ) {
    // Lấy các giá trị mới từ form
    $PGD_MA = $_POST['PGD_MA'];
    $PGD_TEN = $_POST['PGD_TEN'];
    $PGD_DIACHI = $_POST['PGD_DIACHI'];
    $PGD_SDT = $_POST['PGD_SDT'];
    $PGD_VIDOX = $_POST['PGD_VIDOX'];
    $PGD_KINHDOY = $_POST['PGD_KINHDOY'];
    $XP_MA = $_POST['XP_MA'];

        // Nếu phòng giao dịch tồn tại, thực hiện cập nhật thông tin
        $update_sql = "UPDATE PHONG_GIAO_DICH SET PGD_TEN = '$PGD_TEN', PGD_DIACHI = '$PGD_DIACHI', 
        PGD_SDT = '$PGD_SDT', PGD_VIDOX = '$PGD_VIDOX', PGD_KINHDOY = '$PGD_KINHDOY',
         XP_MA = '$XP_MA' WHERE PGD_MA = '$PGD_MA'";
        echo $update_sql;
        if ($conn->query($update_sql) === TRUE) {
           // echo "Cập nhật thông tin phòng giao dịch thành công";
            header('Location: ../ds_phonggiaodich.php');
        } else {
            echo "Lỗi: " . $update_sql . "<br>" . $conn->error;
        }
} 
if (isset($_GET['check']) ) {
    $update_sql1 = "UPDATE PHONG_GIAO_DICH SET PGD_TT = 0 WHERE PGD_MA = '".$_GET['pgd']."'";
   // echo $update_sql;
    if ($conn->query($update_sql1) === TRUE) {
       // echo "Cập nhật thông tin phòng giao dịch thành công";
        header('Location: ../ds_phonggiaodich.php');
    } else {
        echo "Lỗi: " . $update_sql . "<br>" . $conn->error;
    }
}


// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>