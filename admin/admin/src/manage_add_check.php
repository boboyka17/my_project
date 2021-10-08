<?php
if (isset($_POST)) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $type = $_POST["type"];
    $sql_get = "SELECT st_id FROM `service_type`  ORDER BY st_id DESC limit 1;";
    $result = $conn->query($sql_get) or die($conn->error);
    $pk = $result->fetch_array();
    if ($pk != '') {
        $pk = intval(substr($pk[0], 2));
    }
    // echo $pk;
    $current_pk =  "st" . str_pad($pk + 1, 2, "0", STR_PAD_LEFT);
    $sql = "INSERT INTO `service_type`() VALUES ('$current_pk','$type')";
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../manage_views.php?success=1");
    exit;
}
