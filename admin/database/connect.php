<?php
$user = "root";
$pass = "";
$db = "request_system";
$server = "localhost";
$conn = new mysqli($server, $user, $pass, $db);
if ($conn->connect_errno) {
    die($conn->connect_error);
}
