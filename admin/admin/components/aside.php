<?php
$url_array =  explode('/', $_SERVER['REQUEST_URI']);
$url = end($url_array);
$url = explode('?', $url);
$url = $url[0];
if ($url == '') {
    $url = "index.php";
}
$post_views = array('post_views.php');
$manage_views = array('manage_views.php');
$service_views = array('service_views.php');
$user_views = array('user_views.php', 'user_add.php', 'user_detail.php', 'user_edit.php');
$disabled_views = array('disabled_views.php', 'disabled_add.php', 'disabled_edit.php');

?>
<aside class="main-sidebar sidebar-dark-maroon elevation-4 text-white">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
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
                    <a href="post_views.php" class="nav-link <?php if (in_array($url, $post_views)) echo "active" ?>">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            เพิ่มข่าวสารเว็บไซต์
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="user_views.php" class="nav-link <?php if (in_array($url, $user_views)) echo "active" ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            จัดการสมาชิก
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="disabled_views.php" class="nav-link <?php if (in_array($url, $disabled_views)) echo "active" ?>">
                        <i class="nav-icon fas fa-wheelchair"></i>
                        <p>
                            ประเภทความพิการ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="manage_views.php" class="nav-link <?php if (in_array($url, $manage_views)) echo "active" ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            ประเภทและบริการ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="service_views.php" class="nav-link <?php if (in_array($url, $service_views)) echo "active" ?>">
                        <i class="nav-icon fas fa-hands"></i>
                        <p>
                            สิทธิและบริการ
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>