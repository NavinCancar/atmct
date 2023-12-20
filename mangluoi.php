<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mạng lưới</title>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Mạng lưới</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Mạng lưới</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Station Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Thống kê mạng lưới trạm xăng</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <img src="https://www.mongodb.com/docs/charts/images/charts/stacked-bar-chart-reference-small.png"/>
                </div>
            </div>
        </div>
        <!-- Station End -->


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