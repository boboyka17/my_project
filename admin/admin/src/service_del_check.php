<?php
if (isset($_GET["id"])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM `service_detail` WHERE sd_id='$id'";
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../service_views.php");
    exit;
}
