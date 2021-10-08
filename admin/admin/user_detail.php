<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<style>
    body {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php

        include "components/nav.php";
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include "components/aside.php";
        ?>
        <!-- /.main sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">เรียกดูสมาชิก</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                                <li class="breadcrumb-item"><a href="user_views.php">จัดการสมาชิก</a></li>
                                <li class="breadcrumb-item active">เรียกดูสมาชิก</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-12 col-12">
                            <!-- /.info-box -->
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="row mb-3 ">
                        <!-- <div class="col-2"> -->
                        <a href="user_views.php" class="btn btn-secondary mr-3">ย้อนกลับ</a>

                        <!-- </div> -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="nav-icon fas fa-user"></i> ข้อมูลสมาชิก</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            include('api/getUser.php');
                            $row = $result->fetch_array();
                            ?>
                            <dl class="row">
                                <dt class="col-sm-2">รหัสสมาชิก</dt>
                                <dd class="col-sm-9">
                                    <?= $row[0] ?>
                                </dd>
                                <dt class="col-sm-2">ชื่อสกุล</dt>
                                <dd class="col-sm-9">
                                    <?= $row[1] ?>
                                </dd>
                                <dt class="col-sm-2">ชื่อผู้ใช้</dt>
                                <dd class="col-sm-9">
                                    <?= $row[2] ?>
                                </dd>
                                <dt class="col-sm-2">รหัสผ่าน</dt>
                                <dd class="col-sm-9">
                                    <?= $row[3] ?>
                                </dd>
                                <dt class="col-sm-2">ตำแหน่ง</dt>
                                <dd class="col-sm-9">
                                    <?php
                                    switch ($row[4]) {
                                        case '1':
                                            echo "พัฒนาสังคมและมั่นคงของมนุษย์จังหวัดสุราษฎร์ธานี";
                                            break;
                                        case '2':
                                            echo "ผู้อำนวยการศูนย์บริการคนพิการจังหวัด สุราษฎร์ธานี";
                                            break;
                                        case '3':
                                            echo "เจ้าหน้าที่นิติกร";
                                            break;
                                        case '4':
                                            echo "เจ้าหน้าที่พัฒนาสังคม";
                                            break;
                                        case '5':
                                            echo "เจ้าหน้าที่นักสังคมสงเคราะห์";
                                            break;
                                        case '6':
                                            echo "เจ้าหน้าที่นักวิเคราะห์นโยบายและแผน";
                                            break;
                                        default:
                                            echo "N/A";
                                            break;
                                    }
                                    ?>
                                </dd>
                                <dt class="col-sm-2">เบอร์โทร</dt>
                                <dd class="col-sm-9">
                                    <?= $row[5] ?>
                                </dd>
                                <dt class="col-sm-2">อีเมล</dt>
                                <dd class="col-sm-9">
                                    <?= $row[6] ?>
                                </dd>
                                <dt class="col-sm-2">สิทธิการใช้งาน</dt>
                                <dd class="col-sm-9">
                                    <?php
                                    switch ($row[7]) {
                                        case 'A':
                                            echo "ผู้ดูแลระบบ";
                                            break;
                                        case 'S':
                                            echo "เจ้าหน้าที่";
                                            break;
                                        case 'G':
                                            echo "ผู้บริหาร";
                                            break;
                                        default:
                                            echo "N/A";
                                            break;
                                    }
                                    ?>
                                </dd>

                            </dl>
                            <div class="row justify-content-center">
                                <a href="user_edit.php?id=<?= $id ?>" class="btn btn-primary float-right">แก้ไข</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /Table -->
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                กรมส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ จังหวัดสุราษฎร์ธานี
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>
<script>
    $(function() {
        $("#example1").DataTable()
    });
</script>

</html>