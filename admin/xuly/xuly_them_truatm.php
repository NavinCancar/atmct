<?php

include('../connect.php');

// Kiểm tra nếu nút thêm ngân hàng được nhấn
if (isset($_POST['them_truatm'])) {
  // Lấy các giá trị từ form
  $TA_SOHIEU = $_POST['TA_SOHIEU'];
  $TA_DIACHI = $_POST['TA_DIACHI'];
  $TA_VIDOX = $_POST['TA_VIDOX'];
  $TA_KINHDOY = $_POST['TA_KINHDOY'];
  $XP_MA = $_POST['XP_MA'];
  $NH_MA = $_POST['NH_MA'];  
  
 // Kiểm tra xem số hiệu đã tồn tại hay chưa
 $sql = "SELECT * FROM TRU_ATM WHERE TA_SOHIEU = '$TA_SOHIEU'";
 $result = $conn->query($sql);

 $qh = "SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
 WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
 AND xa_phuong.XP_MA = '" .   $XP_MA . "' ";
 $nh = "SELECT NH_MA FROM ngan_hang";
$result_qh = $conn->query($qh);
$row_qh = $result_qh->fetch_assoc();

$dc =  $NH_DIACHI . ', ' . $row_qh['XP_TEN'] . ', ' . $row_qh['QH_TEN'] . ', Cần thơ.';
 echo $dc;
 if ($result->num_rows > 0) {
  echo '<script> alert ("Tên trụ atm đã tồn tại. Vui lòng chọn số hiệu khác.") </script>';
  header('Location: ../them_truatm.php');
} else {
  // Nếu số hiệu chưa tồn tại, thực hiện thêm mới
  $insert_sql = "INSERT INTO TRU_ATM ( TA_SOHIEU, TA_DIACHI, TA_VIDOX, TA_KINHDOY, XP_MA, NH_MA) VALUES ( '$TA_SOHIEU', '$TA_DIACHI', '$TA_VIDOX', '$TA_KINHDOY', '$XP_MA', '$NH_MA')";
  
  if ($conn->query($insert_sql) === TRUE) {
    echo '<script> alert ("Thêm trụ atm thành công") </script>';
    header('Location: ../ds_truatm.php');
  } else {
    echo "Lỗi: " . $insert_sql . "<br>" . $conn->error;
  }
}

                            
}

  // Đóng kết nối cơ sở dữ liệu
  $conn->close();
  
 ?>