<?php

include('../connect.php');

// Kiểm tra nếu nút thêm ngân hàng được nhấn
if (isset($_POST['them_atm'])) {
  // Lấy các giá trị từ form
  $NH_TEN = $_POST['NH_TEN'];
  $NH_DIACHI = $_POST['NH_DIACHI'];
  $NH_SDT = $_POST['NH_SDT'];
  $NH_VIDOX = $_POST['NH_VIDOX'];
  $NH_KINHDOY = $_POST['NH_KINHDOY'];
  $XP_MA = $_POST['XP_MA'];
  
 // Kiểm tra xem tên đã tồn tại hay chưa
 $sql = "SELECT * FROM NGAN_HANG WHERE NH_TEN = '$NH_TEN'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
  echo '<script> alert ("Tên ngân hàng đã tồn tại. Vui lòng chọn tên khác.") </script>';
  header('Location: ../them_nganhang.php');
} else {
  // Nếu tên chưa tồn tại, thực hiện thêm mới
  $insert_sql = "INSERT INTO NGAN_HANG ( NH_TEN, NH_DIACHI, NH_SDT, NH_VIDOX, NH_KINHDOY, XP_MA) VALUES ( '$NH_TEN', '$NH_DIACHI', '$NH_SDT', '$NH_VIDOX', '$NH_KINHDOY', '$XP_MA')";
  
  if ($conn->query($insert_sql) === TRUE) {
    echo '<script> alert ("Thêm ngân hàng thành công") </script>';
    header('Location: ../ds_nganhang.php');
  } else {
    echo "Lỗi: " . $insert_sql . "<br>" . $conn->error;
  }
}

                            
}

  // Đóng kết nối cơ sở dữ liệu
  $conn->close();
  
 ?>