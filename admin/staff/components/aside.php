<?php
$url_array =  explode('/', $_SERVER['REQUEST_URI']);
$url = end($url_array);
$url = explode('?', $url);
$url = $url[0];
if ($url == '') {
    $url = "index.php";
}
$date_views = array('date_views.php', 'date_add.php', 'date_edit.php', 'date_views_ref.php');
$post_views = array('post_views.php');
$save_views = array('save_views.php');
$user_views = array('user_views.php', 'user_add.php', 'user_detail.php', 'user_edit.php');
?>
<aside class="main-sidebar sidebar-dark-maroon elevation-4 text-white">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <div class="d-flex col align-items-center">
            <img src="../dist/img/icon.png" alt="AdminLTE Logo" width="50" style="opacity: .8">
            <div class="d-flex flex-column align-items-start ml-2">
                <span style="font-size:0.70em;">กรมส่งเสริมและ</span>
                <div style="width:100%;">
                    <hr style="margin:0px 0px;background-color:white;">
                </div>
                <span style="font-size:0.70em;">พัฒนาคุณภาพชีวิตคนพิการ</span>
            </div>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php if ($url == 'index.php') echo "active" ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            หน้าแรก
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="save_views.php" class="nav-link <?php if (in_array($url, $save_views)) echo "active" ?>">
                        <i class="nav-icon fas fa-save"></i>
                        <p>
                            บันทึกข้อมูลผู้เข้าใช้บริการ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="date_views.php" class="nav-link <?php if (in_array($url, $date_views)) echo "active" ?>">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            กำหนดช่วงเวลา
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>