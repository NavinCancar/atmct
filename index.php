<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <?php
        include('head.php');
    ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <?php
                include('nav.php');
            ?>
        </nav>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="row mb-5">
            <div class="col-sm-2 animated slideInDown">
                <div class="my-5 pt-5 pb-4">
                    <img src="img/logo.png" class="pt-5" width="180px" style="right: 0; position: absolute;">
                </div>
            </div>
            <div class="container-xxl py-5 bg-dark banner mb-5 col-sm-10 animated slideInUp">
                <div class="container my-5 pt-5 pb-4 text-center">
                    <h1 class="display-3 text-white mb-3 pt-5">ATM Cần Thơ</h1>
                    <h4 class="text-light pb-5">Khám phá mạng lưới ATM và ngân hàng tại Cần Thơ cùng chúng tôi!</h4>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Map Start -->
        <div class="container-fluid p-0">
            <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Mạng lưới cây ATM và phòng giao dịch tại Cần Thơ</h1>
            <div class="row">
                <div class="col-md-4 d-flex">
                    <h5 class="px-5 text-primary mx-auto">Tìm kiếm:</h5>
                </div>
                <div class="col-md-4">
                    <button data-bs-toggle="collapse" data-bs-target="#pgdcoll" id="pgd-btn"
                        class="btn btn-primary px-5 w-100">Phòng giao dịch</button>
                </div>
                <div class="col-md-4">
                    <button data-bs-toggle="collapse" data-bs-target="#atmcoll" id="atm-btn"
                        class="btn btn-primary px-5 w-100">Trụ ATM</button>
                </div>

                <div id="pgdcoll" class="collapse">
                    <!-- Search Start -->
                    <div class="container-fluid bg-primary" style="padding: 35px; opacity: 95%;">
                        <div class="container">
                            <form action="pgdrouting.php" method="get" id="pgd-form">
                                <div class="row g-2">
                                    <div class="col-md-9">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <input type="number" min="0" class="form-control border-0"
                                                    name="khoangcach" required=""
                                                    placeholder="Khoảng cách (km) tối đa cần tìm (*)" />
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-select border-0" name="nganhang">
                                                    <option value="0" selected>Thuộc ngân hàng</option>
                                                    <?php
                                                        $query = "SELECT * FROM `ngan_hang`";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row["NH_MA"].'">'.$row["NH_TEN"].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" id="pgd-sb" class="btn btn-orange border-0 w-100">Tìm
                                            phòng giao dịch</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Search End -->
                </div>

                <div id="atmcoll" class="collapse">
                    <!-- Search Start -->
                    <div class="container-fluid bg-primary" style="padding: 35px; opacity: 95%;">
                        <div class="container">
                            <form action="atmrouting.php" method="get" id="atm-form">
                                <div class="row g-2">
                                    <div class="col-md-9">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <input type="number" min="0" class="form-control border-0" required=""
                                                    name="khoangcach"
                                                    placeholder="Khoảng cách (km) tối đa cần tìm (*)" />
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-select border-0" name="nganhang" required="">
                                                    <option value="0" selected>Chấp nhận thẻ ngân hàng (*)</option>
                                                    <?php
                                                        $query = "SELECT * FROM `ngan_hang`";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row["NH_MA"].'">'.$row["NH_TEN"].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-select border-0" name="dichvu">
                                                    <option value="0" selected>Có cung cấp dịch vụ</option>
                                                    <?php
                                                        $query = "SELECT * FROM `dich_vu`";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row["DV_MA"].'">'.$row["DV_TEN"].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <p class="text-center text-white mt-2">Giá dịch vụ:</p>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control border-0" name="dichvumin"
                                                    id="dichvumin" min="0" placeholder="Từ: (VNĐ)" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control border-0" name="dichvumax"
                                                    id="dichvumax" min="0" placeholder="Đến: (VNĐ)" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" id="atm-sb" class="btn btn-orange border-0 w-100">Tìm trụ
                                            ATM</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Search End -->
                </div>
            </div>
            
            <div class="d-flex">
                <div id="mySidebar" class="sidebar" style="max-width: 250px">
                    <div id="list-location" style="max-height: 35rem; overflow-y: auto;">
                        <!--<div class="card text-dark m-1 p-2">
                            <h6>Ngân hàng Agribank - 280 Phạm Hùng</h6>
                            <p><i class="fas fa-map-marker-alt"></i> &nbsp; 280 Phạm Hùng, Lê Bình, Cái Răng, TP Cần Thơ</p>
                            <p class="m-0"><i class="fas fa-motorcycle"></i> Cách bạn <b>10km</b> và cần <b>20p</b> di chuyển</p>
                            <div class="d-flex">
                                <a  class="findRoute card-link text-primary p-0" style="margin-top: auto; margin-bottom: auto">
                                    <i class="fas fa-directions fs-4"></i>&nbsp; Tìm đường
                                </a>
                                <img src="img/logo/1.png" width="50px" class="float-end" style="margin-left: auto">
                            </div>
                        </div>-->
                    </div>
                </div>
                <!-- Map -->
                <div id="map-container" class="flex-grow-1 d-flex p-0">
                    <button class="btn btn-orange" onclick="toggleNav()"><i id="iconToggle" class="fas fa-chevron-left"></i></button>
                    <div id="map" style="border:1px; width: 100%; height: 35rem" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></div>
                </div>
            </div>
        </div>
        <!-- Map End -->

        <!-- Transaction office Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Danh sách phòng giao dịch
                </h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                                href="#tab-1">
                                <h6 class="mt-n1 mb-0">Gần nhất</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill"
                                href="#tab-2">
                                <h6 class="mt-n1 mb-0">Nổi bật</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                                href="#tab-3">
                                <h6 class="mt-n1 mb-0">Tất cả</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Gan nhat -->
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <!-- Gan 1 -->
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg"
                                            alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Software Engineer</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>New York,
                                                USA</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt text-primary me-2"></i>$123 -
                                                $456</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i
                                                    class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="">Chi tiết</a>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan,
                                            2045</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Gan 2 -->
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-5.jpg"
                                            alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Wordpress Developer</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>New York,
                                                USA</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt text-primary me-2"></i>$123 -
                                                $456</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i
                                                    class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="">Chi tiết</a>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan,
                                            2045</small>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary py-3 px-5" href="">Xem thêm</a>
                        </div>

                        <!-- Noi bat -->
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <!-- Noi 1 -->
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg"
                                            alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Software Engineer</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>New York,
                                                USA</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt text-primary me-2"></i>$123 -
                                                $456</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i
                                                    class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="">Chi tiết</a>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan,
                                            2099</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Noi 2 -->
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg"
                                            alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Marketing Manager</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>New York,
                                                USA</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt text-primary me-2"></i>$123 -
                                                $456</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i
                                                    class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="">Chi tiết</a>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan,
                                            2045</small>
                                    </div>
                                </div>
                            </div>

                            <a class="btn btn-primary py-3 px-5" href="">Xem thêm</a>
                        </div>

                        <!-- All -->
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <!-- All 1 -->
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg"
                                            alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Marketing Manager</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>New York,
                                                USA</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt text-primary me-2"></i>$123 -
                                                $456</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i
                                                    class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="">Chi tiết</a>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan,
                                            2045</small>
                                    </div>
                                </div>
                            </div>
                            <!--All 2-->
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-3.jpg"
                                            alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Product Designer</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>New York,
                                                USA</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt text-primary me-2"></i>$123 -
                                                $456</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i
                                                    class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="">Chi tiết</a>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan,
                                            2045</small>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary py-3 px-5" href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Transaction office End -->


        <!-- Bank Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Các ngân hàng nổi bật</h1>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                            <h6 class="mb-3">Marketing</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h6 class="mb-3">Customer Service</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h6 class="mb-3">Human Resource</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                            <h6 class="mb-3">Project Management</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                            <h6 class="mb-3">Business Development</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                            <h6 class="mb-3">Sales & Communication</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                            <h6 class="mb-3">Teaching & Education</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                            <h6 class="mb-3">Design & Creative</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bank End -->


        <!-- Analysis Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4 orange-text">Thống kê</h1>
                        <p class="mb-4">Các thống kê dựa trên cơ sở dữ liệu của các trụ ATM thuộc các ngân hàng tại
                            thành phố mở ra cái nhìn về:</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Tổng quan về mạng lưới ATM của các ngân hàng.
                        </p>
                        <p><i class="fa fa-check text-primary me-3"></i>Thông tin chi tiết về số lượng trụ ATM theo đơn
                            vị hành chính quận/huyện.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Cung cấp thông tin và lựa chọn cho người dùng để
                            nắm bắt tình hình và tìm kiếm thông tin theo nhu cầu cụ thể.</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">Xem thống kê ngay</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Analysis End -->


        <!-- Footer Start -->
        <?php
            include('footer.php');
        ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-orange btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>




    <!-- SCRIPT XỬ LÝ GIAO DIỆN -->
    <script>
        $(document).ready(function(){
            $('#pgdcoll, #atmcoll').on('show.bs.collapse', function () {
                $('#pgdcoll, #atmcoll').not(this).collapse('hide');
            });

            //***************************************************************************
            //KIỂM TRA FORM PGD CHANGE START
            
            //Disabled 1 số thuộc tính khi được tải
            var pgdSubmitButton = document.getElementById('pgd-sb');
            pgdSubmitButton.disabled = true;

            $("#pgd-form").change(function () {
                var pgdForm = document.getElementById('pgd-form');
                var khoangcachInput = pgdForm.querySelector('input[name="khoangcach"]').value;
                var nganhangSelect = pgdForm.querySelector('select[name="nganhang"]').value;

                //console.log(khoangcachInput + ', ' + nganhangSelect);

                if(khoangcachInput != "" ) {
                    pgdSubmitButton.disabled = false;
                }
            });
            //KIỂM TRA FORM PGD CHANGE END
            //***************************************************************************
            //***************************************************************************
            //KIỂM TRA FORM ATM CHANGE START
            
            //Disabled 1 số thuộc tính khi được tải
            var atmSubmitButton = document.getElementById('atm-sb');
            var dvminInput = document.getElementById('dichvumin');
            var dvmaxInput = document.getElementById('dichvumax');
            atmSubmitButton.disabled = true;
            dvminInput.disabled = true;
            dvmaxInput.disabled = true;

            $("#atm-form").change(function () {
                var atmForm = document.getElementById('atm-form');
                var khoangcachInput = atmForm.querySelector('input[name="khoangcach"]').value;
                var nganhangSelect = atmForm.querySelector('select[name="nganhang"]').value;
                var dichvuSelect = atmForm.querySelector('select[name="dichvu"]').value;
                var dichvuminInput = atmForm.querySelector('input[name="dichvumin"]').value;
                var dichvumaxInput = atmForm.querySelector('input[name="dichvumax"]').value;

                //console.log(khoangcachInput + ', ' + nganhangSelect + ', ' + dichvuSelect + ', ' + dichvuminInput + ', ' + dichvumaxInput);

                /*function enableSearchButton() {
                    atmSubmitButton.classList.remove('disabled');
                }
                function disableSearchButton() {
                    atmSubmitButton.classList.add('disabled');
                }*/
                if(dichvuSelect != 0){
                    //atmSubmitButton.classList.add('disabled');
                    atmSubmitButton.disabled = true;
                    dvminInput.disabled = false;
                    if(dichvuminInput != ""){
                        dvmaxInput.disabled = false;
                    }
                }

                if((khoangcachInput != "" && nganhangSelect != 0 && dichvuSelect == 0) || 
                    (khoangcachInput != "" && nganhangSelect != 0 && dichvuSelect != 0 && dichvuminInput != "" && dichvumaxInput != "" && dichvumaxInput>=dichvuminInput)){
                    //atmSubmitButton.classList.remove('disabled');
                    atmSubmitButton.disabled = false;
                }
            });
            //KIỂM TRA FORM ATM CHANGE END
            //***************************************************************************
        });
    </script>

    <!-- SCRIPT XỬ LÝ BẢN ĐỒ -->
    <script>
        $(document).ready(function () {
            //***************************************************************************
            //KHAI BÁO BAN ĐẦU
            //***************************************************************************
            var findRouting = null;

            //***************************************************************************
            //SETUP ICON
            //***************************************************************************
            var customPopup = {
                'maxWidth': '500',
                'className': 'custom'
            };

            var NHIcon = L.Icon.extend({
                options: {
                    shadowUrl: 'img/light.png',
                    iconSize:     [48, 60],
                    shadowSize:   [60, 46],
                    iconAnchor:   [23.5, 52],
                    shadowAnchor: [29, 18],
                    popupAnchor:  [-3, -76]
                }
            });

            var PGDIcon = L.Icon.extend({
                options: {
                    shadowUrl: 'img/shadow.png',
                    iconSize:     [38, 48],
                    shadowSize:   [50, 38],
                    iconAnchor:   [18, 42],
                    shadowAnchor: [25, 30],
                    popupAnchor:  [-3, -76]
                }
            });

            var ATMIcon = L.Icon.extend({
                options: {
                    shadowUrl: 'img/shadow.png',
                    iconSize:     [32, 45],
                    shadowSize:   [50, 38],
                    iconAnchor:   [0, 42],
                    shadowAnchor: [12, 30],
                    popupAnchor:  [-3, -76]
                }
            });

            //***************************************************************************
            //LẤY VỊ TRÍ NGƯỜI DÙNG -> XỬ LÝ
            //***************************************************************************
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position){
                    var ulatitude = position.coords.latitude;
                    var ulongitude = position.coords.longitude;

                    //----------------------------------------------------------------
                    //Gọi map
                    var mapOptions = {
                        center: [ulatitude, ulongitude],
                        zoom: 15
                    };
                    
                    var map = new L.map('map', mapOptions);
                    
                    var layer = new
                    L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                    
                    map.addLayer(layer);
                    
                    //----------------------------------------------------------------
                    // Hiển thị vị trí người dùng
                    var userPolyline = L.polyline([[ulatitude, ulongitude], [ulatitude, ulongitude]], { color: 'red', weight: 30 }).addTo(map);
                    userPolyline.bindPopup('Vị trí của bạn').openPopup();        

                    <?php $newlatitude=0; $newlongitude=0; $count=0; ?>
                    //***************************************************************************
                    //GỌI NGÂN HÀNG START
                    <?php
                        $query = "SELECT * FROM `ngan_hang` JOIN  `xa_phuong` ON `xa_phuong`.`XP_MA` = `ngan_hang`.`XP_MA`
                                                            JOIN  `quan_huyen` ON `xa_phuong`.`QH_MA` = `quan_huyen`.`QH_MA`";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){ ?>
                            var pgdIcon = new NHIcon({iconUrl: "img/pgd/<?php echo $row["NH_MA"]; ?>.png"});
                            var marker = L.marker([<?php echo $row["NH_VIDOX"]; ?>, <?php echo $row["NH_KINHDOY"]; ?>],{icon: pgdIcon}).addTo(map);
                            marker.bindPopup(
                                '<div class="row">' +
                                ' <h5>Ngân hàng <?php echo $row["NH_TEN"].' - '.$row["NH_DIACHI"];?></h5>' +
                                '<p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["NH_DIACHI"].', '.$row["XP_TEN"].', '.$row["QH_TEN"].', TP Cần Thơ'?></p>' +
                                '<div class="col-5">' +
                                '<p><i class="fas fa-phone"></i> <?php echo $row["NH_SDT"];?></p>' +
                                '<a class="findRoute"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
                                '</div>' +
                                '<div class = "col-7" >' +
                                ' <img src = "img/logo/<?php echo $row["NH_MA"]; ?>.png" width = "70px" class="float-end">' +
                                '</div>',
                                customPopup
                            );
                            //----------------------------------------------------------------
                            // CALL LIST START
                            getValue(<?php echo $row["NH_VIDOX"]; ?>, <?php echo $row["NH_KINHDOY"]; ?>, function(khoangcach, thoigian) {
                                const htmlResult = `
                                <div class="card text-dark m-1 p-2">
                                    <h6>Ngân hàng <?php echo $row["NH_TEN"]; ?> - <?php echo $row["NH_DIACHI"]; ?></h6>
                                    <p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["NH_DIACHI"]; ?>, <?php echo $row["XP_TEN"]; ?>, <?php echo $row["QH_TEN"]; ?>, TP Cần Thơ</p>
                                    <p class="m-0"><i class="fas fa-motorcycle"></i> Cách bạn <b>${khoangcach} km</b> và cần <b>${thoigian} phút</b> di chuyển</p>
                                    <div class="d-flex">
                                        <a class="findRoute card-link text-primary p-0" style="margin-top: auto; margin-bottom: auto">
                                            <i class="fas fa-directions fs-4"></i>&nbsp; Tìm đường
                                        </a>
                                        <img src="img/logo/<?php echo $row["NH_MA"]; ?>.png" width="50px" class="float-end" style="margin-left: auto">
                                    </div>
                                </div>
                                `;
                                const listLocationDiv = document.getElementById('list-location');
                                listLocationDiv.innerHTML += htmlResult;
                            });
                            // CALL LIST END
                            //----------------------------------------------------------------
                            //----------------------------------------------------------------
                            // CLICK -> ROUTING START
                            marker.on("click", function() {
                                var markerId = <?php echo $row["NH_MA"]; ?>;
                                var latitude = <?php echo $row["NH_VIDOX"]; ?>;
                                var longitude = <?php echo $row["NH_KINHDOY"]; ?>;
                                $('.findRoute').on("click", function() {
                                    handleMarkerClick(markerId, latitude, longitude);
                                })
                                //
                                //console.log(markerId + ' , ' + latitude + ' , ' + longitude );
                            });
                            // CLICK -> ROUTING END
                            //----------------------------------------------------------------
                            //----------------------------------------------------------------
                            //THU THẬP TOẠ ĐỘ -> TÍNH TRUNG BÌNH
                            <?php $newlatitude+=$row["NH_VIDOX"]; $newlongitude+=$row["NH_KINHDOY"]; $count++; ?>
                            //----------------------------------------------------------------
                    <?php } ?>
                    //GỌI NGÂN HÀNG END
                    //***************************************************************************
                    //***************************************************************************
                    //GỌI PGD START
                    <?php
                        $query = "SELECT * FROM `phong_giao_dich`  JOIN  `xa_phuong` ON `xa_phuong`.`XP_MA` = `phong_giao_dich`.`XP_MA`
                                                                    JOIN  `quan_huyen` ON `xa_phuong`.`QH_MA` = `quan_huyen`.`QH_MA`";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){ ?>
                            var pgdIcon = new PGDIcon({iconUrl: "img/pgd/<?php echo $row["NH_MA"]; ?>.png"});
                            var marker = L.marker([<?php echo $row["PGD_VIDOX"]; ?>, <?php echo $row["PGD_KINHDOY"]; ?>],{icon: pgdIcon}).addTo(map);
                            marker.bindPopup(
                                '<div class="row">' +
                                ' <h5><?php echo $row["PGD_TEN"].' - '.$row["PGD_DIACHI"];?></h5>' +
                                '<p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["PGD_DIACHI"].', '.$row["XP_TEN"].', '.$row["QH_TEN"].', TP Cần Thơ'?></p>' +
                                '<div class="col-5">' +
                                '<p><i class="fas fa-phone"></i> <?php echo $row["PGD_SDT"];?></p>' +
                                '<a class="findRoute"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
                                '</div>' +
                                '<div class = "col-7" >' +
                                ' <img src = "img/logo/<?php echo $row["NH_MA"]; ?>.png" width = "70px" class="float-end">' +
                                '</div>',
                                customPopup
                            );
                            //----------------------------------------------------------------
                            // CALL LIST START
                            getValue(<?php echo $row["PGD_VIDOX"]; ?>, <?php echo $row["PGD_KINHDOY"]; ?>, function(khoangcach, thoigian) {
                                const htmlResult = `
                                    <div class="card text-dark m-1 p-2">
                                        <h6><?php echo $row["PGD_TEN"]; ?> - <?php echo $row["PGD_DIACHI"]; ?></h6>
                                        <p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["PGD_DIACHI"]; ?>, <?php echo $row["XP_TEN"]; ?>, <?php echo $row["QH_TEN"]; ?>, TP Cần Thơ</p>
                                        <p class="m-0"><i class="fas fa-motorcycle"></i> Cách bạn <b>${khoangcach} km</b> và cần <b>${thoigian} phút</b> di chuyển</p>
                                        <div class="d-flex">
                                            <a  class="findRoute card-link text-primary p-0" style="margin-top: auto; margin-bottom: auto">
                                                <i class="fas fa-directions fs-4"></i>&nbsp; Tìm đường
                                            </a>
                                            <img src="img/logo/<?php echo $row["NH_MA"]; ?>.png" width="50px" class="float-end" style="margin-left: auto">
                                        </div>
                                    </div>
                                `;
                                const listLocationDiv = document.getElementById('list-location');
                                listLocationDiv.innerHTML += htmlResult;
                            });
                            // CALL LIST END
                            //----------------------------------------------------------------
                            //----------------------------------------------------------------
                            // CLICK -> ROUTING START
                            marker.on("click", function() {
                                var markerId = <?php echo $row["PGD_MA"]; ?>;
                                var latitude = <?php echo $row["PGD_VIDOX"]; ?>;
                                var longitude = <?php echo $row["PGD_KINHDOY"]; ?>;
                                $('.findRoute').on("click", function() {
                                    handleMarkerClick(markerId, latitude, longitude);
                                })
                                //
                                //console.log(markerId + ' , ' + latitude + ' , ' + longitude );
                            });
                            // CLICK -> ROUTING END
                            //----------------------------------------------------------------
                            //----------------------------------------------------------------
                            //THU THẬP TOẠ ĐỘ -> TÍNH TRUNG BÌNH
                            <?php $newlatitude+=$row["PGD_VIDOX"]; $newlongitude+=$row["PGD_KINHDOY"]; $count++; ?>
                            //----------------------------------------------------------------
                    <?php } ?>
                    //GỌI PGD END
                    //***************************************************************************
                    //***************************************************************************
                    //GỌI ATM START
                    <?php
                        $query = "SELECT * FROM `tru_atm`  JOIN  `xa_phuong` ON `xa_phuong`.`XP_MA` = `tru_atm`.`XP_MA`
                                                            JOIN  `quan_huyen` ON `xa_phuong`.`QH_MA` = `quan_huyen`.`QH_MA`";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){ ?>
                            var atmIcon = new ATMIcon({iconUrl: "img/atm/<?php echo $row["NH_MA"]; ?>.png"});
                            var marker = L.marker([<?php echo $row["TA_VIDOX"]; ?>, <?php echo $row["TA_KINHDOY"]; ?>],{icon: atmIcon}).addTo(map);
                            marker.bindPopup(
                                '<div class="row">' +
                                ' <h5>Trụ ATM <?php echo $row["TA_SOHIEU"].' - '.$row["TA_DIACHI"];?></h5>' +
                                '<p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["TA_DIACHI"].', '.$row["XP_TEN"].', '.$row["QH_TEN"].', TP Cần Thơ'?></p>' +
                                '<div class="col-5">' +
                                '<a class="findRoute"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
                                '</div>' +
                                '<div class = "col-7" >' +
                                ' <img src = "img/logo/<?php echo $row["NH_MA"]; ?>.png" width = "70px" class="float-end">' +
                                '</div>',
                                customPopup
                            );;
                            //----------------------------------------------------------------
                            // CALL LIST START
                            getValue(<?php echo $row["TA_VIDOX"]; ?>, <?php echo $row["TA_KINHDOY"]; ?>, function(khoangcach, thoigian) {
                                const htmlResult = `
                                <div class="card text-dark m-1 p-2">
                                    <h6>Trụ ATM <?php echo $row["TA_SOHIEU"]; ?> - <?php echo $row["TA_DIACHI"]; ?></h6>
                                    <p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["TA_DIACHI"]; ?>, <?php echo $row["XP_TEN"]; ?>, <?php echo $row["QH_TEN"]; ?>, TP Cần Thơ</p>
                                    <p class="m-0"><i class="fas fa-motorcycle"></i> Cách bạn <b>${khoangcach} km</b> và cần <b>${thoigian} phút</b> di chuyển</p>
                                    <div class="d-flex">
                                        <a  class="findRoute card-link text-primary p-0" style="margin-top: auto; margin-bottom: auto">
                                            <i class="fas fa-directions fs-4"></i>&nbsp; Tìm đường
                                        </a>
                                        <img src="img/logo/<?php echo $row["NH_MA"]; ?>.png" width="50px" class="float-end" style="margin-left: auto">
                                    </div>
                                </div>
                                `;
                                const listLocationDiv = document.getElementById('list-location');
                                listLocationDiv.innerHTML += htmlResult;
                            });
                            // CALL LIST END
                            //----------------------------------------------------------------
                            //----------------------------------------------------------------
                            // CLICK -> ROUTING START
                            marker.on("click", function() {
                                var markerId = <?php echo $row["TA_SOHIEU"]; ?>;
                                var latitude = <?php echo $row["TA_VIDOX"]; ?>;
                                var longitude = <?php echo $row["TA_KINHDOY"]; ?>;
                                $('.findRoute').on("click", function() {
                                    handleMarkerClick(markerId, latitude, longitude);
                                })
                                //
                                //console.log(markerId + ' , ' + latitude + ' , ' + longitude );
                            });
                            // CLICK -> ROUTING END
                            //----------------------------------------------------------------
                            //----------------------------------------------------------------
                            //THU THẬP TOẠ ĐỘ -> TÍNH TRUNG BÌNH
                            <?php $newlatitude+=$row["TA_VIDOX"]; $newlongitude+=$row["TA_KINHDOY"]; $count++; ?>
                            //----------------------------------------------------------------
                    <?php } ?>
                    //GỌI ATM END
                    //***************************************************************************

                    //***************************************************************************
                    //CENTER VÀ ZOOM LẠI START
                    <?php $newlatitude = $newlatitude/$count; $newlongitude=$newlongitude/$count; ?>
                    var newCenter = [<?php echo $newlatitude .', '. $newlongitude; ?>];
                    var newZoomLevel = 15;
                    map.setView(newCenter, newZoomLevel);
                    <?php $newlatitude = 0; $newlongitude=0; $count=0; ?>
                    //CENTER VÀ ZOOM LẠI END
                    //***************************************************************************

                    //***************************************************************************
                    //NÚT PGD ĐƯỢC CLICK START
                    $("#pgd-btn").click(function (e) {
                        e.preventDefault();
                        map.remove();
                        clearListLocationDiv()
                        //Lấy vị trí ng dùng
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position){
                                var ulatitude = position.coords.latitude;
                                var ulongitude = position.coords.longitude;

                                //----------------------------------------------------------------
                                //Gọi map
                                var mapOptions = {
                                    center: [ulatitude, ulongitude],
                                    zoom: 15
                                };
                                
                                map = new L.map('map', mapOptions);
                                
                                var layer = new
                                L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                                
                                map.addLayer(layer);
                                
                                //----------------------------------------------------------------
                                // Hiển thị vị trí người dùng
                                var userPolyline = L.polyline([[ulatitude, ulongitude], [ulatitude, ulongitude]], { color: 'red', weight: 30 }).addTo(map);
                                userPolyline.bindPopup('Vị trí của bạn').openPopup();   

                                //----------------------------------------------------------------
                                <?php $newlatitude=0; $newlongitude=0; $count=0; ?>
                                //***************************************************************************
                                //GỌI PGD START
                                <?php
                                    $query = "SELECT * FROM `phong_giao_dich`  JOIN  `xa_phuong` ON `xa_phuong`.`XP_MA` = `phong_giao_dich`.`XP_MA`
                                                                                JOIN  `quan_huyen` ON `xa_phuong`.`QH_MA` = `quan_huyen`.`QH_MA`";
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){ ?>
                                        var pgdIcon = new PGDIcon({iconUrl: "img/pgd/<?php echo $row["NH_MA"]; ?>.png"});
                                        var marker = L.marker([<?php echo $row["PGD_VIDOX"]; ?>, <?php echo $row["PGD_KINHDOY"]; ?>],{icon: pgdIcon}).addTo(map);
                                        marker.bindPopup(
                                            '<div class="row">' +
                                            ' <h5><?php echo $row["PGD_TEN"].' - '.$row["PGD_DIACHI"];?></h5>' +
                                            '<p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["PGD_DIACHI"].', '.$row["XP_TEN"].', '.$row["QH_TEN"].', TP Cần Thơ'?></p>' +
                                            '<div class="col-5">' +
                                            '<p><i class="fas fa-phone"></i> <?php echo $row["PGD_SDT"];?></p>' +
                                            '<a class="findRoute"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
                                            '</div>' +
                                            '<div class = "col-7" >' +
                                            ' <img src = "img/logo/<?php echo $row["NH_MA"]; ?>.png" width = "70px" class="float-end">' +
                                            '</div>',
                                            customPopup
                                        );
                                        //----------------------------------------------------------------
                                        // CALL LIST START
                                        getValue(<?php echo $row["PGD_VIDOX"]; ?>, <?php echo $row["PGD_KINHDOY"]; ?>, function(khoangcach, thoigian) {
                                            const htmlResult = `
                                                <div class="card text-dark m-1 p-2">
                                                    <h6><?php echo $row["PGD_TEN"]; ?> - <?php echo $row["PGD_DIACHI"]; ?></h6>
                                                    <p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["PGD_DIACHI"]; ?>, <?php echo $row["XP_TEN"]; ?>, <?php echo $row["QH_TEN"]; ?>, TP Cần Thơ</p>
                                                    <p class="m-0"><i class="fas fa-motorcycle"></i> Cách bạn <b>${khoangcach} km</b> và cần <b>${thoigian} phút</b> di chuyển</p>
                                                    <div class="d-flex">
                                                        <a  class="findRoute card-link text-primary p-0" style="margin-top: auto; margin-bottom: auto">
                                                            <i class="fas fa-directions fs-4"></i>&nbsp; Tìm đường
                                                        </a>
                                                        <img src="img/logo/<?php echo $row["NH_MA"]; ?>.png" width="50px" class="float-end" style="margin-left: auto">
                                                    </div>
                                                </div>
                                            `;
                                            const listLocationDiv = document.getElementById('list-location');
                                            listLocationDiv.innerHTML += htmlResult;
                                        });
                                        // CALL LIST END
                                        //----------------------------------------------------------------
                                        //----------------------------------------------------------------
                                        // CLICK -> ROUTING START
                                        marker.on("click", function() {
                                            var markerId = <?php echo $row["PGD_MA"]; ?>;
                                            var latitude = <?php echo $row["PGD_VIDOX"]; ?>;
                                            var longitude = <?php echo $row["PGD_KINHDOY"]; ?>;
                                            $('.findRoute').on("click", function() {
                                                handleMarkerClick(markerId, latitude, longitude);
                                            })
                                            //
                                            //console.log(markerId + ' , ' + latitude + ' , ' + longitude );
                                        });
                                        // CLICK -> ROUTING END
                                        //----------------------------------------------------------------
                                        //----------------------------------------------------------------
                                        //THU THẬP TOẠ ĐỘ -> TÍNH TRUNG BÌNH
                                        <?php $newlatitude+=$row["PGD_VIDOX"]; $newlongitude+=$row["PGD_KINHDOY"]; $count++; ?>
                                        //----------------------------------------------------------------
                                <?php } ?>
                                //GỌI PGD END
                                //***************************************************************************
                                //***************************************************************************
                                //CENTER VÀ ZOOM LẠI START
                                <?php $newlatitude = $newlatitude/$count; $newlongitude=$newlongitude/$count; ?>
                                var newCenter = [<?php echo $newlatitude .', '. $newlongitude; ?>];
                                var newZoomLevel = 15;
                                map.setView(newCenter, newZoomLevel);
                                <?php $newlatitude = 0; $newlongitude=0; $count=0; ?>
                                //CENTER VÀ ZOOM LẠI END
                                //***************************************************************************
                            });
                        }
                        else {
                            // Xử lý trường hợp trình duyệt không hỗ trợ geolocation
                            console.error('Geolocation is not supported by your browser.');
                        }
                    });
                    //NÚT PGD ĐƯỢC CLICK END
                    //***************************************************************************
                    //***************************************************************************
                    //NÚT ATM ĐƯỢC CLICK START
                    $("#atm-btn").click(function (e) {
                        e.preventDefault();
                        map.remove();
                        clearListLocationDiv()
                        //Lấy vị trí ng dùng
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position){
                                var ulatitude = position.coords.latitude;
                                var ulongitude = position.coords.longitude;

                                //----------------------------------------------------------------
                                //Gọi map
                                var mapOptions = {
                                    center: [ulatitude, ulongitude],
                                    zoom: 15
                                };
                                
                                map = new L.map('map', mapOptions);
                                
                                var layer = new
                                L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                                
                                map.addLayer(layer);
                                
                                //----------------------------------------------------------------
                                // Hiển thị vị trí người dùng
                                var userPolyline = L.polyline([[ulatitude, ulongitude], [ulatitude, ulongitude]], { color: 'red', weight: 30 }).addTo(map);
                                userPolyline.bindPopup('Vị trí của bạn').openPopup();   

                                //----------------------------------------------------------------
                                <?php $newlatitude=0; $newlongitude=0; $count=0; ?>
                                //***************************************************************************
                                //GỌI ATM START
                                <?php
                                    $query = "SELECT * FROM `tru_atm`  JOIN  `xa_phuong` ON `xa_phuong`.`XP_MA` = `tru_atm`.`XP_MA`
                                                                        JOIN  `quan_huyen` ON `xa_phuong`.`QH_MA` = `quan_huyen`.`QH_MA`";
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){ ?>
                                        var atmIcon = new ATMIcon({iconUrl: "img/atm/<?php echo $row["NH_MA"]; ?>.png"});
                                        var marker = L.marker([<?php echo $row["TA_VIDOX"]; ?>, <?php echo $row["TA_KINHDOY"]; ?>],{icon: atmIcon}).addTo(map);
                                        marker.bindPopup(
                                            '<div class="row">' +
                                            ' <h5>Trụ ATM <?php echo $row["TA_SOHIEU"].' - '.$row["TA_DIACHI"];?></h5>' +
                                            '<p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["TA_DIACHI"].', '.$row["XP_TEN"].', '.$row["QH_TEN"].', TP Cần Thơ'?></p>' +
                                            '<div class="col-5">' +
                                            '<a class="findRoute"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
                                            '</div>' +
                                            '<div class = "col-7" >' +
                                            ' <img src = "img/logo/<?php echo $row["NH_MA"]; ?>.png" width = "70px" class="float-end">' +
                                            '</div>',
                                            customPopup
                                        );
                                        //----------------------------------------------------------------
                                        // CALL LIST START
                                        getValue(<?php echo $row["TA_VIDOX"]; ?>, <?php echo $row["TA_KINHDOY"]; ?>, function(khoangcach, thoigian) {
                                            const htmlResult = `
                                            <div class="card text-dark m-1 p-2">
                                                <h6>Trụ ATM <?php echo $row["TA_SOHIEU"]; ?> - <?php echo $row["TA_DIACHI"]; ?></h6>
                                                <p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $row["TA_DIACHI"]; ?>, <?php echo $row["XP_TEN"]; ?>, <?php echo $row["QH_TEN"]; ?>, TP Cần Thơ</p>
                                                <p class="m-0"><i class="fas fa-motorcycle"></i> Cách bạn <b>${khoangcach} km</b> và cần <b>${thoigian} phút</b> di chuyển</p>
                                                <div class="d-flex">
                                                    <a  class="findRoute card-link text-primary p-0" style="margin-top: auto; margin-bottom: auto">
                                                        <i class="fas fa-directions fs-4"></i>&nbsp; Tìm đường
                                                    </a>
                                                    <img src="img/logo/<?php echo $row["NH_MA"]; ?>.png" width="50px" class="float-end" style="margin-left: auto">
                                                </div>
                                            </div>
                                            `;
                                            const listLocationDiv = document.getElementById('list-location');
                                            listLocationDiv.innerHTML += htmlResult;
                                        });
                                        // CALL LIST END
                                        //----------------------------------------------------------------
                                        //----------------------------------------------------------------
                                        // CLICK -> ROUTING START
                                        marker.on("click", function() {
                                            var markerId = <?php echo $row["TA_SOHIEU"]; ?>;
                                            var latitude = <?php echo $row["TA_VIDOX"]; ?>;
                                            var longitude = <?php echo $row["TA_KINHDOY"]; ?>;
                                            $('.findRoute').on("click", function() {
                                                handleMarkerClick(markerId, latitude, longitude);
                                            })
                                            //
                                            //console.log(markerId + ' , ' + latitude + ' , ' + longitude );
                                        });
                                        // CLICK -> ROUTING END
                                        //----------------------------------------------------------------
                                        //----------------------------------------------------------------
                                        //THU THẬP TOẠ ĐỘ -> TÍNH TRUNG BÌNH
                                        <?php $newlatitude+=$row["TA_VIDOX"]; $newlongitude+=$row["TA_KINHDOY"]; $count++; ?>
                                        //----------------------------------------------------------------
                                <?php } ?>
                                //GỌI ATM END
                                //***************************************************************************
                                //***************************************************************************
                                //CENTER VÀ ZOOM LẠI START
                                <?php $newlatitude = $newlatitude/$count; $newlongitude=$newlongitude/$count; ?>
                                var newCenter = [<?php echo $newlatitude .', '. $newlongitude; ?>];
                                var newZoomLevel = 15;
                                map.setView(newCenter, newZoomLevel);
                                <?php $newlatitude = 0; $newlongitude=0; $count=0; ?>
                                //CENTER VÀ ZOOM LẠI END
                                //***************************************************************************
                            });
                        }
                        else {
                            // Xử lý trường hợp trình duyệt không hỗ trợ geolocation
                            console.error('Geolocation is not supported by your browser.');
                        }
                    });
                    //NÚT ATM ĐƯỢC CLICK END
                    //***************************************************************************

                    //***************************************************************************
                    //HÀM BỔ SUNG
                    //***************************************************************************
                    //CLICK -> ROUNTING
                    function handleMarkerClick(markerId, latitude, longitude) {
                        if (findRouting != null) {
                            map.removeControl(findRouting);
                            findRouting = null;
                        }
                        findRouting = L.Routing.control({
                            waypoints: [
                                L.latLng(ulatitude, ulongitude),
                                L.latLng(latitude, longitude)
                            ],
                            geocoder: L.Control.Geocoder.nominatim(),
                            routeWhileDragging: true,
                            reverseWaypoints: true,
                            showAlternatives: true,
                            language: 'vi',
                            altLineOptions: {
                                styles: [
                                    {color: 'black', opacity: 0.15, weight: 9},
                                    {color: 'white', opacity: 0.8, weight: 6},
                                    {color: 'blue', opacity: 0.5, weight: 2}
                                ]
                            }
                        }).addTo(map);
                    };

                    //LẤY GIÁ TRỊ KCÁCH VÀ TGIAN CHO DANH SÁCH
                    function getValue(latitude, longitude, callback) {
                        //---------------------------------------------------
                        // ROUTING ẨN ĐỂ TÌM ĐƯỜNG ĐẾN NGƯỜI DÙNG -> VALUE START
                        var control = L.Routing.control({
                            waypoints: [
                                L.latLng(ulatitude, ulongitude),
                                L.latLng(latitude, longitude)
                            ],
                            geocoder: L.Control.Geocoder.nominatim(),
                            routeWhileDragging: true,
                            reverseWaypoints: true,
                            showAlternatives: true,
                            language: 'vi',
                            altLineOptions: {
                                styles: [
                                    {color: 'black', opacity: 0.15, weight: 9},
                                    {color: 'white', opacity: 0.8, weight: 6},
                                    {color: 'blue', opacity: 0.5, weight: 2}
                                ]
                            }
                        });
                        // ROUTING ẨN ĐỂ TÌM ĐƯỜNG ĐẾN NGƯỜI DÙNG  -> VALUE END
                        //---------------------------------------------------
                        //---------------------------------------------------
                        // TÍNH KHOẢNG CÁCH NGẦM  -> VALUE START
                        control.on('routesfound', function(e) {
                            var routes = e.routes;
                            var summary = routes[0].summary;
                            // Công thức lấy khoảng cách và thời gian
                            //console.log('Total ['+ten+'] distance is ' + summary.totalDistance / 1000 + ' km and total time is ' + Math.round(summary.totalTime % 3600 / 60) + ' minutes');

                            var khoangcach = summary.totalDistance / 1000;
                            var thoigian = Math.round(summary.totalTime % 3600 / 60);
                            callback(khoangcach, thoigian);
                        });
                        control.route();   
                        // TÍNH KHOẢNG CÁCH NGẦM  -> VALUE END
                        //---------------------------------------------------
                    }

                    //LÀM RỖNG DANH SÁCH
                    function clearListLocationDiv() {
                        const listLocationDiv = document.getElementById('list-location');
                        listLocationDiv.innerHTML = "";
                    }
                })
            }
            else {
                console.error('Geolocation is not supported by your browser.');
            }
        });
    </script>
</body>

</html>