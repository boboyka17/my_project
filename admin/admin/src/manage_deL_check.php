<?php
if (isset($_POST)) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM `service_type` WHERE st_id='$id'";
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../manage_views.php");
    exit;
}
