<!DOCTYPE html>
<html lang="en">

<head>
    <title>Giới thiệu</title>
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
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Giới thiệu</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Giới thiệu</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="img/logo/1.png">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="img/logo/2.png" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="img/logo/3.png" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="img/logo/4.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                        <h2 class="mb-4">HỆ THỐNG QUẢN LÝ PHÒNG GIAO DỊCH – TRỤ ATM TRÊN ĐỊA BÀN THÀNH PHỐ CẦN THƠ</h2>
                        <p class="mb-4">Hệ thống thông tin địa lý dành cho phòng giao dịch và trụ ATM trên địa bàn thành phố Cần Thơ
                            được xây dựng với mục tiêu chính là giúp ngân hàng và khách hàng tại Cần Thơ có được thông tin chính xác 
                            về các phòng giao dịch và các trụ ATM gần nhất trong khu vực. Từ đó, tiết kiệm thời gian và chi phí di chuyển, 
                            nâng cao chất lượng dịch vụ và sự hài lòng của khách hàng.</p>
                        <br><h5 class="mb-4">Thành viên nhóm:</h5>
                        <p><i class="fa fa-chevron-right text-primary me-3"></i>Nguyễn Phương Hiếu _ B200373</p>
                        <p><i class="fa fa-chevron-right text-primary me-3"></i>Nguyễn Thị Ngọc Hương _ B2003741</p>
                        <p><i class="fa fa-chevron-right text-primary me-3"></i>Huỳnh Thị Mỹ Ái _ B2011957</p>
                        <p><i class="fa fa-chevron-right text-primary me-3"></i>Huỳnh Hồng Diễm _ B2011958</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Footer Start -->
        <?php
                include('footer.php');
            ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-orange btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>
</html>