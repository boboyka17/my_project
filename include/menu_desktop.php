<?php
$url_array =  explode('/', $_SERVER['REQUEST_URI']);
$url = end($url_array);
$url = explode('?', $url);
$url = $url[0];
if ($url == '') {
    $url = "index.php";
}
$member_path = array('booking.php', 'form_booking.php');
?>
<nav class="menu-desktop">
    <ul class="main-menu">
        <li class="main-menu-<?php if ($url == 'index.php') echo "active" ?>">
            <a href="index.php">หน้าแรก</a>
        </li>
        <li class="main-menu-<?php if (in_array($url, $member_path)) echo "active" ?>">
            <a href="booking.php">จองคิวขอใช้บริการ</a>
        </li>

        <li>
            <a href=" #" class="arrow-down">Features</a>
            <ul class="sub-menu">
                <li><a href="category-01.html">Category Page v1</a></li>
                <li><a href="category-02.html">Category Page v2</a></li>
                <li><a href="blog-grid.html">Blog Grid Sidebar</a></li>
                <li><a href="blog-list-01.html">Blog List Sidebar v1</a></li>
                <li><a href="blog-list-02.html">Blog List Sidebar v2</a></li>
                <li><a href="blog-detail-01.html">Blog Detail Sidebar</a></li>
                <li><a href="blog-detail-02.html">Blog Detail No Sidebar</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </li>
    </ul>
</nav>