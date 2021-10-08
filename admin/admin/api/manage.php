<?php
function get_manage_type($id, $conn)
{
    $sql = "SELECT * FROM `service_type` WHERE st_id='$id'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
function get_manage_type_notuse($conn)
{
    $sql = "SELECT * FROM `service_type` st LEFT JOIN service_detail sd ON st.st_id=sd.st_id WHERE sd.st_id IS  NULL";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
function get_service($id, $conn)
{
    $sql = "SELECT * FROM `service_type` st INNER JOIN service_detail sd ON st.st_id=sd.st_id WHERE sd.sd_id='$id'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
function get_manage_type_all($conn)
{
    $sql = "SELECT * FROM `service_type`";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
$sql = "SELECT * FROM `service_type` st INNER JOIN service_detail sd ON st.st_id=sd.st_id";
$result = $conn->query($sql) or die($conn->error);
