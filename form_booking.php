<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('include/head.php')
    ?>
</head>
<style>
    a.form-btn {
        border: none;
        background-color: white;
        border: 2px solid #B90072;
        color: #B90072 !important;
        padding: 5px 20px;
        font-size: 1.25em;
        border-radius: 20px;
        cursor: pointer;
    }

    a.form-btn-2 {
        border: none;
        background-color: #B90072;
        color: white !important;
        padding: 5px 20px;
        font-size: 1.25em;
        border-radius: 20px;
        cursor: pointer;
    }

    a.form-btn:hover {
        background-color: #B90072;
        color: white !important;
        border: 2px solid white;
        transition: 0.25s;
    }

    a.form-btn-2:hover {
        background-color: white;
        color: #B90072 !important;
        border: 2px solid #B90072;
        transition: 0.25s;
    }

    .form-control {
        height: 50px !important;
    }
</style>

<body class="animsition">

    <!-- Header -->
    <?php
    include('include/header.php')
    ?>
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="index.php" class="breadcrumb-item f1-s-3 cl9">
                    หน้าแรก
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    จองคิวขอใช้บริการ <code>ปรับเป็น dynamic</code>
                </span>
            </div>
        </div>
    </div>
    <!-- Page heading -->
    <div class="container p-t-4 p-b-20">
        <h2 class="f1-l-1 cl2">
            จองคิวขอใช้บริการ
        </h2>
    </div>
    <!-- Post -->
    <section class="bg0 p-b-55">
        <div class="container">

            <div class="row justify-content-center align-items-start">
                <div class="col-lg-12">
                    <div class="row py-3">
                        <div class="col-md-12 col-lg-12 p-b-80">
                            <div class="p-r-10 p-r-0-sr991">
                                <div class="mb-3">
                                    <a href="booking.php" class="btn btn-secondary text-white">ย้อนกลับ</a>
                                </div>
                                <div class="card">
                                    <div class="text-center text-white card-header f1-l-2" style="background-color:#B90072;">
                                        แบบฟอร์มกรอกข้อมูลส่วนตัว
                                    </div>
                                    <div class="card-body">
                                        <form action="src/booking_check.php" method="post" class="row needs-validation" novalidate>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label class="f1-l-2 mb-3">
                                                        ชื่อ
                                                    </label>
                                                    <input name="firstname" type="text" class=" form-control  f1-l-2" placeholder="กรุณาป้อนชื่อ" required>
                                                    <div class="invalid-feedback">
                                                        กรุณาป้อนชื่อ
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label class="f1-l-2 mb-3">
                                                        นามสกล
                                                    </label>
                                                    <input name="lastname" type="text" class=" form-control f1-l-2" placeholder="กรุณาป้อนนามสกุล" required>
                                                    <div class="invalid-feedback">
                                                        กรุณาป้อนนามสกล
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label class="f1-l-2 mb-3">
                                                        เบอร์โทร
                                                    </label>
                                                    <input name="phone" type="text" class=" form-control f1-l-2" placeholder="กรุณาป้อนเบอร์โทร" data-inputmask="'mask': ['999-999-9999']" data-mask required>
                                                    <div class="invalid-feedback">
                                                        กรุณาป้อนเบอร์โทร
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label class="f1-l-2 mb-3">
                                                        เพศ
                                                    </label>
                                                    <select name="gender" id="" class="form-control f1-l-2" required>
                                                        <option value="">กรุณาเลือกเพศ</option>
                                                        <option value="M">ชาย</option>
                                                        <option value="W">หญิง</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        กรุณาเลือกเพศ
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                                                <button class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
                                                    บันทึก
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include("include/footer.php")
    ?>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <span class="fas fa-angle-up"></span>
        </span>
    </div>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/fullcalendar/main.js"></script>
    <!--===============================================================================================-->

    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <!-- <script src="vendor/bootstrap/js/popper.js"></script> -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <!-- <script src="admin/plugins/moment/moment.min.js"></script> -->
    <!-- <script src="admin/plugins/fullcalendar/main.js"></script> -->
    <!-- Select2 -->
    <script src="admin/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/inputmask/jquery.inputmask.min.js"></script>

    <script src="js/validation.js"></script>

</body>
<script>
    $(function() {
        //Phone
        $('[data-mask]').inputmask()
        // $.validator.setDefaults({
        //     submitHandler: function() {
        //         alert("Form successful submitted!");
        //     }
        // });
    })
</script>

</html>