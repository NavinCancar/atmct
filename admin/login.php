<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Đăng nhập</title>
</head>

<body class="d-flex" id="login-wrapper">
    <form id="form-login" class="mx-auto pt-6 login-form">
        <div class="sidebar-heading text-center py-2 primary-text fs-2 fw-bold text-uppercase text-center">
            <img src="image/logo.png" width="80px">
        </div>
        <h3 class="text-center">ĐĂNG NHẬP</h3>
        <div class="mb-3 mt-4">
            <label for="exampleInputText1" class="form-label">Tài khoản:</label>
            <input type="text" class="form-control login-form-control" id="exampleInputText1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu:</label>
            <input type="password" class="form-control login-form-control" id="exampleInputPassword1">
        </div>
        <button type="button" id="checklogin" class="btn btn-search btn-login mt-3">Đăng nhập</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            var btn = document.getElementById('checklogin');
            btn.disabled = true;
            $("#form-login").on("change", function() {
                var taikhoanInput = $('#exampleInputText1').val();
                var matkhauInput = $('#exampleInputPassword1').val();

                if(taikhoanInput != "" && matkhauInput != ""){
                    if (taikhoanInput == "admin" && matkhauInput == "1234") {
                        btn.disabled = false;
                    }
                    else {
                        btn.disabled = true;
                    }
                }
                else {
                    btn.disabled = true;
                }

                $(".btn-login").on("click", function() {
                    if (taikhoanInput == "admin" && matkhauInput == "1234") {
                        window.location.href = "index.php";
                    }
                });
            });
        });
    </script>
</body>

</html>