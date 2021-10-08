<?php
function get_dis($id, $conn)
{
    $sql = "SELECT * FROM `disabled_type` WHERE d_id='$id'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
$sql = "SELECT * FROM `disabled_type`";
$result = $conn->query($sql) or die($conn->error);
