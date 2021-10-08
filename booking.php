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
                    จองคิวขอใช้บริการ
                </span>
            </div>
        </div>
    </div>
    <!-- Page heading -->
    <div class="container p-t-4 p-b-40">
        <h2 class="f1-l-1 cl2">
            จองคิวขอใช้บริการ
        </h2>
    </div>
    <!-- Post -->
    <section class="bg0 p-b-55">
        <?php
        require_once('admin/staff/api/date_range.php');
        $result = get_service_active($conn);
        $count = $result->num_rows;
        if ($count >= 1) {
            $row = $result->fetch_assoc();
        ?>
            <div class="container">
                <div class="h3 text-center">
                    <?= $row["st_type_name"] ?>
                </div>
                <p><?= $row["sd_detail"] ?></p>
                <div class="row justify-content-center align-items-start" style="height:200px;">
                    <div class="col-lg-12">
                        <div class="row py-3">
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-6 text-center">
                                <a href="form_booking.php" class="form-btn-2 f1-s-1">จองคิวขอใช้สิทธิ</a>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-6 text-center">
                                <a href="booking_history.php" class="form-btn f1-s-1">ประวัติการจองคิว</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="container">
                <div class="alert alert-warning text-center" role="alert">
                    ขออภัยไม่มีบริการให้จองคิวในขณะนี้
                </div>
                <div class="text-center">
                    <a href="index.php" class="text-center">กลับสู่หน้าแรก</a>
                </div>
                <div class="row justify-content-center align-items-start" style="height:200px;">
                    <div class="col-lg-12">

                    </div>
                </div>
            </div>
        <?php
        }
        ?>
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
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>