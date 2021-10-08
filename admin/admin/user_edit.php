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
                            <h1 class="m-0">แก้ไขข้อมูลสมาชิก</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                                <li class="breadcrumb-item active"><a href="user_views.php">จัดการสมาชิก</a></li>
                                <li class="breadcrumb-item active">แก้ไขข้อมูลสมาชิก</li>
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
                            <h3 class="card-title"><i class="fa fa-plus"></i> แบบฟอร์มแก้ไขข้อมูลสมาชิก</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            include('api/getUser.php');
                            $row = $result->fetch_array();
                            $name  = explode(' ', $row[1]);
                            ?>
                            <form id="quickForm" action="src/user_edit_check.php?id=<?= $id ?>" method="post">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">ชื่อ</label>
                                            <input value="<?= $name[0] ?>" type="text" name="firstname" class="form-control form-control-border border-width-2" id="" placeholder="กรุุณาป้อนชื่อ" required>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">นามสกุล</label>
                                            <input value="<?= $name[1] ?>" type="text" name="lastname" class="form-control form-control-border border-width-2" id="" placeholder="กรุุณาป้อนนามสกุล" required>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">ชื่อผู้ใช้ (Username) </label>
                                            <input value="<?= $row[2] ?>" id="user" name="user" type="text" class="form-control form-control-border border-width-2" onchange="isEng(this.value)" id="" placeholder="กรุุณาป้อนชื่อผู้ใช้" required>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">รหัสผ่าน</label>
                                            <input value="<?= $row[3] ?>" id="pass" name="pass" type="password" class="form-control form-control-border border-width-2" id="" placeholder="กรุุณาป้อนรหัสผ่าน" required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="">ยืนยันรหัสผ่าน</label>
                                        <input disabled id="con_pass" onkeypress="check_match(this.value)" type="password" class="form-control form-control-border border-width-2" id="" placeholder="กรุุณายืนยันรหัสผ่าน">
                                        <div id="feed-conpass" class="invalid-feedback">
                                            กรุณาป้อนข้อมูลให้ครบถ้วน.
                                        </div>
                                    </div>
                                </div> -->
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="">ตำแหน่ง</label>
                                            <select name="position" id="" class="custom-select form-control-border border-width-2" required>
                                                <option value="">กรุณาเลือกตำแหน่ง</option>
                                                <option <?php if ($row[4] == '1') echo "selected"; ?> value="1">พัฒนาสังคมและมั่นคงของมนุษย์จังหวัดสุราษฎร์ธานี</option>
                                                <option <?php if ($row[4] == '2') echo "selected"; ?> value="2">ผู้อำนวยการศูนย์บริการคนพิการจังหวัด สุราษฎร์ธานี</option>
                                                <option <?php if ($row[4] == '3') echo "selected"; ?> value="3">เจ้าหน้าที่นิติกร</option>
                                                <option <?php if ($row[4] == '4') echo "selected"; ?> value="4">เจ้าหน้าที่พัฒนาสังคม</option>
                                                <option <?php if ($row[4] == '5') echo "selected"; ?> value="5">เจ้าหน้าที่นักสังคมสงเคราะห์</option>
                                                <option <?php if ($row[4] == '6') echo "selected"; ?> value="6">เจ้าหน้าที่นักวิเคราะห์นโยบายและแผน</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <!-- <div class="form-group">
                                        <label for="">เบอร์โทร</label>
                                        <input id="phone" name="phone" type="text" class="form-control form-control-border border-width-2" onchange="isPhone(this.value)" placeholder="กรุณาป้อนเบอร์โทร" required>
                                        <div id="feed-phone" class="invalid-feedback">
                                            กรุณาป้อนข้อมูลให้ครบถ้วน.
                                        </div>
                                    </div> -->
                                        <div class="form-group">
                                            <label>เบอร์โทร</label>
                                            <div class="input-group">
                                                <input value="<?= $row[5] ?>" name="phone" type="text" class="form-control form-control-border border-width-2" placeholder="xxx-xxx-xxxx" data-inputmask="'mask': ['999-999-9999']" data-mask required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>

                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="">อีเมล</label>
                                            <input value="<?= $row[6] ?>" name="email" type="text" class="form-control form-control-border border-width-2" placeholder="กรุณาป้อนอีเมล" required>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="">สิทธิการใช้งานระบบ</label>
                                            <select name="permission" id="" class="custom-select form-control-border border-width-2" required>
                                                <option value="">กรุณาเลือกสิทธิการใช้งานระบบ</option>
                                                <option <?php if ($row[7] == 'A') echo "selected"; ?> value="A">ผู้ดูแลระบบ</option>
                                                <option <?php if ($row[7] == 'S') echo "selected"; ?> value="S">เจ้าหน้าที่</option>
                                                <option <?php if ($row[7] == 'G') echo "selected"; ?> value="G">ผู้บริหาร</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /form -->
                    <div class="row">
                        <div class="col-12">
                            <a href="user_views.php" class="btn btn-secondary">ยกเลิก</a>
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
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- jquery-validation -->
    <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

    <script>
        function isEng(input) {
            const elm_input = document.getElementById('user');
            const elm_feed = document.getElementById('feed-user');
            const eng = /^([a-zA-Z])+$/;
            const result = eng.test(input);
            if (!result) {
                elm_input.classList.add('is-invalid')
                elm_feed.textContent = "กรุณาป้อนข้อมูลเป็นภาษาอังกฤษ"
            }
        }

        function pass() {
            document.getElementById('con_pass').removeAttribute('disabled')
        }

        function check_match(data) {
            console.log(data);
        }
    </script>
    <script>
        $(function() {
            //Phone
            $('[data-mask]').inputmask()
            // $.validator.setDefaults({
            //     submitHandler: function() {
            //         alert("Form successful submitted!");
            //     }
            // });
            $.validator.addMethod(
                "regex",
                function(value, element, regexp) {
                    var re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
                "กรุณาป้อนชื่อผู้ใช้เป็นภาษาอังกฤษเท่านั้น"
            );
            $('#quickForm').validate({
                rules: {
                    user: {
                        regex: "^[a-zA-Z0-9$@$!%*?&#^-_. +]+$",
                        remote: {
                            url: "api/userValidate_edit.php",
                            type: "post"
                        }
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    pass: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    firstname: {
                        required: "กรุณาป้อนชื่อ"
                    },
                    lastname: {
                        required: "กรุณาป้อนนามสกุล"
                    },
                    user: {
                        required: "กรุณาป้อนชื่อผู้ใช้",
                        remote: "ชื่อผู้ใช้ดังกล่าวถูกนำมาใช้แล้วโปรดป้อนชื่อผู้ใช้ใหม่"
                    },
                    email: {
                        required: "กรุณาป้อนอีเมล",
                        email: "กรุณาป้อนอีเมลให้ถูกต้อง"
                    },
                    position: {
                        required: "กรุณาเลือกตำแหน่ง"
                    },
                    phone: {
                        required: "กรุณาป้อนเบอร์โทร"
                    },
                    permission: {
                        required: "กรุณาเลือกสิทธิการใช้งานระบบ"
                    },
                    pass: {
                        required: "กรุณาป้อนรหัสผ่าน",
                        minlength: "รหัสผ่านต้องมี 8 ตัวอักษรขึ้นไป"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        })
    </script>
</body>

</html>