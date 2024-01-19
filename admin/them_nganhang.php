<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Thêm ngân hàng</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        
        <?php include('sidebar.php'); ?>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            
            <?php include('nav.php'); ?>

            <div class="container-fluid px-4">

                <div class="row my-2 secondary-bg shadow-sm">
                    <h2 class="fs-3 mb-3 p-2 primary-bg text-center text-light">THÊM NGÂN HÀNG</h2>

                    <!--Content-->
                    <div class="col">
                        <div class="panel-body bg-white rounded shadow-sm center mb-3 pt-2">
                            <div class="position-center">
                                <form role="form" action="xuly/xuly_them_nganhang.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mã</label>
                                        <input type="text" name="NH_MA" class="form-control" id="exampleInputEmail1" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên</label>
                                        <input type="text" name="NH_TEN" class="form-control" id="exampleInputEmail1" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" name="NH_DIACHI" class="form-control" id="exampleInputEmail1" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                        <input type="text" name="NH_SDT" class="form-control" id="exampleInputEmail1" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vĩ độ</label>
                                        <input type="text" name="NH_VIDOX" class="form-control" id="exampleInputEmail1" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kinh độ</label>
                                        <input type="text" name="NH_KINHDOY" class="form-control" id="exampleInputEmail1" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Xã phường</label>
                                        <input type="number" name="XP_MA" class="form-control" id="exampleInputEmail1" required="">
                                    </div>

                                    <button type="submit" name="them_atm" class="btn btn-search mb-3 mt-2 text-light" style="width: 100%;">Thêm ngân hàng</button>
                                </form>
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