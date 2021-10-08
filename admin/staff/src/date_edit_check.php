<?php
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
    $arrDate = explode('/', $date);
    $newDate = sprintf("%s-%s-%s", spile($arrDate[2]), spile($arrDate[1]), spile($arrDate[0]));
    return  $newDate;
}
if (isset($_POST) and isset($_GET["id"])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $id = $_GET["id"];
    $title = $_POST["title"];
    $date_range = $_POST["date_range"];
    $total_day = $_POST["total_day"];
    $per_day = $_POST["per_day"];
    $arr_date = explode('-', $date_range);
    $start_date = date_con($arr_date[0]);
    $end_date = date_con($arr_date[1]);
    $sql = "UPDATE `service_date_range` SET sd_id='$title',ser_start_date='$start_date',ser_end_date='$end_date',ser_total_days='$total_day',ser_user_per_day='$per_day'  
            WHERE ser_id='$id'";

    if (!$conn->query($sql)) die($conn->error);
    header("location:../date_views.php?success=2");
    exit;
}
