<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/morris.css">
    <title>ATM Cần Thơ - Admin</title>
    <link rel="shortcut icon" href="image/logo.png" type="image/x-icon" />
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>
    <script src="://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

</head>
<?php include('connect.php');
    session_start();
?>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-2 fw-bold text-uppercase border-bottom">
                <img src="image/logo.png" width="80px">
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>Tổng quan
                </a>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn list-group-item list-group-item-action bg-transparent primary-text fw-bold"
                                data-bs-toggle="collapse" href="#collapse1">
                                <i class="fas fa-building me-2"></i>Ngân hàng
                            </a>
                        </div>
                        <div id="collapse1" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <a href="them_nganhang.php"
                                    class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                                    Thêm ngân hàng
                                </a>
                                <a href="ds_nganhang.php"
                                    class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                                    Danh sách ngân hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn list-group-item list-group-item-action bg-transparent primary-text fw-bold"
                                data-bs-toggle="collapse" href="#collapse2">
                                <i class="fas fa-hand-holding-usd me-2"></i>Phòng giao dịch
                            </a>
                        </div>
                        <div id="collapse2" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <a href="input.html"
                                    class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                                    Thêm phòng giao dịch
                                </a>
                                <a href="table.html"
                                    class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                                    Danh sách phòng giao dịch
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="chart.html" class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                    <i class="fas fa-chart-bar me-2"></i>Thống kê
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <div class="today shadow-sm d-flex justify-content-around align-items-center rounded">
                        <h6><?php
				            $date_array = getdate();
				            $formated_date  = "Hôm nay là: ";
				            $formated_date .= $date_array['mday'] . "/";
				            $formated_date .= $date_array['mon'] . "/";
				            $formated_date .= $date_array['year'];
				            print $formated_date;
				        ?></h6>
                    </div>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-caret-down" style="color: #1e8383; font-size: 30px;"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="image/logo.png" width="40px" class="rounded-full border-5"></i> Nguyễn Hoàng Ngọc
                                Nguyên
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                                <li><a class="dropdown-item" href="login.html">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="p-3 bg-white shadow-sm text-center rounded">
                    <h2 class="fs-3 m-0 primary-text">BẢNG THỐNG KÊ</h2>
                    <hr>
                    <!-- <div class="panel-body">
                        <form role="form" action="thong_ke_qh.php" method="post">
                            <div class="form-group row time">
                                <div class="col-md-3"><b>Thống kê theo đơn vị hành chính:</b></div>
                                <select name="QH_TEN" id="qh" class="col-md-3"> <?php $sql = "SELECT * FROM Quan_huyen ";
                                    $result = mysqli_query($conn, $sql); 
                                    if ($result->num_rows > 0) { 
                                        while ($row = $result->fetch_assoc()) { echo "<option>" . $row['QH_TEN'] . "</option> "; } } ?> </select> 
                                <div class="col-md-3"><button type="submit" name= "thong_ke" class="btn btn-search">Thống kê</button></div>

                            </div>
                        </form> 
                       
                    </div> -->
                </div>
                <div class="row my-2 secondary-bg shadow-sm">
                    <h3 class="fs-4 mb-3 p-2 primary-bg text-light">THỐNG KÊ SỐ LƯỢNG TRỤ ATM THEO QUẬN/HUYỆN</h3>
                    <!--Content-->
                    <div class="col">
                        <div class="panel-body bg-white rounded shadow-sm text-center mb-3 pt-2">
                            <?php
                              $servername = "localhost";
                              $username = "root";
                              $password = "";
                              $dbname = "qltruatm";
                              $connect = mysqli_connect($servername, $username, $password, $dbname);

                              $query = "SELECT ngan_hang.NH_TEN, quan_huyen.qh_TEN as ten_quan_huyen, COUNT(tru_atm.ta_sohieu) as tong_so_atm 
                              FROM ngan_hang 
                              JOIN tru_atm ON ngan_hang.NH_MA = tru_atm.NH_MA
                              JOIN xa_phuong ON tru_atm.xp_ma = xa_phuong.xp_ma 
                              JOIN quan_huyen ON xa_phuong.qh_ma = quan_huyen.qh_ma 
                              GROUP BY ngan_hang.NH_MA, quan_huyen.qh_ma";
                              
                              $result = mysqli_query($connect, $query);
                              
                              $data = array();
                              while ($row = mysqli_fetch_assoc($result)) {
                                  $data[] = $row;
                              }
                              
                              // Chuyển đổi dữ liệu thành định dạng JSON
                              $data = json_encode($data);
                              
                              // Đóng kết nối CSDL
                              mysqli_close($connect);
                              ?>
                              <canvas id="bar-chart"></canvas>
    <script>
        // Lấy dữ liệu từ PHP
        var data = <?php echo $data; ?>;

        // Tạo các mảng để lưu trữ nhãn và dữ liệu cho biểu đồ
        var labels = [];
        var dataset = [];

        // Duyệt qua mảng dữ liệu và tách ra các giá trị cần thiết
        for (var i = 0; i < data.length; i++) {
            // Nếu nhãn chưa có trong mảng labels thì thêm vào
            if (labels.indexOf(data[i].ten_quan_huyen) == -1) {
                labels.push(data[i].ten_quan_huyen);
            }

            // Nếu dữ liệu của ngân hàng chưa có trong mảng dataset thì tạo mới
            var found = false;
            for (var j = 0; j < dataset.length; j++) {
                if (dataset[j].label == data[i].NH_TEN) {
                    found = true;
                    break;
                }
            }
            if (!found) {
                dataset.push({
                    label: data[i].NH_TEN,
                    data: [],
                    backgroundColor: 'rgba(' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ', 0.4)',
                    borderColor: 'rgba(' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ', 1)'
                });
            }

            // Thêm số lượng trụ ATM của ngân hàng tại quận huyện vào mảng dữ liệu tương ứng
            for (var j = 0; j < dataset.length; j++) {
                if (dataset[j].label == data[i].NH_TEN) {
                    dataset[j].data.push(data[i].tong_so_atm);
                    break;
                }
            }
        }

        // Tạo đối tượng dữ liệu cho biểu đồ
        var chartData = {
            labels: labels,
            datasets: dataset
        };

        // Lấy phần tử canvas từ HTML
        var ctx = document.getElementById('bar-chart').getContext('2d');

        // Khởi tạo biểu đồ cột
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
                              
                            
                        </div>
                    </div>
                    
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