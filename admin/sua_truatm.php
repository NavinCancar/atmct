<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Sửa trụ atm</title>
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
                $sql = "SELECT * FROM TRU_ATM WHERE TA_SOHIEU = '".$_GET['matru']."'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                    <div class="panel-body bg-white rounded shadow-sm center mb-3 pt-2">
                        <div class="position-center">
                            <form role="form" action="xuly/xuly_sua_truatm.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số hiệu</label>
                                    <input type="text" name="TA_SOHIEU" class="form-control" id="exampleInputEmail1"
                                    disabled value="<?php echo $row["TA_SOHIEU"] ?>">

                                    <input type="text" style="display: none;" name="TA_SOHIEU" class="form-control"
                                        id="exampleInputEmail1" value="<?php echo $_GET['matru'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="TA_DIACHI" class="form-control" id="exampleInputEmail1"
                                        required="" value="<?php echo $row["TA_DIACHI"] ?>">
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
<!--khong sua ma ngan hang chi can hien ten ra thoi -->
                                <div class="form-group">
                                <label for="exampleInputEmail1">ngan hang</label>
                                    <input type="text" name="TA_SOHIEU" class="form-control" id="exampleInputEmail1"
                                    disabled value="
                                        <?php
                                                        $query = "SELECT NH_TEN FROM ngan_hang WHERE NH_MA ='". $row["NH_MA"]."' ";
                                                        $result = mysqli_query($conn, $query);
                                                        $row2 = mysqli_fetch_array($result, MYSQLI_BOTH);
                                                           echo $row2["NH_TEN"];
                                                        
                                                    ?>
                                        ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Vĩ độ</label>
                                    <input type="text" name="TA_VIDOX" class="form-control" id="exampleInputEmail1"
                                        required="" value="<?php echo $row['TA_VIDOX'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kinh độ</label>
                                    <input type="text" name="TA_KINHDOY" class="form-control" id="exampleInputEmail1"
                                        required="" value="<?php echo $row['TA_KINHDOY'] ?>">
                                </div>


                                <button type="submit" name="them_truatm" class="btn btn-search mb-3 mt-2 text-light"
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