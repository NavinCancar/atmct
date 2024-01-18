
<?php

include('../connect.php');

// Xử lý khi người dùng bấm nút "Lưu"
if (isset($_POST['them_atm'])) {
    // Lấy các giá trị mới từ form
    $NH_MA = $_POST['NH_MA'];
    $NH_TEN = $_POST['NH_TEN'];
    $NH_DIACHI = $_POST['NH_DIACHI'];
    $NH_SDT = $_POST['NH_SDT'];
    $NH_VIDOX = $_POST['NH_VIDOX'];
    $NH_KINHDOY = $_POST['NH_KINHDOY'];
    $XP_MA = $_POST['XP_MA'];

    // Kiểm tra xem ngân hàng đã tồn tại hay chưa
    $sql = "SELECT * FROM NGAN_HANG WHERE NH_MA = '$NH_MA'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Nếu ngân hàng tồn tại, thực hiện cập nhật thông tin
        $update_sql = "UPDATE NGAN_HANG SET NH_TEN = '$NH_TEN', NH_DIACHI = '$NH_DIACHI', NH_SDT = '$NH_SDT', NH_VIDOX = '$NH_VIDOX', NH_KINHDOY = '$NH_KINHDOY', XP_MA = '$XP_MA' WHERE NH_MA = '$NH_MA'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Cập nhật thông tin ngân hàng thành công";
        } else {
            echo "Lỗi: " . $update_sql . "<br>" . $conn->error;
        }
    } else {
        echo "Ngân hàng không tồn tại. Vui lòng kiểm tra lại.";
    }
   
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>