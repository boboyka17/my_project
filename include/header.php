<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
                    <a href="#" class="left-topbar-item">
                        เกี่ยวกับเรา
                    </a>

                    <a href="#" class="left-topbar-item">
                        ติดต่อเรา
                    </a>

                    <a href="admin" class="left-topbar-item">
                        สำหรับเจ้าหน้าที่
                    </a>
                </div>

                <div class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-line"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.php"><img src="logo101.png" alt="IMG-LOGO" style="max-height:100%;"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <?php include('menu_mobie.php') ?>

        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="index.php"><img src="logo101.png" width="500" alt="IMG-LOGO"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <?php include('menu_desktop.php') ?>
            </div>
        </div>
    </div>
</header>