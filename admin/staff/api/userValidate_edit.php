<?php
// Check Exist User V2
include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
$requestedUser  = $_REQUEST['user'];
$result = $conn->query("SELECT stf_username FROM staff WHERE stf_username!='$requestedUser'");
$registeredUser = array();
while ($row = $result->fetch_array()) {
    $registeredUser[] = $row[0];
}
if (in_array($requestedUser, $registeredUser)) {
    echo 'false';
} else {
    echo 'true';
}
