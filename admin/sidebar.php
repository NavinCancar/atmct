<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-2 fw-bold text-uppercase border-bottom">
        <img src="image/logo.png" width="80px">
    </div>
    <div class="list-group list-group-flush my-3">
        <a href="index.html" class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
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
                        <a href="Them_nganhang.php"
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
                        <a href="them_phonggiaodich.php"
                            class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                            Thêm phòng giao dịch
                        </a>
                        <a href="ds_phonggiaodich.php"
                            class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                            Danh sách phòng giao dịch
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <a class="btn list-group-item list-group-item-action bg-transparent primary-text fw-bold"
                        data-bs-toggle="collapse" href="#collapse3">
                        <i class="fas fa-building me-2"></i>Trụ ATM
                    </a>
                </div>
                <div id="collapse3" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        <a href="Them_truatm.php"
                            class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                            Thêm trụ atm
                        </a>
                        <a href="ds_truatm.php"
                            class="list-group-item list-group-item-action bg-transparent primary-text fw-bold">
                            Danh sách atm
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