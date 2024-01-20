<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Thêm phòng giao dịch</title>
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
                    <h2 class="fs-3 mb-3 p-2 primary-bg text-center text-light">THÊM PHÒNG GIAO DỊCH</h2>

                    <!--Content-->

                    <div class="panel-body bg-white rounded shadow-sm center mb-3 pt-2">
                        <div class="position-center">
                            <form role="form" action="xuly/xuly_them_phonggiaodich.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="text" name="PGD_TEN" class="form-control" id="exampleInputEmail1"
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="PGD_DIACHI" class="form-control" id="dc" required="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Xã phường</label>
                                    <input class="form-control me-2" list="datalistOptions" id="xp" name="XP_MA"
                                        type="search" required>
                                    <datalist id="datalistOptions">
                                        <?php
                                                        $query = "SELECT * FROM xa_phuong";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row["XP_MA"].'">'.$row["XP_TEN"].'</option>';
                                                        }
                                                    ?>
                                    </datalist>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngân hàng</label>
                                    <input class="form-control me-2" list="datalistOptions1" id="mapgd" name="NH_MA"
                                        type="search" required>
                                    <datalist id="datalistOptions1">
                                        <?php
                                                        $query = "SELECT * FROM ngan_hang";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row["NH_MA"].'">'.$row["NH_TEN"].'</option>';
                                                        }
                                                    ?>
                                    </datalist>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="PGD_SDT" class="form-control" id="exampleInputEmail1"
                                        required="">
                                </div>
                                <div style="display: none;" id="toado">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vĩ độ</label>
                                        <input type="text" name="PGD_VIDOX" class="form-control" id="x" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kinh độ</label>
                                        <input type="text" name="PGD_KINHDOY" class="form-control" id="y" readonly>
                                    </div>
                                    <h6 class="text-danger">Vui lòng xác nhận vị trí bên dưới bản đồ</h6>
                                </div>


                                <button type="submit" name="them_pgd" class="btn btn-search mb-3 mt-2 text-light"
                                    style="width: 100%;">Thêm phòng giao dịch</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div id="map" style="border:1px; width: 100%; height: 35rem;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></div>
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

    $(document).ready(function() {
        $("#xp").blur(function() {
            var xp = $(this).val();
            var dc = $("#dc").val();
            $.post("../admin/xuly/getdc.php", {
                xp: xp,
                dc: dc
            }, function(data) {
                // ========================================================================================
                var mapOptions = {
                    center: [10.029294, 105.769436],
                    zoom: 20
                };

                //Khai báo đối tượng bản đồ
                var map = new L.map('map', mapOptions);
                var layer = new
                L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                map.addLayer(layer);

                // ========================================================================================
                const provider = new window.GeoSearch.OpenStreetMapProvider();
                var query_promise = provider.search({
                    query: data
                });
                var markerClusterGroup = L.markerClusterGroup();
                query_promise.then(value => {
                    var x = y = '';
                    for (i = 0; i < value.length; i++) {
                        var x_coor = value[i].x;
                        var y_coor = value[i].y;
                        console.log(x_coor);
                        var marker = L.marker([y_coor, x_coor], {
                            draggable: true
                        });
                        markerClusterGroup.addLayer(marker);
                        if (i == 0) {
                            marker.addTo(map);
                            x = y_coor;
                            y = x_coor
                        } else {
                            continue;
                        }
                        $("#x").val(x);
                        $("#y").val(y);
                        $("#toado").css("display", "block");
                        marker.on('dragend', function(event) {
                            var newLatLng = marker.getLatLng();
                            console.log('New Latitude:', newLatLng.lat);
                            console.log('New Longitude:', newLatLng.lng);

                            $("#x").val(newLatLng.lat);
                            $("#y").val(newLatLng.lng);
                        });

                    }

                    map.addLayer(markerClusterGroup);
                    map.fitBounds(markerClusterGroup.getBounds());

                }, reason => {
                    console.log(reason);
                });

                // ========================================================
            });
        });
    });
    </script>
</body>

</html>