<!DOCTYPE html>
<html lang="en">

<head>
    <title>Giá xăng</title>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Giá xăng</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Giá xăng</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Price Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Bảng giá xăng</h1>
                <!-- Search Start -->
                    <div class="container-fluid bg-primary wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                        <div class="container">
                            <form action="#">
                                <div class="row g-2">
                                    <div class="col-md-10">
                                        <div class="row g-2">
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                <select class="form-select border-0">
                                                    <option selected>Ngày</option>
                                                    <option value="2023-12-07 15:00">07/12/2023</option>
                                                    <option value="2023-11-30 16:12">30/11/2023</option>
                                                    <option value="2023-11-23 15:00">23/11/2023</option>
                                                    <option value="2023-11-13 15:00">13/11/2023</option>
                                                    <option value="2023-11-01 15:00">01/11/2023</option>
                                                    <option value="2023-10-23 16:32">23/10/2023</option>
                                                    <option value="2023-10-11 16:00">11/10/2023</option>
                                                    <option value="2023-10-02 16:00">02/10/2023</option>
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

                    <!-- Table Start-->
                    <table class="table table-bordered">
                        <thead>
                        <tr class="table-blue text-center">
                            <th>TT</th>
                            <th>Mặt hàng</th>
                            <th>Giá điều chỉnh lúc 15:00 ngày 14/12/2023<br>(Đồng/lít thực tế)</th>
                            <th>Chênh lệch giá điều chỉnh (tăng/giảm)<br>(Đồng/lít thực tế)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td style="text-align: left;">Xăng RON 95-III</td>
                            <td style="text-align: right;">21.400</td>
                            <td style="text-align: right;">-920</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td style="text-align: left;">Xăng E5 RON 92-II</td>
                            <td style="text-align: right;">20.510</td>
                            <td style="text-align: right;">-780</td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- Table End -->
            </div>
        </div>
        <!-- Price End -->


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