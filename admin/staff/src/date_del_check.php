<?php
if (isset($_GET["id"])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM `service_date_range` WHERE ser_id ='$id'";
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../date_views.php");
    exit;
}
