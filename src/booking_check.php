<?php
session_start();
if (isset($_POST)) {
    $_SESSION["data"] = $_POST;
    header("location:../form_pre_booking.php");
    exit;
}
