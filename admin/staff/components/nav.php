<?php
session_start();
if (!isset($_SESSION["id"]) and !isset($_SESSION["per"])) {
    header("location:../index.php?id=1");
    exit;
} else if ($_SESSION["per"] != 'S') {
    header("location:../index.php?per=1");
    exit;
}
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">หน้าแรก</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="mr-2"><?= $_SESSION["name"] ?></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="profile_edit.php" class="dropdown-item">
                    แก้ไขข้อมูลส่วนตัว
                </a>
                <a href="../auth/logout.php" class="dropdown-item">
                    ออกจากระบบ
                </a>
            </div>
        </li>
    </ul>
</nav>