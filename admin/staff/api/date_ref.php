<?php
if (isset($_GET["id"])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id =  $_GET["id"];
    $sql = "SELECT * FROM `service_ref` WHERE ser_id='$id' ";
    $result = $conn->query($sql) or die($conn->error);
}
