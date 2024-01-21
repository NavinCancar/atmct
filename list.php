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

                    <div class="row g-2 p-4">

                        <div class="col-md-12">
                            <div class="text-white">
                                <?php
                                      if(isset($_GET['check']) && $_GET['check'] == 1){
                                        echo'
                                        <h4> CÁC Phòng giao dịch của ngân hàng '.$_GET['tennh'].'</h4>
                                       <p>
                                        Tìm phòng giao dịch gần nhất: <span><button type="button"
                                        class="btn btn-light" onclick="min()" ><i class="fas fa-search"></i></button></span>
                                       </p>
                                        ';
                                      }
                                      else{
                                        echo'
                                        <h4> CÁC trụ ATM của ngân hàng '.$_GET['tennh'].'</h4>
                                       <p>
                                        Tìm trụ ATM gần nhất: <span><button type="button"
                                        class="btn btn-light"  onclick="min()" ><i class="fas fa-search"></i></button></span>
                                       </p>
                                        ';
                                      }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <!-- Map -->
                <div class="d-flex">
                    <div id="mySidebar" class="sidebar" style="max-width: 250px">
                        <div id="list-location" style="max-height: 35rem; overflow-y: auto;">
                            <?php
                                 if(isset($_GET['check']) && $_GET['check'] == 1){
                                    $manh = $_GET['manh'];
                                    $pgd = "SELECT DISTINCT * FROM phong_giao_dich WHERE NH_MA = '". $manh."'";
                                    $result_pgd = $conn->query($pgd);
                                            while ($row_pgd = $result_pgd->fetch_assoc()) {
                                                $title = $row_pgd["PGD_TEN"]. ' - '.$row_pgd["PGD_DIACHI"];
                                                $qh ="SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
                                                WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
                                                AND xa_phuong.XP_MA = '".$row_pgd['XP_MA']."' ";
                                                $result_qh = $conn->query($qh);
                                                $row_qh = $result_qh->fetch_assoc();
                                                $dc = $row_pgd['PGD_DIACHI'].', '.$row_qh['XP_TEN'].', '.$row_qh['QH_TEN'].', Cần thơ.';

                                                echo'
                                                <div class="card text-dark m-1 p-2">
                                                    <h6>'.$title.'</h6>
                                                    <p><i class="fas fa-map-marker-alt"></i> &nbsp; '.$dc.' </p>
                                                    <p><i class="fas fa-phone"></i>'.$row_pgd["PGD_SDT"].' </p>
                                                    <div class="d-flex">
                                                        <a href="#" onclick="findMarker(this)" data-lat="'.$row_pgd["PGD_VIDOX"].'"
                                                        data-lng="'.$row_pgd["PGD_KINHDOY"].'" class="findRoute card-link text-primary p-0" style="margin-top: auto; margin-bottom: auto">
                                                        <i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>
                                                        <img src="img/logo/1.png" width="50px" class="float-end" style="margin-left: auto">
                                                    </div>
                                                </div>
                 
                                                ';
                                                }
                                        }
                                        // atm 
                                        if(isset($_GET['check']) && $_GET['check'] == 2){
                                            $manh = $_GET['manh'];
                                            $TA = "SELECT DISTINCT * FROM tru_atm WHERE NH_MA = '". $manh."'";
                                            $i=1;
                                            $result_TA = $conn->query($TA);
                                                    while ($row_TA = $result_TA->fetch_assoc()) {
                                                        $title ='Trụ '.$i.' - '. $row_TA["TA_SOHIEU"]. ' - '.$row_TA["TA_DIACHI"];
                                                        $i++;
                                                        $qh ="SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
                                                        WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
                                                        AND xa_phuong.XP_MA = '".$row_TA['XP_MA']."' ";
                                                        $result_qh = $conn->query($qh);
                                                        $row_qh = $result_qh->fetch_assoc();
                                                        $dc = $row_TA['TA_DIACHI'].', '.$row_qh['XP_TEN'].', '.$row_qh['QH_TEN'].', Cần thơ.';
                        
                                                        echo'
                                                        <div class="card text-dark m-1 p-2">
                                                            <h6>'.$title.'</h6>
                                                            <p><i class="fas fa-map-marker-alt"></i> &nbsp; '.$dc.' </p>
                                                           
                                                            <div class="d-flex">
                                                            <a href="#" onclick="findMarker(this)" lat="'.$row_TA["TA_VIDOX"].'" lng="'.$row_TA["TA_KINHDOY"].'" class="findRoute card-link text-primary p-0" style="margin-top: auto; margin-bottom: auto">
                                                            <i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>
                                                                <img src="img/logo/1.png" width="50px" class="float-end" style="margin-left: auto">
                                                            </div>
                                                        </div>
                         
                                                        ';
                                                        }
                                                }
                                    ?>



                        </div>
                    </div>
                    <!-- Map -->
                    <div id="map-container" class="flex-grow-1 d-flex p-0">
                        <button class="btn btn-orange" onclick="toggleNav()"><i id="iconToggle"
                                class="fas fa-chevron-left"></i></button>
                        <div id="map" style="border:1px; width: 100%; height: 35rem" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></div>
                    </div>
                </div>

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
        <script>
        /*****H Start*****/
        var PGDIcon = L.Icon.extend({
            options: {
                shadowUrl: 'img/shadow.png',
                iconSize: [38, 48],
                shadowSize: [50, 38],
                iconAnchor: [18, 42],
                shadowAnchor: [25, 30],
                popupAnchor: [-3, -76]
            }
        });

        var ATMIcon = L.Icon.extend({
            options: {
                shadowUrl: 'img/shadow.png',
                iconSize: [32, 45],
                shadowSize: [50, 38],
                iconAnchor: [0, 42],
                shadowAnchor: [12, 30],
                popupAnchor: [-3, -76]
            }
        });
        /*****H End*****/
        var mapOptions = {
            center: [10.029294, 105.769436],
            zoom: 12
        };
        var map = new L.map('map', mapOptions);
        var layer = new
        L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);
        var markers = [];
        var old_marker = null;
        var routingControl = null;

        <?php 
        if(isset($_GET['check']) && $_GET['check'] == 1){
            $manh = $_GET['manh'];
            $pgd = "SELECT DISTINCT * FROM phong_giao_dich WHERE NH_MA = '". $manh."'";
            $result_pgd = $conn->query($pgd);
                    while ($row_pgd = $result_pgd->fetch_assoc()) {
                        $title = $row_pgd["PGD_TEN"]. ' - '.$row_pgd["PGD_DIACHI"];
                        $qh ="SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
                        WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
                        AND xa_phuong.XP_MA = '".$row_pgd['XP_MA']."' ";
                        $result_qh = $conn->query($qh);
                        $row_qh = $result_qh->fetch_assoc();
                        $dc = $row_pgd['PGD_DIACHI'].', '.$row_qh['XP_TEN'].', '.$row_qh['QH_TEN'].', Cần thơ.';
                        ?>
        /*****H Start*****/
        var pgdIcon = new PGDIcon({
            iconUrl: "img/pgd/<?php echo $row_pgd["NH_MA"]; ?>.png"
        });
        var marker = L.marker([<?php echo $row_pgd["PGD_VIDOX"]; ?>, <?php echo $row_pgd["PGD_KINHDOY"]; ?>], {
            icon: pgdIcon
        }).addTo(map);
        /*****H End*****/
        marker.bindPopup(
            '<div class="row">' +
            ' <h5><?php echo $title?></h5>' +
            '<p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $dc?></p>' +
            '<div class="col-5">' +
            '<p><i class="fas fa-phone"></i> <?php echo $row_pgd["PGD_SDT"]?></p>' +
            '<a href="#" onclick="findMarker(this)" data-lat="<?php echo $row_pgd["PGD_VIDOX"] ?>" data-lng="<?php echo $row_pgd["PGD_KINHDOY"] ?>"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
            '</div>' +
            '<div class="col-7">' +
            ' <img src = "img/logo/<?php echo $row_pgd["NH_MA"]; ?>.png" width = "70px" class="float-end">' +
            '</div>'
        );
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

        function findMarker(a) {
            var latitude = a.getAttribute('data-lat');
            var longitude = a.getAttribute('data-lng');
            find(latitude, longitude);
        }

        function find(latitude1, longitude1) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    routingControl = L.Routing.control({
                        waypoints: [
                            L.latLng(latitude, longitude),
                            L.latLng(latitude1, longitude1)
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
        <?php 
    } // white
 } // isset
        if(isset($_GET['check']) && $_GET['check'] == 2){
            $manh = $_GET['manh'];
            $TA = "SELECT DISTINCT * FROM tru_atm WHERE NH_MA = '". $manh."'";
            $i=1;
            $result_TA = $conn->query($TA);
                    while ($row_TA = $result_TA->fetch_assoc()) {
                        $title ='Trụ '.$i.' - '. $row_TA["TA_SOHIEU"]. ' - '.$row_TA["TA_DIACHI"];
                        $i++;
                        $qh ="SELECT XP_TEN, QH_TEN FROM xa_phuong, quan_huyen
                        WHERE xa_phuong.QH_MA = quan_huyen.QH_MA 
                        AND xa_phuong.XP_MA = '".$row_TA['XP_MA']."' ";
                        $result_qh = $conn->query($qh);
                        $row_qh = $result_qh->fetch_assoc();
                        $dc = $row_TA['TA_DIACHI'].', '.$row_qh['XP_TEN'].', '.$row_qh['QH_TEN'].', Cần thơ.';
                        ?>

        /*****H Start*****/
        var atmIcon = new ATMIcon({
            iconUrl: "img/atm/<?php echo $row_TA["NH_MA"]; ?>.png"
        });
        var marker = L.marker([<?php echo $row_TA["TA_VIDOX"]; ?>, <?php echo $row_TA["TA_KINHDOY"]; ?>], {
            icon: atmIcon
        }).addTo(map);
        /*****H End*****/
        marker.bindPopup(
            '<div class="row">' +
            ' <h5><?php echo $title?></h5>' +
            '<p><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $dc?></p>' +
            '<div class="col-5">' +
            '<a href="#" onclick="findMarker(this)" lat="<?php echo $row_TA["TA_VIDOX"] ?>" lng="<?php echo $row_TA["TA_KINHDOY"] ?>"><i class="fas fa-directions fs-3"></i>&nbsp; Tìm đường</a>' +
            '</div>' +
            '<div class="col-7">' +
            ' <img src = "img/logo/<?php echo $row_TA["NH_MA"]; ?>.png" width = "70px" class="float-end">' +
            '</div>'
        );
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

        function findMarker(a) {
            var latitude = a.getAttribute('lat');
            var longitude = a.getAttribute('lng');
            find(latitude, longitude);
        }

        function find(latitude1, longitude1) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    routingControl = L.Routing.control({
                        waypoints: [
                            L.latLng(latitude, longitude),
                            L.latLng(latitude1, longitude1)
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

        <?php } 
     } ?>

        function min() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    var currentPosition = L.latLng(latitude, longitude);
                    var destinations = [
                        <?php
                            if(isset($_GET['check']) && $_GET['check'] == 1){
                                $manh = $_GET['manh'];
                                $PGD = "SELECT DISTINCT * FROM phong_giao_dich WHERE NH_MA = '".$manh.
                                "'";
                                $result_PGD = $conn -> query($PGD);
                                while ($row_PGD = $result_PGD->fetch_assoc()) {
                                    echo '
                                    L.latLng('.$row_PGD["PGD_VIDOX"] .', '.$row_PGD["PGD_KINHDOY"].'),
                                        ';
                                } 
                            }
                            else{
                                $manh = $_GET['manh'];
                                $TA = "SELECT DISTINCT * FROM tru_atm WHERE NH_MA = '".$manh.
                                "'";
                                $result_TA = $conn -> query($TA);
                                while ($row_TA = $result_TA->fetch_assoc()) {
                                    echo '
                                    L.latLng('.$row_TA["TA_VIDOX"] .', '.$row_TA["TA_KINHDOY"].'),
                                        ';
                                } 
                            }
                        ?>

                    ];

                    var minDistance = Infinity;
                    var minDistanceLatLng;
                    var routesCount = 0;

                    function handleRoutesFound(e) {
                        var routes = e.routes;
                        var summary = routes[0].summary;
                        var d1 = summary.totalDistance;

                        if (d1 < minDistance) {
                            minDistance = d1;
                            minDistanceLatLng = e.waypoints[1].latLng;
                        }

                        routesCount++;
                        if (routesCount === destinations.length) {
                            displayRouteAndMarkers();
                        }
                    }

                    function displayRouteAndMarkers() {
                        L.Routing.control({
                            waypoints: [
                                currentPosition,
                                minDistanceLatLng
                            ],
                            routeWhileDragging: true,
                            language: 'vi'
                        }).addTo(map);
                    }

                    for (var i = 0; i < destinations.length; i++) {
                        var lat1 = destinations[i].lat;
                        var lg1 = destinations[i].lng;

                        var control = L.Routing.control({
                            waypoints: [
                                L.latLng(latitude, longitude),
                                L.latLng(lat1, lg1)
                            ]
                        });
                        control.on('routesfound', handleRoutesFound);
                        control.route();
                    }
                });
            }
        }
        </script>


</body>

</html>