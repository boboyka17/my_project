<?php
include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
$sql = "SELECT * FROM `staff`";
$result = $conn->query($sql) or die($conn->error);
