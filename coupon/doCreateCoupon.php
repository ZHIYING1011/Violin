<?php
require_once("../db_connect.php");


$coupon_sid = $_POST["coupon_sid"];
if (empty($coupon_sid)) {
    echo "序號不能為空";
    exit;
}
$coupon_name = $_POST["coupon_name"];
if (empty($coupon_name)) {
    echo "名稱不能為空";
    exit;
}

$coupon_info = $_POST["coupon_info"];
if (empty($coupon_info)) {
    echo "不能為空";
    exit;
}
$coupon_rewardType = $_POST["coupon_rewardType"];
$coupon_lowPrice = $_POST["coupon_lowPrice"];
$coupon_maxUse = $_POST["coupon_maxUse"];
$coupon_mode = $_POST["coupon_mode"];
$coupon_amount = $_POST["coupon_amount"];
$coupon_send = $_POST["coupon_send"];
$coupon_startDate = $_POST["coupon_startDate"];
$coupon_endDate = $_POST["coupon_endDate"];
$product_id = $_POST["product_id"];
$coupon_specifyDate = $_POST["coupon_specifyDate"];


$sql = "INSERT INTO coupon (coupon_sid, coupon_name,coupon_info, coupon_rewardType, coupon_lowPrice, coupon_maxUse, coupon_mode, coupon_amount, coupon_send, coupon_startDate, coupon_endDate, product_id, coupon_specifyDate)
	VALUES ('$coupon_sid','$coupon_name','$coupon_info', '$coupon_rewardType', '$coupon_lowPrice', '$coupon_maxUse', '$coupon_mode', '$coupon_amount', '$coupon_send', '$coupon_startDate', '$coupon_endDate', '$product_id', '$coupon_specifyDate')";

echo $sql;

if (!isset($_POST["coupon_sid"])) {
    echo "請循正常管道進入此頁";
    exit;
}





//檢查帳號是否重複，要進入DB檢查
$sqlCheck = "SELECT * FROM coupon WHERE coupon_sid ='$coupon_sid'";
$result = $conn->query($sqlCheck);
$coupon_sidCount = $result->num_rows;
if ($coupon_sidCount > 0) {
    echo "該序號已存在";
    exit;
}


if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "新資料輸入成功， id 為 $last_id";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
};

//回使用者列表
header("location:coupon.php");
// echo $sql;
$conn->close();
