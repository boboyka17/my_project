<?php
if (isset($_GET["id"])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id =  $_GET["id"];
    $sql = "SELECT * FROM `staff` WHERE stf_id='$id'";
    $result = $conn->query($sql) or die($conn->error);
}
