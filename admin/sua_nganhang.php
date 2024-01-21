<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Sửa ngân hàng</title>
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
                    <h2 class="fs-3 mb-3 p-2 primary-bg text-center text-light">SỬA NGÂN HÀNG</h2>

                    <!--Content-->
                    <?php
                $sql = "SELECT * FROM NGAN_HANG WHERE NH_MA = '".$_GET['manh']."'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                    <div class="panel-body bg-white rounded shadow-sm center mb-3 pt-2">
                        <div class="position-center">
                            <form role="form" action="xuly/xuly_sua_nganhang.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="text" name="NH_TEN" class="form-control" id="exampleInputEmail1"
                                        required="" value="<?php echo $row["NH_TEN"] ?>">
                                    <input type="text" style="display: none;" name="NH_MA" class="form-control"
                                        id="exampleInputEmail1" value="<?php echo $_GET['manh'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="NH_DIACHI" class="form-control" id="exampleInputEmail1"
                                        required="" value="<?php echo $row["NH_DIACHI"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="NH_SDT" class="form-control" id="exampleInputEmail1"
                                        required="" value="<?php echo $row["NH_SDT"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Xã phường</label>
                                    <input class="form-control me-2" list="datalistOptions" id="manh" name="XP_MA"
                                        type="search" required value="<?php echo $row["XP_MA"] ?>">
                                    <datalist id="datalistOptions">
                                        <?php
                                                        $query = "SELECT * FROM xa_phuong";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row1 = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row1["XP_MA"].'">'.$row1["XP_TEN"].'</option>';
                                                        }
                                                    ?>
                                    </datalist>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Vĩ độ</label>
                                    <input type="text" name="NH_VIDOX" class="form-control" id="exampleInputEmail1"
                                        required="" value="<?php echo $row['NH_VIDOX'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kinh độ</label>
                                    <input type="text" name="NH_KINHDOY" class="form-control" id="exampleInputEmail1"
                                        required="" value="<?php echo $row['NH_KINHDOY'] ?>">
                                </div>


                                <button type="submit" name="them_atm" class="btn btn-search mb-3 mt-2 text-light"
                                    style="width: 100%;">Cập nhật</button>
                            </form>
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

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
    </script>
</body>

</html>