<?php
session_start();
function spile($val)
{
    $result = explode(' ', $val);
    if ($result[0] == '') {
        return $result[1];
    } else {
        return $result[0];
    }
}
function date_con($date)
{
    $arrDate = explode('-', $date);
    $newDate = sprintf("%s-%s-%s", spile($arrDate[2]), spile($arrDate[1]), spile($arrDate[0]));
    return  $newDate;
}
if (isset($_GET["date"]) and isset($_SESSION["data"]) and isset($_GET["id"])) {
    include('../admin/database/connect.php');
    $id = $_GET["id"];
    $first_name =  $_SESSION["data"]["firstname"];
    $lastname =  $_SESSION["data"]["lastname"];
    $phone =  $_SESSION["data"]["phone"];
    $gender =  $_SESSION["data"]["gender"];
    $fullname = "$first_name $lastname";
    $od_date = $_GET["date"];
    $_SESSION["date"]["day"] = $od_date;
    $new_date = date_con($od_date);
    $sql = "INSERT INTO `service_ref` (ref_fullname,ref_phone,ref_gender,ref_date,ser_id)
            VALUES ('$fullname','$phone','$gender','$new_date','$id')";
    // echo $sql;
    if (!$conn->query($sql)) {
        die($conn->error);
    }
    header("location:../booking_complete.php");
    exit;
}
