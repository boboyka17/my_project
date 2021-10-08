<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff</title>

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
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- bs-stepper -->
    <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">

</head>
<style>
    body {
        font-family: 'Kanit', sans-serif;
    }

    datalist {
        width: 100%;
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
                            <h1 class="m-0">บันทึกข้อมูลผู้เข้าใช้บริการ</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                                <li class="breadcrumb-item active">บันทึกข้อมูลผู้เข้าใช้บริการ</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-start">
                        <div class="col-md-4 col-sm-12 col-12">
                            <!-- <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-copy"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">ช่วงเวลา</span>
                                    <span class="info-box-number"> รายการ</span>
                                </div>
                            </div> -->
                            <!-- /.info-box-content -->
                            <!-- /.info-box -->
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-file-alt"></i> แบบฟอร์มบันทึกข้อมูลผู้เข้าใช้บริการ</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="">
                                <label for="">ประเภทบริการ</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="id">
                                        <option selected value="">กรุณาเลือกประเภทบริการ</option>
                                        <?php
                                        require_once('api/date_range.php');
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <option <?php if (isset($_GET["id"])) {
                                                        if ($_GET["id"] == $row["sd_id"]) echo "selected";
                                                    } ?> value="<?= $row["sd_id"] ?>"><?= $row["st_type_name"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-success">ยืนยัน</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_GET["id"])) {
                                $id = $_GET["id"];
                                require_once('api/date_ref.php');
                            ?>
                                <form action="src/save.php?id=<?= $id ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">ชื่อ-สกุล</label>
                                                <input name="fullname" class="form-control" id="browser" placeholder="กรุณาป้อนชื่อ-สกุล" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">ประเภทความพิการ</label>
                                                <select class="custom-select" name="type_dis" id="" required>
                                                    <option value="">กรุณาเลือกประเภทความพิการ</option>
                                                    <option value="">ความพิการประเภทที่ 1</option>
                                                    <option value="">ความพิการประเภทที่ 2</option>
                                                    <option value="">ความพิการประเภทที่ 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">อายุ</label>
                                                <input type="number" name="age" class="form-control" placeholder="กรุณาป้อนอายุ" required>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                            }
                                ?>



                        </div>

                        <!-- /.card-body -->
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success">บันทึก</button>
                    </div>
                    </form>
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
    <script src="dist/js/adminlte.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- bs-stepper -->
    <script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
</body>
<script>
    $(function() {
        $("#example1").DataTable({
            "processing": true,
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
                    location.href = "src/date_del_check.php?id=" + id;
                })
            }
        })
    }
</script>
<script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
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