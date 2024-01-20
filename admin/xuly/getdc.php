<?php
include('../connect.php');
if(isset($_POST['dc'])){
        $dc = $_POST['dc'];
        $xp = $_POST['xp'];
        $qh = "SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
        WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
        AND xa_phuong.XP_MA = $xp ";
    $result_qh = $conn->query($qh);
    $row_qh = $result_qh->fetch_assoc();
    $diachi = $dc . ', ' . $row_qh['XP_TEN'] . ', ' . $row_qh['QH_TEN'] . ', Cần thơ.';
    echo $diachi;
}
?>