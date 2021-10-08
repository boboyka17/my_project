<?php
if (isset($_POST)) {
    include($_SERVER['DOCUMENT_ROOT'] . '/project/admin/database/connect.php');
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $fullname = sprintf("%s %s", $firstname, $lastname);
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $position = $_POST["position"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $permission = $_POST["permission"];
    $sql_get = "SELECT stf_id FROM `staff`  ORDER BY stf_id DESC limit 1;";
    $result = $conn->query($sql_get) or die($conn->error);
    // Check Exist User V1
    // $sql_get_exist = "SELECT stf_username FROM `staff` WHERE stf_username = '$user'";
    // $result_exist = $conn->query($sql_get_exist) or die($conn->error);
    // $user_exist = $result_exist->num_rows;
    // if ($user_exist > 0) {
    //     header("location:../user_add.php?error=1");
    //     exit;
    // }
    $pk = $result->fetch_array();
    $pk = intval(substr($pk[0], 2));
    // echo $pk;
    $current_pk =  "s" . str_pad($pk + 1, 4, "0", STR_PAD_LEFT);
    echo $current_pk;
    $sql = "INSERT INTO `staff`() VALUES ('$current_pk','$fullname','$user','$pass','$position','$phone','$email','$permission')";
    echo $sql;
    if (!$conn->query($sql)) die($conn->error);
    $conn->close();
    header("location:../user_views.php?success=1");
    exit;
}
