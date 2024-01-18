<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kết quả tìm kiếm</title>
    <?php
        include('head.php');
    ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <?php
                include('nav.php');
            ?>
        </nav>
        <!-- Navbar End -->

        <!-- Map Start -->
        <div class="container p-0 mt-3">
            <!-- Search Start -->
            <div class="container-fluid bg-primary mb-4 mt-3">
                <div class="container">
                    <div class="row g-2 p-3">
                        <div class="col-md-6">
                            <p class="text-white"> Tìm phòng giao dịch theo ngân hàng</p>
                            <form class="d-flex ">
                                <input class="form-control me-2" list="datalistOptions" id="manh"
                                    placeholder="Nhâp vào ngân hàng " type="search">
                                <datalist id="datalistOptions">
                                    <?php
                                                        $query = "SELECT * FROM `ngan_hang`";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row["NH_MA"].'">'.$row["NH_TEN"].'</option>';
                                                        }
                                                    ?>
                                </datalist>
                                <button class="btn btn-outline-success search text-white">Tìm</button>
                            </form>
                            <p class="text-white d-flex justify-content-end mt-3"> Thêm &nbsp;<span><i
                                        class="fas fa-plus " id="plus"></i></span></p>
                            <p id="ds" class="d-flex justify-content-start text-white" multiple></p>

                        </div>
                        <!-- ====================================================================================================== -->
                        <div class="col-md-6">
                            <p class="text-white"> Tìm ATM theo ngân hàng</p>
                            <form class="d-flex ">
                                <input class="form-control me-2" list="datalistOptions" id="manh1"
                                    placeholder="Nhâp vào ngân hàng " type="search">
                                <datalist id="datalistOptions1">
                                    <?php
                                                        $query = "SELECT * FROM `ngan_hang`";
                                                        $result = mysqli_query($conn, $query);
                                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                                                            echo '<option value="'.$row["NH_MA"].'">'.$row["NH_TEN"].'</option>';
                                                        }
                                                    ?>
                                </datalist>
                                <button class="btn btn-outline-success text-white search1">Tìm</button>
                            </form>
                            <p class="text-white d-flex justify-content-end mt-3"> Thêm &nbsp;<span><i
                                        class="fas fa-plus " id="plus1"></i></span></p>
                            <p id="ds1" class="d-flex justify-content-start text-white" multiple></p>
                        </div>

                    </div>
                    <!-- ======================================================================= -->

                </div>


            </div>

            <!-- Map -->
            <div id="map" style="border:1px; width: 100%; height: 35rem" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></div>
        </div>
        <!-- Map End -->


        <!-- Footer Start -->
        <?php
            include('footer.php');
        ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-orange btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <!-- ================================================================ -->
    <?php
    if(isset($_GET['check']) && $_GET['check'] == 1){
        $title = $_GET['title'];
        $add = $_GET['add'];
        $phone = $_GET['phone'];
        $check = $_GET['check'];
        $x = $_GET['x'];
        $y = $_GET['y'];
    ?>
    <script>
    var mapOptions = {
        center: [<?php echo $x .','.$y?>],
        zoom: 20
    };

    var map = new L.map('map', mapOptions);
    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(layer);
    var marker = new L.marker([<?php echo $x .','.$y?>], {
        title: '<?php echo $title?>',
        alt: '...'
    });

    marker.addTo(map);

    var customOptions = {
        'maxWidth': '500',
        'className': 'custom'
    };

    marker.bindPopup(
        '<div class="row">' +
        ' <h5><?php echo $title?></h5>' +
        '<p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $add?></p>' +
        '<div class="col-5">' +
        '<p><i class="fas fa-phone"></i> <?php echo $phone?></p>' +
        '<a href="#" onclick="find()"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
        '</div>' +
        '<div class = "col-7" >' +
        ' <img src = "img/gd.png"' +
        ' style = "width: 6rem;" >' +
        '</div>',
        customOptions
    ).openPopup();

    function find() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {

                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                L.Routing.control({
                    waypoints: [
                        L.latLng(latitude, longitude),
                        L.latLng(<?php echo $x .','.$y?>)
                    ],
                    geocoder: L.Control.Geocoder.nominatim(),
                    routeWhileDragging: true,
                    reverseWaypoints: true,
                    showAlternatives: true,
                    language: 'vi',
                }).addTo(map);
            });
        }
    }
    </script>
    <?php }

    if(isset($_GET['check']) && $_GET['check'] == 2){
        $title = $_GET['title'];
        $add = $_GET['add'];
        $check = $_GET['check'];
        $x = $_GET['x'];
        $y = $_GET['y'];
    ?>
    <script>
    var mapOptions = {
        center: [<?php echo $x .','.$y?>],
        zoom: 20
    };
    var map = new L.map('map', mapOptions);
    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(layer);
    var marker = new L.marker([<?php echo $x .','.$y?>], {
        title: '<?php echo $title?>',
        alt: '...'
    });

    marker.addTo(map);

    var customOptions = {
        'maxWidth': '500',
        'className': 'custom'
    };
    marker.bindPopup(
        '<div class="row">' +
        ' <h5><?php echo $title?></h5>' +
        '<p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $add?></p>' +
        '<div class="col-5">' +
        '<a href="#" onclick="find()"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
        '</div>' +
        '<div class = "col-7" >' +
        ' <img src = "img/ta.jpg"' +
        ' style = "width: 6rem;" >' +
        '</div>',
        customOptions
    ).openPopup();

    function find() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {

                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                L.Routing.control({
                    waypoints: [
                        L.latLng(latitude, longitude),
                        L.latLng(<?php echo $x .','.$y?>)
                    ],
                    geocoder: L.Control.Geocoder.nominatim(),
                    routeWhileDragging: true,
                    reverseWaypoints: true,
                    showAlternatives: true,
                    language: 'vi',
                }).addTo(map);
                map.closePopup();
            });
        }
    }
    </script>
    <?php }?>
    <script>
    $(document).ready(function() {
        var manh1_arr = [];
        $("#plus1").on("click", function() {
            var manh1 = $("#manh1").val();
            if (manh1_arr.indexOf(manh1) === -1) {
                manh1_arr.push(manh1);
                var tennh1 = $("#datalistOptions1 option[value='" + manh1 + "']")
                    .text();
                $("#ds1").append('<option value="' + manh1 + '">' + tennh1 +
                    '</option>');
            }
            $(".search1").on("click", function(e) {
                e.preventDefault();
                $.post('search.php', {
                    manh1_arr: manh1_arr,
                    check: 3
                }, function(data) {

                    if (map) {
                        map.remove();
                    }
                    var mapOptions = {
                        center: [10.029294, 105.769436],
                        zoom: 12
                    };
                    map = new L.map('map', mapOptions);
                    var layer = new L.TileLayer(
                        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                    map.addLayer(layer);


                    var markers = [];
                    var old_marker = null;
                    var routingControl = null;

                    var atm_arr = JSON.parse(data);
                    // alert('aaaaaaa');
                    atm_arr.forEach(function(atm) {
                        var marker = L.marker([parseFloat(atm.ta_vidox),
                            parseFloat(atm.ta_kinhdoy)
                        ]).addTo(map)

                        marker.bindPopup(
                            '<div class="row">' +
                            ' <h5>' + atm.title + '</h5>' +
                            '<p><i class="fas fa-map-marker-alt"></i> &nbsp;' +
                            atm.dc + '</p>' +
                            '<div class="col-5">' +
                            '<a href="#" class="find-direction" data-lat="' +
                            parseFloat(atm.ta_vidox) + '" data-lng="' +
                            parseFloat(atm.ta_kinhdoy) +
                            '"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
                            '</div>' +
                            '<div class="col-7">' +
                            ' <img src="img/gd.png" style="width: 6rem;">' +
                            '</div>' +
                            '</div>'
                        );
                    });
                    marker.on('click', function() {
                        if (old_marker) {
                            old_marker.closePopup();
                        }
                        this.openPopup();
                        old_marker = this;
                        findRouting = null;
                        if (routingControl) {
                            map.removeControl(routingControl);
                             findRouting = null;
                        }
                    });
                    markers.push(marker);
                    document.addEventListener('click', function(event) {
                        if (event.target.classList.contains(
                                'find-direction')) {
                            var latitude = event.target
                                .getAttribute('data-lat');
                            var longitude = event.target
                                .getAttribute('data-lng');
                            find(latitude, longitude);
                        }
                    });

                    function find(latitude1, longitude1) {
                        if (navigator.geolocation) {
                            navigator.geolocation
                                .getCurrentPosition(
                                    function(position) {
                                        var latitude = position
                                            .coords
                                            .latitude;
                                        var longitude = position
                                            .coords
                                            .longitude;

                                        routingControl = L
                                            .Routing.control({
                                                waypoints: [
                                                    L
                                                    .latLng(
                                                        latitude,
                                                        longitude
                                                    ),
                                                    L
                                                    .latLng(
                                                        latitude1,
                                                        longitude1
                                                    )
                                                ],
                                                geocoder: L
                                                    .Control
                                                    .Geocoder
                                                    .nominatim(),
                                                routeWhileDragging: true,
                                                reverseWaypoints: true,
                                                showAlternatives: true,
                                                language: 'vi',
                                            }).addTo(map);
                                        map.closePopup();


                                    });
                        }
                    }

                    //===========================================================
                });

                //alert(atm_arr);
                manh1_arr = [];
                $("#ds1").empty();
            });
        });



        var manh_arr = [];
        $("#plus").on("click", function() {
            var manh = $("#manh").val();
            if (manh_arr.indexOf(manh) === -1) {
                manh_arr.push(manh);
                var tennh = $("#datalistOptions option[value='" + manh + "']")
                    .text();
                $("#ds").append('<option value="' + manh + '">' + tennh +
                    '</option>');
            }
            $(".search").on("click", function(e) {
                e.preventDefault();
                // alert('quá mệt mõi gòi');
                $.post('search.php', {
                    manh_arr: manh_arr,
                    check: 4
                }, function(data) {

                    if (map) {
                        map.remove();
                    }
                    var mapOptions = {
                        center: [10.029294, 105.769436],
                        zoom: 12
                    };
                    map = new L.map('map', mapOptions);
                    var layer = new L.TileLayer(
                        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                    map.addLayer(layer);


                    var markers = [];
                    var old_marker = null;
                    var routingControl = null;

                    var pgd_arr = JSON.parse(data);
                    pgd_arr.forEach(function(pgd) {
                        var marker = L.marker([parseFloat(pgd.pgd_vidox),
                            parseFloat(pgd.pgd_kinhdoy)
                        ]).addTo(map)

                        marker.bindPopup(
                            '<div class="row">' +
                            ' <h5>' + pgd.title + '</h5>' +
                            '<p><i class="fas fa-map-marker-alt"></i> &nbsp;' +
                            pgd.dc + '</p>' +
                            '<div class="col-5">' +
                            '<p><i class="fas fa-phone"></i> ' + pgd.sdt +
                            '</p>' +
                            '<a href="#" class="find-direction" data-lat="' +
                            parseFloat(pgd.pgd_vidox) + '" data-lng="' +
                            parseFloat(pgd.pgd_kinhdoy) +
                            '"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
                            '</div>' +
                            '<div class="col-7">' +
                            ' <img src="img/gd.png" style="width: 6rem;">' +
                            '</div>' +
                            '</div>'
                        );
                    });
                    marker.on('click', function() {
                        if (old_marker) {
                            old_marker.closePopup();
                        }
                        this.openPopup();
                        old_marker = this;

                        if (routingControl) {
                            map.removeControl(routingControl);
                        }
                    });
                    markers.push(marker);
                    document.addEventListener('click', function(event) {
                        if (event.target.classList.contains(
                                'find-direction')) {
                            var latitude = event.target
                                .getAttribute('data-lat');
                            var longitude = event.target
                                .getAttribute('data-lng');
                            find(latitude, longitude);
                        }
                    });

                    function find(latitude1, longitude1) {
                        if (navigator.geolocation) {
                            navigator.geolocation
                                .getCurrentPosition(
                                    function(position) {
                                        var latitude = position
                                            .coords
                                            .latitude;
                                        var longitude = position
                                            .coords
                                            .longitude;

                                        routingControl = L
                                            .Routing.control({
                                                waypoints: [
                                                    L
                                                    .latLng(
                                                        latitude,
                                                        longitude
                                                    ),
                                                    L
                                                    .latLng(
                                                        latitude1,
                                                        longitude1
                                                    )
                                                ],
                                                geocoder: L
                                                    .Control
                                                    .Geocoder
                                                    .nominatim(),
                                                routeWhileDragging: true,
                                                reverseWaypoints: true,
                                                showAlternatives: true,
                                                language: 'vi',
                                            }).addTo(map);
                                        map.closePopup();
                                    });
                        }
                    }

                });
                manh_arr = [];
                $("#ds").empty();
            });

        });
    });
    </script>

</body>

</html>