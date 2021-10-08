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
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
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
                            <h1 class="m-0">เพิ่มช่วงเวลา</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                                <li class="breadcrumb-item active"><a href="date_views.php">กำหนดช่วงเวลา</a></li>
                                <li class="breadcrumb-item active">เพิ่มช่วงเวลา</li>
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
                            <h3 class="card-title"><i class="fa fa-plus"></i> แบบฟอร์มเพิ่มข้อมูลช่วงเวลา</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-calendar-day"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">ระยะเวลาที่เปิดให้บริการ</span>
                                            <span id="total_service" class="info-box-number h2"></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">จำนวนคนเข้าใช้บริการทั้งหมด</span>
                                            <span id="total_user" class="info-box-number h2"></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                </div>
                            </div>
                            <form action="src/date_add_check.php" method="post" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputBorderWidth2">ประเภทบริการ</label>
                                            <select name="title" class="custom-select" id="" required>
                                                <option value="">กรุณาเลือกประเภทบริการ</option>
                                                <?php
                                                require_once("../admin/api/manage.php");
                                                while ($row = $result->fetch_assoc()) {
                                                ?>
                                                    <option value="<?= $row["sd_id"] ?>"><?= $row["st_type_name"] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                            <div class="invalid-feedback">
                                                กรุณาป้อนข้อมูล
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label>ช่วงเวลาที่ต้องการเปิด</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input name="date_range" type="text" class="form-control float-right" id="reservation" name="datefilter" value="" placeholder="ตั้งแต่วันที่ - ถึงวันที่" required />
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-dark" type="button" id="clear">ล้าง</button>
                                                </div>
                                                <div class="invalid-feedback">
                                                    กรุณาป้อนข้อมูล
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 col-sm-12 d-none">
                                        <div class="form-group">
                                            <label>ระยะเวลา</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input name="total_day" type="text" class="form-control float-right" id="totaldays" name="datefilter" value="" placeholder="ระยะเวลา" required />
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        วัน
                                                    </span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    กรุณาป้อนข้อมูล
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorderWidth2">จำนวนคนเข้าใช้บริการต่อวัน</label>
                                            <div class="input-group">
                                                <input name="per_day" id="per_day" type="number" min='1' oninput="validity.valid||(value='');" class="form-control " id="exampleInputBorderWidth2" placeholder="กรุุณาป้อนจำนวนคนเข้าใช้บริการต่อวัน" required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        คนต่อวัน
                                                    </span>
                                                </div>
                                                <div id="totla_ser_inp" class="invalid-feedback">
                                                    กรุณาป้อนข้อมูล
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-md-6 col-lg-6  d-none">
                                        <div class="form-group">
                                            <label for="exampleInputBorderWidth2">จำนวนคนเข้าใช้บริการทั้งหมด</label>
                                            <div class="input-group">
                                                <input id="total_allday" type="number" min='1' oninput="validity.valid||(value='');" class="form-control " id="exampleInputBorderWidth2" placeholder="กรุุณาป้อนจำนวนคนเข้าใช้บริการต่อวัน" required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        คน
                                                    </span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    กรุณาป้อนข้อมูล
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /form -->
                    <div class="row">
                        <div class="col-12">
                            <a href="date_views.php" class="btn btn-secondary">ยกเลิก</a>
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
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- InputMask -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <script src="dist/js/validation.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#reservation').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    format: 'DD/MM/YYYY',
                    applyLabel: "นำมาใช้",
                    cancelLabel: "ยกเลิก",
                    daysOfWeek: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
                    monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม']
                },
            }).on('apply.daterangepicker', function(ev, picker) {
                var start = moment(picker.startDate.format('YYYY-MM-DD'));
                var end = moment(picker.endDate.format('YYYY-MM-DD'));
                var diff = start.diff(end, 'days'); // returns correct number
                var totalDate = Math.abs(diff);
                $('#totaldays').val(totalDate + 1)
                $('#total_service').html(totalDate + 1 + ' วัน')
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('#reservation').on('input', function() {
                $(this).val('');
            })
            $('#clear').click(function() {
                $('#reservation').val('')
                $('#totaldays').val('')
                $('#per_day').val('')
                $('#total_allday').val('')
                $('#total_service').html('')
                $('#total_user').html('')
            })
            $('#per_day').on('input', function() {
                let total = Number($('#totaldays').val());
                let input = Number($(this).val());
                if (total != 0) {
                    $('#total_allday').val(total * input)
                    $('#total_user').html(total * input + ' คน')
                } else {
                    $('#reservation').focus()
                    $(this).val('')
                }
                // console.log(total * input);

            })
        });

        // $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
        //     $(this).val('');
        // });
    </script>
</body>

</html>