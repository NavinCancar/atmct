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
                    <h1 class="display-3 text-white mb-3 pt-5">Trạm xăng Cần Thơ</h1>
                    <h4 class="text-light pb-5">Nơi chia sẻ cho bạn về tình trạng buôn bán xăng dầu tại Cần Thơ.</h4>            
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Các trạm xăng thành phố</h1>
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <!-- <img class="img-fluid" src="img/carousel-1.jpg" alt=""> -->
                    <!-- ban do -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7416.705603631216!2d105.76777276350276!3d10.028158770447037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0883d2192b0f1%3A0x4c90a391d232ccce!2zVHLGsOG7nW5nIEPDtG5nIE5naOG7hyBUaMO0bmcgVGluIHbDoCBUcnV54buBbiBUaMO0bmcgKENUVSk!5e0!3m2!1svi!2s!4v1689152456196!5m2!1svi!2s"
                        style="border:1px; width: 100rem; height: 35rem" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form action="#">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <!-- địa điểm cần tìm -->
                                    <input type="text" class="form-control border-0" placeholder="Nhập vào địa điểm" />
                                </div>
                                <div class="col-md-4">
                                    <!-- loại xăng cần tìm cần tìm -->
                                    <select class="form-select border-0">
                                        <option selected>Loại Xăng</option>
                                        <option value="1">Category 1</option>
                                        <option value="2">Category 2</option>
                                        <option value="3">Category 3</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <!-- tên cty cần tìm cần tìm -->
                                    <select class="form-select border-0">
                                        <option selected>Công ty</option>
                                        <option value="1">Location 1</option>
                                        <option value="2">Location 2</option>
                                        <option value="3">Location 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>   
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-orange border-0 w-100">Tìm</button>
                        </div>
                    </div>     
                </form>
            </div>
        </div>
        <!-- Search End -->


        <!-- Station Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Danh sách trạm xăng</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                                href="#tab-1">
                                <h6 class="mt-n1 mb-0">Trạm gần nhất</h6>
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
        <!-- Station End -->


        <!-- Company Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Các công ty nổi bật</h1>
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
        <!-- Company End -->


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
                        <p class="mb-4">Các thống kê dựa trên cơ sở dữ liệu của các trạm xăng và công ty xăng tại thành phố mở ra cái nhìn về:</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Tổng quan về thị trường xăng dầu.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Thông tin chi tiết về tình trạng hoạt động của các trạm xăng.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Cung cấp thông tin và lựa chọn cho người dùng.</p>
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
</body>
</html>