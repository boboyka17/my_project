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
                            <h1 class="m-0">เพิ่มข้อมูลประเภทความพิการ</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                                <li class="breadcrumb-item"><a href="disabled_views.php">จัดข้อมูลประเภทความพิการ</a></li>
                                <li class="breadcrumb-item active">เพิ่มข้อมูลประเภทความพิการ</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <!-- Form -->
                    <div class="card card-maroon">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-plus"></i> แบบฟอร์มเพิ่มมูลประเภทความพิการ</a></h3>
                        </div>
                        <?php
                        if (isset($_GET["id"])) {
                            $id = $_GET["id"];
                        }
                        include('api/disabled_type.php');
                        $result = get_dis($id, $conn);
                        $row = $result->fetch_array();
                        ?>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="quickForm" action="src/disabled_edit_check.php?id=<?= $row[0] ?>" method="post">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="">ชื่อประเภทความพิการ</label>
                                            <input value="<?= $row[1] ?>" type="text" name="type" class="form-control form-control-border border-width-2" id="" placeholder="กรุุณาป้อนชื่อประเภทบริการ" required>

                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /form -->
                    <div class="row">
                        <div class="col-12">
                            <a href="manage_views.php" class="btn btn-secondary">ยกเลิก</a>
                            <button class="btn btn-success float-right">บันทึกข้อมูล</button>
                        </div>
                    </div>
                    </form>
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
    <script src="dist/js/adminlte.min.js"></script>
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