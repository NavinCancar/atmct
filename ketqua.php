<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kết quả tìm</title>
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

        <h1 class="text-center mb-5 mt-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Kết quả tìm kiếm</h1>
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


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
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


        <!-- Footer Start -->
        <?php
            include('footer.php');
        ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>
</html>