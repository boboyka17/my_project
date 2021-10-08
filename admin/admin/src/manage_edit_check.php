<?php
if (isset($_POST) and isset($_GET["id"])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id = $_GET["id"];
    $type = $_POST["type"];
    $sql = "UPDATE `service_type` SET st_type_name='$type' WHERE st_id='$id'";
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../manage_views.php?success=2");
    exit;
}
