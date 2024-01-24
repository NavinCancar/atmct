<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thống kê</title>
    <?php
        include('head.php');
        include('connect.php');
    ?>
    <script src="js/morris.js"></script>
    <script src="://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <?php
                include('nav.php');
        ?>
        </nav>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Thống kê</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Thống kê</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Analysis Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp orange-text" data-wow-delay="0.1s">Thống kê trụ ATM tại Cần Thơ</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <?php
                              $servername = "localhost";
                              $username = "root";
                              $password = "";
                              $dbname = "qltruatm";
                              $connect = mysqli_connect($servername, $username, $password, $dbname);

                              $query = "SELECT ngan_hang.NH_TEN, 
                              quan_huyen.qh_TEN as ten_quan_huyen, 
                              COUNT(tru_atm.ta_sohieu) as tong_so_atm 
                              FROM ngan_hang 
                              CROSS JOIN quan_huyen 
                              LEFT JOIN xa_phuong ON quan_huyen.qh_ma = xa_phuong.qh_ma 
                              LEFT JOIN tru_atm ON ngan_hang.NH_MA = tru_atm.NH_MA AND xa_phuong.xp_ma = tru_atm.xp_ma 
                              GROUP BY ngan_hang.NH_TEN, quan_huyen.qh_TEN;";
                              
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
                    backgroundColor: 'rgba(' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ', 0.6)',
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
        <!-- Analysis End -->


        <!-- Footer Start -->
        <?php
                include('footer.php');
        ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-orange btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>
</html>