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
if (isset($_POST)) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $title = $_POST["title"];
    $date_range = $_POST["date_range"];
    $total_day = $_POST["total_day"];
    $per_day = $_POST["per_day"];
    $arr_date = explode('-', $date_range);
    $start_date = date_con($arr_date[0]);
    $end_date = date_con($arr_date[1]);
    $sql = "INSERT INTO `service_date_range` (sd_id,ser_start_date,ser_end_date,ser_total_days,ser_user_per_day,ser_status) 
            VALUES ('$title','$start_date','$end_date','$total_day','$per_day','D')";
    if (!$conn->query($sql)) die($conn->error);
    header("location:../date_views.php?success=1");
    exit;
}
