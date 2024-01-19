<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>ATM Cần Thơ - Admin</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        
        <?php include('sidebar.php') ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

        <?php include('nav.php') ?>

            <div class="container-fluid px-4">
                <div class="p-3 bg-white shadow-sm text-center rounded">
                    <h2 class="fs-2 m-0 primary-text">ATM Cần Thơ - ATM </h2>
                </div>
                <div class="row g-3 my-2">
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">720</h3>
                                <p class="fs-5">Ngân hàng</p>
                            </div>
                            <i class="fas fa-building fs-1 primary-text rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4920</h3>
                                <p class="fs-5">Phòng giao dịch</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">43243</h3>
                                <p class="fs-5">Trụ ATM</p>
                            </div>
                            <i class="fas fa-credit-card fs-1 primary-text rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
</body>

</html>