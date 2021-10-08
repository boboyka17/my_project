<?php
session_start();
if (isset($_POST)) {
    include('../database/connect.php');
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $sql = "SELECT * FROM `staff` WHERE stf_username='$user' AND stf_password='$pass'";
    $result = $conn->query($sql) or die($conn->error);
    $count = $result->num_rows;
    if ($count < 1) {
        // redirect to login
        header("location:../index.php?error=1");
        exit;
    }
    $row = $result->fetch_assoc();
    $conn->close();
    $permission = $row["stf_permission"];
    $_SESSION["id"] = $row["stf_id"];
    $_SESSION["name"] = $row["stf_fullname"];
    $_SESSION["per"] = $permission;
    switch ($permission) {
        case 'A':
            header("location:../admin");
            exit;
        case 'S':
            header("location:../staff");
            exit;
        case 'G':
            header("location:../gm");
            exit;
        default:
            header("location:../index.php?error=1");
            exit;
    }
}
// redirect to login
header("location:../index.php?error=1");
exit;
