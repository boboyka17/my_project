<?php
if (isset($_POST)) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $type = $_POST["type"];
    $sql = "INSERT INTO `disabled_type`(d_name) VALUES ('$type')";
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../disabled_views.php?success=1");
    exit;
}
