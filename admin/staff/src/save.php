<?php
if (isset($_POST) and isset($_GET["id"])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id = $_GET["id"];
    print_r($_POST);
    $fullname = $_POST["fullname"];
    $type_dis = $_POST["type_dis"];
    $age = $_POST["age"];
    $sql = "INSERT INTO `service` (s_fullname,s_age,d_type,st_id) VALUES('$fullname','$age','$type_dis','$id')";
    if (!$conn->query($sql)) die($conn->error);
    header("location:../save_views.php?success=1");
    exit;
}
