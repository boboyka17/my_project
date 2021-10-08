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
                            <h1 class="m-0">กำหนดช่วงเวลา</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                                <li class="breadcrumb-item active">กำหนดช่วงเวลา</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php
            require_once('api/date_range.php');
            $count = $result->num_rows;
            ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-start">
                        <div class="col-md-4 col-sm-12 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-copy"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">ช่วงเวลา</span>
                                    <span class="info-box-number"><?= $count ?> รายการ</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="nav-icon fas fa-clock"></i> ข้อมูลช่วงเวลา</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center mb-3">
                                <div class="col-12 col-md-3 col-lg-2 col-sm-12"><a href="date_add.php" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> เพิ่มข้อมูลช่วงเวลา</a></div>
                            </div>
                            <hr>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th>ประเภทบริการ</th>
                                        <th>วันเริ่มต้น</th>
                                        <th>วันสิ้นสุด</th>
                                        <th>วันทั้งหมด</th>
                                        <th>จำนวนผู้ใช้บริการ / ต่อวัน</th>
                                        <th>สถาณะ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- V1.0.2 -->
                                    <?php
                                    $i = 1;
                                    while ($row = $result->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td><?= $row[11] ?></td>
                                            <td><?= date_conv($row[2]) ?></td>
                                            <td><?= date_conv($row[3]) ?></td>
                                            <td><?= $row[4] ?> วัน</td>
                                            <td><?= $row[5] ?> คน</td>
                                            <!-- <td>
                                                <?php
                                                if ($row[6] == 'A') {
                                                ?>
                                                    <span class="badge rounded-pill bg-success">เปิดการใช้งาน</span>
                                                <?php
                                                } else  if ($row[6] == 'D') {
                                                ?>
                                                    <span class="badge rounded-pill bg-secondary">ปิดการใช้งาน</span>
                                                <?php
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </td> -->
                                            <td>
                                                <?php
                                                if ($row[6] == 'A') {
                                                ?>
                                                    <div class="custom-control custom-switch">
                                                        <input checked type="checkbox" value="A" onchange='update(this,"<?= $row[0] ?>")' class="custom-control-input switch" id="<?= $row[0] ?>">
                                                        <label class="custom-control-label text-success" id="label_<?= $row[0] ?>" for="<?= $row[0] ?>">เปิดการใช้งาน</label>
                                                    </div>
                                                <?php
                                                } else  if ($row[6] == 'D') {
                                                ?>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" value="D" onchange='update(this,"<?= $row[0] ?>")' class="custom-control-input switch" id="<?= $row[0] ?>">
                                                        <label class="custom-control-label text-secondary" id="label_<?= $row[0] ?>" for="<?= $row[0] ?>">ปิดการใช้งาน</label>
                                                    </div>
                                                <?php
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="date_views_ref.php?id=<?= $row[0] ?>" class="btn btn-sm bg-gradient-success mr-2">เรียกดูข้อมูล</a>
                                                    <a href="date_edit.php?id=<?= $row[0] ?>" class="btn btn-sm bg-gradient-primary mr-2">แก้ไข</a>
                                                    <button onclick="del('<?php echo $row[0]; ?>')" class="btn btn-sm bg-gradient-danger">ลบ</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th>ประเภทบริการ</th>
                                        <th>วันเริ่มต้น</th>
                                        <th>วันสิ้นสุด</th>
                                        <th>วันทั้งหมด</th>
                                        <th>จำนวนผู้ใช้บริการ / ต่อวัน</th>
                                        <th>สถาณะ</th>
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
    <script src="dist/js/adminlte.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- AXIOS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
<script>
    $(function() {
        $("#example1").DataTable({
            "processing": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        })
        $(".switch").on('change', function() {
            var checkedValue = $(this).prop('checked');
            // uncheck sibling checkboxes (checkboxes on the same row)
            $('tr').find('input[type="checkbox"]').each(function() {
                $(this).prop('checked', false);
                $(this).val('D')
                $(this).next().removeClass('text-success')
                $(this).next().addClass('text-secondary')
                $(this).next().text('ปิดการใช้งาน')
            });
            $(this).prop("checked", checkedValue);
            $(this).val('A')
            if (checkedValue) {
                $(this).next().removeClass('text-secondary')
                $(this).next().addClass('text-success')
                $(this).next().text('เปิดการใช้งาน')
            }


        });
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

    function update(elm, myid) {
        var mystate = elm.value;
        console.log(mystate);
        // if (mystate == 'A') {
        //     elm.value = 'D';
        // } else if (mystate == 'D') {
        //     elm.value = 'A';
        // }
        // console.log(myid + mystate);
        // axios({
        //     method: 'post',
        //     url: 'src/date_update_status.php',
        //     data: {
        //         id: 'myid',
        //         state: 'mystate'
        //     }
        // }).then(function(response) {
        //     console.log(response);
        // }).catch(function(error) {
        //     console.log(error);
        // })
        var url = "src/date_update_status.php";
        // Send a POST request
        axios({
            method: 'post',
            url: url,
            data: {
                id: myid,
                state: mystate
            }
        }).then(function(res) {
            if (res.data == 'D') {
                // console.log('chang this to A');

            } else if (res.data == 'A') {
                // console.log('chang this to D');

            }
        }).catch(function(err) {
            console.log(err);
        });


    }
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