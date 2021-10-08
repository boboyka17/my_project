<?php
if (isset($_POST) and isset($_GET["id"])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id = $_GET["id"];
    $type = $_POST["type"];
    $service = $_POST["service"];
    $sql = "UPDATE `service_detail` SET sd_detail='$service',st_id='$type' WHERE sd_id='$id'";
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../service_views.php?success=2");
    exit;
}
