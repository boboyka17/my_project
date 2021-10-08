<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
    body {
        font-family: 'Kanit', sans-serif;
    }

    .login-box {
        width: auto;
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline">
            <div class="card-header text-center bg-dark">
                <div class="d-flex flex-row align-items-center">
                    <img src="dist/img/icon.png" alt="AdminLTE Logo" width="100">
                    <div class="d-flex flex-column align-items-start ml-2">
                        <span style="font-size:1.25em;"> <b> กรมส่งเสริมและ</b></span>
                        <div style="width:100%;">
                            <hr style="margin:0px 0px;background-color:white;">
                        </div>
                        <span style="font-size:1.25em;"> <b> พัฒนาคุณภาพชีวิตคนพิการ </b></span>
                    </div>
                </div>
                <!-- <h1 class="h1"><b>asdas</b>สฟหก</h1> -->
            </div>
            <div class="card-body">

                <form action="auth/check_login.php" class="mb-3" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="user" class="form-control" placeholder="ชื่อผู้ใช้">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="รหัสผ่าน">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
                <p class="mb-1 text-center">
                    <a href="forgot-password.html">ลืมรหัสผ่าน</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <p class="mt-3 text-center">
            <a href="../index.php">กลับสู่หน้าหลัก</a>
        </p>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>