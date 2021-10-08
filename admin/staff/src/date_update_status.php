<?php
if (isset($_POST)) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data["id"];
    $state = $data["state"];
    if ($state == 'A') {
        $sql = "UPDATE service_date_range SET ser_status='D' WHERE ser_id='$id'";
        // $sql_2 = "UPDATE service_date_range SET ser_status='D' WHERE ser_id!='$id'";
        if (!$conn->query($sql)) die($conn->error);
        // if (!$conn->query($sql_2)) die($conn->error);
        echo json_encode('A');
    } else if ($state == 'D') {
        $sql = "UPDATE service_date_range SET ser_status='A' WHERE ser_id='$id'";
        $sql_2 = "UPDATE service_date_range SET ser_status='D' WHERE ser_id!='$id'";
        if (!$conn->query($sql)) die($conn->error);
        if (!$conn->query($sql_2)) die($conn->error);
        echo json_encode('D');
    }
}
