<!DOCTYPE html>
<html lang="en">

<head>
    <title>Phòng giao dịch & trụ ATM</title>
    <?php
        include('head.php');
    ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <?php
                include('nav.php');
        ?>
        </nav>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Phòng giao dịch & trụ ATM</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Phòng giao dịch & trụ ATM</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Transaction office Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Danh sách
                </h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                                href="#tab-1">
                                <h6 class="mt-n1 mb-0">Phòng giao dịch</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill"
                                href="#tab-2">
                                <h6 class="mt-n1 mb-0">ATM</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                                href="#tab-3">
                                <h6 class="mt-n1 mb-0">Ngân hàng</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content ">
                        <!-- Gan nhat -->
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <!-- Gan 1 -->
                            <div class="d-flex justify-content-start mb-3">
                                <button type="button" class="btn btn-success loc"><i class="fas fa-filter"></i>
                                    Lọc</button>
                            </div>
                            <div class="col-6 mb-4 border p-4 shadow p-3 mb-5  rounded" style="display: none" id="show">
                                <button type="button" class="btn-close close d-flex justify-content-end"></button>
                                <h6>Tìm phòng giao dịch theo ngân hàng</h6>
                                <form class="d-flex ">
                                    <input class="form-control me-2" list="datalistOptions" id="manh"
                                        placeholder="Nhâp vào ngân hàng " type="search">
                                    <datalist id="datalistOptions">
                                        <?php
                                                        $query = "SELECT * FROM `ngan_hang`";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row["NH_MA"].'">'.$row["NH_TEN"].'</option>';
                                                        }
                                                    ?>
                                    </datalist>
                                    <button class="btn btn-outline-success search">Tìm</button>
                                </form>
                                <p class="text-success d-flex justify-content-end mt-3"> Thêm &nbsp;<span><i
                                            class="fas fa-plus " id="plus"></i></span></p>
                                <p id="ds" class="d-flex justify-content-start" multiple></p>

                            </div>
                            <div id="listpgd">
                                <?php
                                        $pgd = "select * from phong_giao_dich";
                                        $result_pgd = $conn->query($pgd);
                                        while($row_pgd = $result_pgd->fetch_assoc()){
                                            $ten_pgd = $row_pgd['PGD_TEN'].' - '.$row_pgd['PGD_DIACHI'] ;?>
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="img/logo/<?php echo $row_pgd['NH_MA'] ;?>.png" alt=""
                                                style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">
                                                    <?php echo $ten_pgd?>
                                                </h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>
                                                    <?php $qh ="SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
                                                            WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
                                                            AND xa_phuong.XP_MA = '".$row_pgd['XP_MA']."' ";
                                                        $result_qh = $conn->query($qh);
                                                         $row_qh = $result_qh->fetch_assoc();
                                                        $dc = $row_pgd['PGD_DIACHI'].', '.$row_qh['XP_TEN'].', '.$row_qh['QH_TEN'].', Cần thơ.';
                                                        echo $dc;  ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">

                                                <a class="btn btn-primary"
                                                    href="result.php?bank=<?php echo $row_pgd['NH_MA']?>&title=<?php echo $ten_pgd?>&add=<?php echo $dc?>&phone=<?php echo $row_pgd['PGD_SDT']?>&check=1&x=<?php echo $row_pgd['PGD_VIDOX']?>&y=<?php echo $row_pgd['PGD_KINHDOY']?>">
                                                    Chi tiết</a>
                                            </div>
                                            <small class="text-truncate">
                                                <i class="fas fa-phone"></i> &nbsp;
                                                <?php echo $row_pgd['PGD_SDT'] ?></small>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                            <!-- Gan 2 -->
                            <a class="btn btn-primary py-3 px-5" href="">Xem thêm</a>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="d-flex justify-content-start mb-3">
                                <button type="button" class="btn btn-success tim"><i class="fas fa-filter"></i>
                                    Lọc</button>
                            </div>
                            <div class="col-6 mb-4 border p-4 shadow p-3 mb-5  rounded" style="display: none"
                                id="show1">
                                <button type="button" class="btn-close close1 d-flex justify-content-end"></button>
                                <h6>Tìm trụ ATM theo ngân hàng</h6>
                                <form class="d-flex ">
                                    <input class="form-control me-2" list="datalistOptions" id="manh1"
                                        placeholder="Nhâp vào ngân hàng " type="search">
                                    <datalist id="datalistOptions1">
                                        <?php
                                                        $query = "SELECT * FROM `ngan_hang`";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row["NH_MA"].'">'.$row["NH_TEN"].'</option>';
                                                        }
                                                    ?>
                                    </datalist>
                                    <button class="btn btn-outline-success search1">Tìm</button>
                                </form>
                                <p class="text-success d-flex justify-content-end mt-3"> Thêm &nbsp;<span><i
                                            class="fas fa-plus " id="plus1"></i></span></p>
                                <p id="ds1" class="d-flex justify-content-start" multiple></p>
                            </div>
                            <div id="listatm">
                                <!-- Noi 1 -->
                                <?php
                                        $atm = "select * from tru_atm";
                                        $result_atm = $conn->query($atm);
                                        $i = 1;
                                        while($row_atm = $result_atm->fetch_assoc()){
                                            
                                ?>
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="img/logo/<?php echo $row_atm['NH_MA'] ;?>.png" alt=""
                                                style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">
                                                    <?php
                                                     $tentru = 'Trụ &nbsp;'. $i.' - '.$row_atm['TA_SOHIEU'].' - '.$row_atm['TA_DIACHI'];$i++;
                                                     echo $tentru ?>
                                                </h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>
                                                    <?php $qh1 ="SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
                                                            WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
                                                            AND xa_phuong.XP_MA = '".$row_atm['XP_MA']."' ";
                                                        $result_qh1 = $conn->query($qh1);
                                                         $row_qh1 = $result_qh1->fetch_assoc();

                                                        $dc1 = $row_atm['TA_DIACHI'].', '.$row_qh1['XP_TEN'].', '.$row_qh1['QH_TEN'].', Cần thơ.';
                                                        echo $dc1;                                        
                                                            ?>
                                                </span>

                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-primary"
                                                    href="result.php?bank=<?php echo $row_atm['NH_MA']?>&title=<?php echo $tentru?>&add=<?php echo $dc?>&check=2&x=<?php echo $row_atm['TA_VIDOX']?>&y=<?php echo $row_atm['TA_KINHDOY']?>">
                                                    Chi tiết</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <!-- Noi 2 -->
                            </div>

                            <a class="btn btn-primary py-3 px-5" href="">Xem thêm</a>
                        </div>

                        <!-- All ===========================================================================-->
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <!-- All 1 -->
                            <?php
                                        $nh = "select * from ngan_hang";
                                        $result_nh = $conn->query($nh);
                                        while($row_nh = $result_nh->fetch_assoc()){
                                ?>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/logo/<?php echo $row_nh['NH_MA'] ;?>.png" alt=""
                                            style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">
                                                <?php echo $row_nh['NH_TEN'].' - '.$row_nh['NH_DIACHI'];?>
                                            </h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>
                                                <?php $qh2 ="SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
                                                            WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
                                                            AND xa_phuong.XP_MA = '".$row_nh['XP_MA']."' ";
                                                        $result_qh2 = $conn->query($qh2);
                                                         $row_qh2 = $result_qh2->fetch_assoc();

                                                        $dc2 = $row_nh['NH_DIACHI'].', '.$row_qh2['XP_TEN'].', '.$row_qh2['QH_TEN'].', Cần thơ.';
                                                        echo $dc2;
                                         
                                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-primary "
                                                href="list.php?manh=<?php echo $row_nh['NH_MA']?>&check=1&tennh=<?php echo $row_nh['NH_TEN']?>">Các phòng
                                                giao dịch </a> &nbsp;

                                            <a class="btn btn-primary"
                                                href="list.php?manh=<?php echo $row_nh['NH_MA']?>&check=2&tennh=<?php echo $row_nh['NH_TEN']?>">Các cây
                                                ATM</a>
                                        </div>
                                        <small class="text-truncate">
                                            <i class="fas fa-phone"></i> &nbsp;
                                            <?php echo $row_nh['NH_SDT'] ?></small>
                                    </div>
                                </div>
                            </div>
                            <!--All 2-->
                            <?php }?>
                            <a class="btn btn-primary py-3 px-5" href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Transaction office End -->

        <!-- Footer Start -->
        <?php
                include('footer.php');
        ?>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-orange btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script>
    $(document).ready(function() {
        $(".tim").on("click", function() {
            $("#show1").css("display", "block");
            $(".close1").on("click", function() {
                $("#show1").css("display", "none");
            });
        });

        var manh1_arr = [];
        $("#plus1").on("click", function() {
            var manh1 = $("#manh1").val();
            if (manh1_arr.indexOf(manh1) === -1) {
                manh1_arr.push(manh1);
                var tennh1 = $("#datalistOptions1 option[value='" + manh1 + "']")
                    .text();
                $("#ds1").append('<option value="' + manh1 + '">' + tennh1 +
                    '</option>');
            }
            $(".search1").on("click", function(e) {
                e.preventDefault();
                $.post('search.php', {
                    manh1_arr: manh1_arr,
                    check: 2
                }, function(data) {
                    $('#listatm').html(data);
                    manh1_arr = [];
                    $("#ds1").empty();
                });

            });
        });

        $(".loc").on("click", function() {
            $("#show").css("display", "block");
            $(".close").on("click", function() {
                $("#show").css("display", "none");
            });
        });
        var manh_arr = [];
        $("#plus").on("click", function() {
            var manh = $("#manh").val();
            if (manh_arr.indexOf(manh) === -1) {
                manh_arr.push(manh);
                var tennh = $("#datalistOptions option[value='" + manh + "']")
                    .text();
                $("#ds").append('<option value="' + manh + '">' + tennh +
                    '</option>');
            }
            $(".search").on("click", function(e) {
                e.preventDefault();
                $.post('search.php', {
                    manh_arr: manh_arr,
                    check: 1
                }, function(data) {
                    $('#listpgd').html(data);
                    manh_arr = [];
                    $("#ds").empty();
                });

            });
        });
    });
    </script>
</body>

</html>