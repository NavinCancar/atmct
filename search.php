<?php
include('connect.php');

if (isset($_POST['check']) && $_POST['check'] == 1) {
    $manh_arr = $_POST['manh_arr'];
    $manh_arr_str = implode(',', $manh_arr);
    $pgd = "SELECT DISTINCT * FROM phong_giao_dich WHERE NH_MA IN ($manh_arr_str)";
    $result_pgd = $conn->query($pgd);

    while ($row_pgd = $result_pgd->fetch_assoc()) {
        $ten_pgd = $row_pgd['PGD_TEN'] . ' - ' . $row_pgd['PGD_DIACHI'];
        echo '
            <div class="job-item p-4 mb-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded" src="img/gd.png" alt=""
                            style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h5 class="mb-3">
                               ' . $ten_pgd . '
                            </h5>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>';

                    $qh = "SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
                                                    WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
                                                    AND xa_phuong.XP_MA = '" . $row_pgd['XP_MA'] . "' ";
                    $result_qh = $conn->query($qh);
                    $row_qh = $result_qh->fetch_assoc();

                    $dc = $row_pgd['PGD_DIACHI'] . ', ' . $row_qh['XP_TEN'] . ', ' . $row_qh['QH_TEN'] . ', Cần thơ.';
                    echo $dc . '</span></div></div>
                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a class="btn btn-primary"
                                href="result.php?title=' . $ten_pgd . '&add=' . $dc . '&phone=' . $row_pgd['PGD_SDT'] . '&check=1&x=' . $row_pgd['PGD_VIDOX'] . '&y=' . $row_pgd['PGD_KINHDOY'] . '">Chi tiết</a>
                        </div>
                        <small class="text-truncate">
                            <i class="fas fa-phone"></i> &nbsp;' . $row_pgd['PGD_SDT'] . '</small>
                    </div>
                </div>
            </div>';
    }
}

if (isset($_POST['check']) && $_POST['check'] == 2) {
    $manh1_arr = $_POST['manh1_arr'];
    $manh1_arr_str = implode(',', $manh1_arr);
    $TA = "SELECT DISTINCT * FROM tru_atm WHERE NH_MA IN ($manh1_arr_str)";
    $result_TA = $conn->query($TA);
    $i=1;
    while ($row_TA = $result_TA->fetch_assoc()) {
        $ten_TA =$i. $row_TA['TA_SOHIEU'] . ' - ' . $row_TA['TA_DIACHI'];
        $i++;
        echo '
            <div class="job-item p-4 mb-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded" src="img/gd.png" alt=""
                            style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h5 class="mb-3"> Trụ &nbsp;
                               ' . $ten_TA . '
                            </h5>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>';

                    $qh = "SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
                                                    WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
                                                    AND xa_phuong.XP_MA = '" . $row_TA['XP_MA'] . "' ";
                    $result_qh = $conn->query($qh);
                    $row_qh = $result_qh->fetch_assoc();

                    $dc = $row_TA['TA_DIACHI'] . ', ' . $row_qh['XP_TEN'] . ', ' . $row_qh['QH_TEN'] . ', Cần thơ.';
                    echo $dc . '</span></div></div>
                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a class="btn btn-primary"
                                href="result.php?title=' . $ten_TA . '&add=' . $dc . '&check=2&x=' . $row_TA['TA_VIDOX'] . '&y=' . $row_TA['TA_KINHDOY'] . '">Chi tiết</a>
                        </div>
                       
                    </div>
                </div>
            </div>';
    }
}
if (isset($_POST['check']) && $_POST['check'] == 3) {
    $manh1_arr = $_POST['manh1_arr'];
    $manh1_arr_str = implode(',', $manh1_arr);
    $TA = "SELECT DISTINCT * FROM tru_atm WHERE NH_MA IN ($manh1_arr_str)";
    $result_TA = $conn->query($TA);
    $atm_arr =  [];
    while ($row_TA = $result_TA->fetch_assoc()) {
        $title = $row_TA['TA_SOHIEU'] . ' - ' . $row_TA['TA_DIACHI'];
        $qh ="SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
        WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
        AND xa_phuong.XP_MA = '".$row_TA['XP_MA']."' ";
        $result_qh = $conn->query($qh);
        $row_qh = $result_qh->fetch_assoc();
        $dc = $row_TA['TA_DIACHI'].', '.$row_qh['XP_TEN'].', '.$row_qh['QH_TEN'].', Cần thơ.';
        $atm = array(
            'title'=> $title,
            'dc' => $dc,
            'ta_vidox'=>$row_TA['TA_VIDOX'],
            'ta_kinhdoy'=>$row_TA['TA_KINHDOY'],
        );
        array_push($atm_arr,$atm);
    }
    echo json_encode($atm_arr,JSON_UNESCAPED_UNICODE);
    
}

if (isset($_POST['check']) && $_POST['check'] == 4) {
    $manh_arr = $_POST['manh_arr'];
    $manh_arr_str = implode(',', $manh_arr);
    $PGD = "SELECT DISTINCT * FROM phong_giao_dich WHERE NH_MA IN ($manh_arr_str)";
    $result_PGD = $conn->query($PGD);
    $pgd_arr =  [];
    while ($row_PGD = $result_PGD->fetch_assoc()) {
        $title = $row_PGD['PGD_TEN'] . ' - ' . $row_PGD['PGD_DIACHI'];
        $qh ="SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
        WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
        AND xa_phuong.XP_MA = '".$row_PGD['XP_MA']."' ";
        $result_qh = $conn->query($qh);
        $row_qh = $result_qh->fetch_assoc();
        $dc = $row_PGD['PGD_DIACHI'].', '.$row_qh['XP_TEN'].', '.$row_qh['QH_TEN'].', Cần thơ.';
        $pgd = array(
            'title'=> $title,
            'dc' => $dc,
            'sdt' => $row_PGD['PGD_SDT'],
            'pgd_vidox'=>$row_PGD['PGD_VIDOX'],
            'pgd_kinhdoy'=>$row_PGD['PGD_KINHDOY'],
        );
        array_push($pgd_arr,$pgd);
    }
    echo json_encode($pgd_arr,JSON_UNESCAPED_UNICODE);
    
}
?>