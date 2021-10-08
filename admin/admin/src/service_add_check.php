<?php
if (isset($_POST)) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $type = $_POST["type"];
    $service = $_POST["service"];
    $sql_get = "SELECT sd_id FROM `service_detail`  ORDER BY sd_id DESC limit 1;";
    $result = $conn->query($sql_get) or die($conn->error);
    $pk = $result->fetch_array();
    if ($pk != '') {
        $pk = intval(substr($pk[0], 2));
    }
    $current_pk =  "sd" . str_pad($pk + 1, 5, "0", STR_PAD_LEFT);
    $sql = "INSERT INTO `service_detail`() VALUES ('$current_pk','$service','$type')";
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../service_views.php?success=1");
    exit;
}
