<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <link rel="stylesheet" href="css/morris.css">
    <title>Thống kê</title>
    
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>
    <script src="://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

</head>
<?php
    session_start();
?>
<body>
    <div class="d-flex" id="wrapper">
        <?php include('sidebar.php'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php include('nav.php'); ?>

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