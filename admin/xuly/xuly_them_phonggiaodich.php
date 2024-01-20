<?php

include('../connect.php');

// Kiểm tra nếu nút thêm ngân hàng được nhấn
if (isset($_POST['them_pgd'])) {
  // Lấy các giá trị từ form
  $PGD_TEN = $_POST['PGD_TEN'];
  $PGD_DIACHI = $_POST['PGD_DIACHI'];
  $PGD_SDT = $_POST['PGD_SDT'];
  $PGD_VIDOX = $_POST['PGD_VIDOX'];
  $PGD_KINHDOY = $_POST['PGD_KINHDOY'];
  $XP_MA = $_POST['XP_MA'];
  $NH_MA = $_POST['NH_MA'];
  
 // Kiểm tra xem tên đã tồn tại hay chưa
 $sql = "SELECT * FROM PHONG_GIAO_DICH WHERE PGD_TEN = '$PGD_TEN'";
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
  echo '<script> alert ("Tên phòng giao dịch đã tồn tại. Vui lòng chọn tên khác.") </script>';
  header('Location: ../them_phonggiaodich.php');
} else {
  // Nếu tên chưa tồn tại, thực hiện thêm mới
  $insert_sql = "INSERT INTO PHONG_GIAO_DICH ( PGD_TEN, PGD_DIACHI, PGD_SDT, PGD_VIDOX, PGD_KINHDOY, XP_MA, NH_MA) VALUES ( '$PGD_TEN', '$PGD_DIACHI', '$PGD_SDT', '$PGD_VIDOX', '$PGD_KINHDOY', '$XP_MA', '$NH_MA')";
  
  if ($conn->query($insert_sql) === TRUE) {
    echo '<script> alert ("Thêm phòng giao dịch thành công") </script>';
    header('Location: ../ds_phonggiaodich.php');
  } else {
    echo "Lỗi: " . $insert_sql . "<br>" . $conn->error;
  }
}

                            
}

  // Đóng kết nối cơ sở dữ liệu
  $conn->close();
  
 ?>