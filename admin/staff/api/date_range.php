<?php
function date_conv($val)
{
    $result = explode('-', $val);
    return "$result[2]/$result[1]/$result[0]";
}
function get_date($id, $conn)
{
    $sql = "SELECT * FROM `service_date_range` WHERE ser_id='$id'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
// v1.1
function get_mounth($val)
{
    switch ($val) {
        case '01':
            return array("มกราคม", 31);
            break;
        case '02':
            return array("กุมภาพันธ์", 28);
            break;
        case '03':
            return array("มีนาคม", 31);
            break;
        case '04':
            return array("เมษายน", 30);
            break;
        case '05':
            return array("พฤษภาคม", 31);
            break;
        case '06':
            return array("มิถุนายน", 30);
            break;
        case '07':
            return array("กรกฎาคม", 31);
            break;
        case '08':
            return array("สิงหาคม", 31);
            break;
        case '09':
            return array("กันยายน", 30);
            break;
        case '10':
            return array("ตุลาคม", 31);
            break;
        case '11':
            return array("พฤศจิกายน", 30);
            break;
        case '12':
            return array("ธันวาคม", 31);
            break;
    }
}
function get_date_one($val, $case)
{
    $arrDate = explode('-', $val);
    switch ($case) {
        case 'd':
            return $arrDate[2];
        case 'm':
            return $arrDate[1];
        case 'y':
            return $arrDate[0];
        default:
            return false;
    }
}
// v1.4.0
function get_date_cal($conn)
{
    $sql = "SELECT * FROM `service_date_range` WHERE ser_status='A'";
    $result = $conn->query($sql) or die($conn->error);
    $row = $result->fetch_assoc();
    $id = $row["ser_id"];
    $first_day = get_date_one($row["ser_start_date"], 'd');
    $first_mounth = get_date_one($row["ser_start_date"], 'm');
    $first_year = get_date_one($row["ser_start_date"], 'y');
    $end_day = get_date_one($row["ser_end_date"], 'd');
    $end_mounth = get_date_one($row["ser_end_date"], 'm');
    $end_year = get_date_one($row["ser_end_date"], 'y');
    $total_mounth = ($end_mounth - $first_mounth) + 1;
    $date_obj = array();
    for ($i = 1; $i <= $total_mounth; $i++) {
        if ($i == 1) {
            $date_obj[$i - 1] = array(
                "ref" => $id,
                "S_D" => $first_day,
                "M" => $first_mounth,
                "Y" => $first_year,
                "E_D" => $end_day,
                "first_mounth_cout" => get_mounth($first_mounth)[1],
            );
        } else if ($i == $total_mounth) {
            $date_obj[$i - 1] = array(
                "ref" => $id,
                "S_D" => 1,
                "M" => $end_mounth,
                "Y" => $end_year,
                "E_D" => $end_day,
                "first_mounth_cout" => get_mounth($end_mounth)[1],
            );
        } else {
            $date_obj[$i - 1] = array(
                "ref" => $id,
                "S_D" => 1,
                "M" => $first_mounth + ($i - 1),
                "Y" => $end_year,
                "E_D" => get_mounth($first_mounth + ($i - 1))[1],
                "first_mounth_cout" => get_mounth($first_mounth + ($i - 1))[1],
            );
        }
    }
    return $date_obj;
    // return "$first_day-$first_mounth-$first_year";
}
function get_service_active($conn)
{
    $sql = "SELECT * FROM `service_date_range` s INNER JOIN `service_detail` ser ON s.sd_id=ser.sd_id INNER JOIN `service_type` st ON ser.st_id=st.st_id WHERE s.ser_status='A'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
$sql = "SELECT * FROM `service_date_range` s INNER JOIN `service_detail` ser ON s.sd_id=ser.sd_id INNER JOIN `service_type` st ON ser.st_id=st.st_id";
$result = $conn->query($sql) or die($conn->error);
