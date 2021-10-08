<?php
if (isset($_GET["id"])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM `staff` WHERE stf_id='$id'";
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../user_views.php");
    exit;
}
