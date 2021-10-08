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
                            <h1 class="m-0">จัดการสมาชิก</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                                <li class="breadcrumb-item active">จัดการสมาชิก</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php
            include('api/user_type.php')
            ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-start">
                        <div class="col-md-3 col-sm-12 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-indigo"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">สมาชิกทั้งหมด</span>
                                    <span class="info-box-number"><?= get_type('total') ?> คน</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-12 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-navy"><i class="fas fa-users-cog"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">ผู้ดูแลระบบ</span>
                                    <span class="info-box-number"><?= get_type('A') ?> คน</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-12 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">เจ้าหน้าที่</span>
                                    <span class="info-box-number"><?= get_type('S') ?> คน</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-12 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon"><i class="fas fa-user-tie"></i></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">ผู้บริหาร</span>
                                    <span class="info-box-number"><?= get_type('G') ?> คน</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="nav-icon fas fa-user"></i> ข้อมูลสมาชิก</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center mb-3">
                                <div class="col-12 col-md-3 col-lg-2 col-sm-12"><a href="user_add.php" class="btn bg-gradient-primary btn-block"><i class="fa fa-plus"></i> เพิ่มสมาชิก</a></div>
                            </div>
                            <hr>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">รหัสสมาชิก</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>เบอร์โทร</th>
                                        <th>สิทธิการใช้งาน</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- V1.0.2 -->
                                    <?php
                                    require_once('api/user.php');
                                    while ($row = $result->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td>
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
                                                ?></td>
                                            <td><?= $row[5] ?></td>
                                            <td>
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
                                                ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="user_detail.php?id=<?= $row[0] ?>" class="btn btn-sm bg-gradient-success mr-2">เรียกดู</a>
                                                    <a href="user_edit.php?id=<?= $row[0] ?>" class="btn btn-sm bg-gradient-primary mr-2">แก้ไข</a>
                                                    <button onclick="del('<?php echo $row[0]; ?>')" class="btn btn-sm bg-gradient-danger">ลบ</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>รหัสสมาชิก</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>เบอร์โทร</th>
                                        <th>สิทธิการใช้งาน</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        })
    });
</script>
<script type="text/javascript">
    function del(id) {
        console.log(id);
        Swal.fire({
            title: 'คุณแน่ใจไหมที่จะลบข้อมูล?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'ลบข้อมูลสำเร็จ',
                    text: "ระบบได้ทำการลบข้อมูลเรียบร้อยแล้ว",
                    icon: 'success',
                    confirmButtonColor: '#4285F4',
                    confirmButtonText: 'ตกลง'
                }).then(function() {
                    location.href = "src/user_del_check.php?id=" + id;
                })
            }
        })
    }
</script>
</script>
<?php
if (isset($_GET["success"])) {
    if ($_GET["success"] == '1') {
?>
        <script>
            Swal.fire({
                title: 'บันทึกข้อมูลสำเร็จ',
                text: "ระบบได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว",
                icon: 'success',
                confirmButtonColor: '#4285F4',
                confirmButtonText: 'ตกลง'
            })
        </script>
    <?php
    }
    if ($_GET["success"] == '2') {
    ?>
        <script>
            Swal.fire({
                title: 'แก้ไขข้อมูลสำเร็จ',
                text: "ระบบได้ทำการแก้ไขข้อมูลเรียบร้อยแล้ว",
                icon: 'success',
                confirmButtonColor: '#4285F4',
                confirmButtonText: 'ตกลง'
            })
        </script>
    <?php
    }
    ?>
<?php
}
?>

</html>