<?php
function get_type($type)
{
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    if ($type == 'total') {
        $sql = "SELECT * FROM `staff`";
        $result = $conn->query($sql) or die($conn->error);
        $num = $result->num_rows;
        return $num;
    } else {
        $sql = "SELECT * FROM `staff` WHERE `stf_permission`='$type'";
        $result = $conn->query($sql) or die($conn->error);
        $num = $result->num_rows;
        return $num;
    }
}
