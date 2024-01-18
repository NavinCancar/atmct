<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Danh sách ngân hàng</title>
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
                    <h2 class="fs-3 mb-3 p-2 primary-bg text-center text-light">DANH SÁCH NGÂN HÀNG</h2>
                    <!--Header-->
                    <div class="row pb-2">
                        <div class="col-sm-9">
                            
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <form class="d-flex" action="{{ URL::to('/search-product') }}" method="POST">
                                    <input type="text" class="form-control" name="keywords_submit"
                                        style="width: 70%; margin: 0 10px" placeholder="Tìm kiếm...">
                                    <button type="submit" class="btn btn-search"><i
                                            class="fa fa-search icon-white"></i></a></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!--Content-->
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer</th>
                                </tr>
                            </thead>
                            <?php // Truy vấn dữ liệu từ bảng NGAN_HANG
                                $sql = "SELECT * FROM NGAN_HANG";
                                $result = $conn->query($sql);

                                // Kiểm tra và hiển thị dữ liệu ngân hàng
                                if ($result->num_rows > 0) {
                                    // Hiển thị dữ liệu trong bảng
                                    while($row = $result->fetch_assoc()) {?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $row["NH_MA"] ?></th>
                                    <td><?php echo $row["NH_TEN"] ?></td>
                                    <td><?php echo $row["NH_DIACHI"] ?></td>
                                </tr>
                                    <?php }
                                    } else {
                                        echo "Không có dữ liệu ngân hàng";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!--Footer-->
                    <div>
                        <ul class="pagination pagination-sm m-t-none m-b-none ">
                            <li class="page-item disabled"><a class="page-link" href="#"><</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">></a></li>
                        </ul>
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