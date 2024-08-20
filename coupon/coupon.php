<?php
require_once("../db_connect.php");

if (isset($_GET["date"])) {
    $date = $_GET["date"];
    $title = $date;
    $whereClause = "WHERE user_order.order_date = '$date'";
} elseif (isset($_GET["user"])) {
    $user = $_GET["user"];
    $title = "";
    $whereClause = "WHERE user_order.user_id = '$user'";
} elseif (isset($_GET["product"])) {
    $product = $_GET["product"];
    // $title = "";
    $whereClause = "WHERE user_order.product_id = '$product'";
} elseif (isset($_GET["coupon_startDate"]) && isset($_GET["coupon_endDate"])) {
    $coupon_startDate = $_GET["coupon_startDate"];
    $coupon_endDate = $_GET["coupon_endDate"];
    $title = "$coupon_startDate ~ $coupon_endDate";
    $whereClause = "WHERE user_order.order_date BETWEEN '$coupon_startDate' AND '$coupon_endDate'";
} else {
    $title = "";
    $whereClause = "";
}

$sql = "SELECT * FROM coupon";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

if (isset($_GET["user"])) {
    $title = $rows[0]["user_name"];
}
if (isset($_GET["product"])) {
    $title = $rows[0]["product_name"];
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Order List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <?php include("../css.php") ?>
</head>

<body>
    <div class="container pt-3">
        <div class="p-3 bg-white shadow rounded-2 mb-4 border">
            <div class="row g-2 align-items-center mb-2">
                <?php if (isset($_GET["date"]) || (isset($_GET["user"])) || (isset($_GET["product"]))) : ?>
                    <div class="col-auto">
                        <a class="btn btn-primary" href="order-list.php"><i class="fa-solid fa-circle-chevron-left"></i></a>
                    </div>
                <?php endif; ?>
                <div class="col">
                    <h1 class="m-0"><?= $title ?></h1>
                </div>
            </div>
            <?php if (!isset($_GET["product"]) && !isset($_GET["user"]) && !isset($_GET["date"])) : ?>
                <div class="py-2">
                    <h4>優惠券列表</h4>
                    <form action="">
                        <?php
                        $today = date('Y-m-d');
                        $start = isset($_GET["coupon_startDate"]) ? $_GET["coupon_startDate"] :
                            $today;
                        $end = isset($_GET["coupon_endDate"]) ? $_GET["coupon_endDate"] : $today;
                        ?>
                        <div class="row g-2">
                            <?php if (isset($_GET["coupon_startDate"])) : ?>
                                <div class="col-auto">
                                    <a class="btn btn-primary" href="order-list.php"><i class="fa-solid fa-circle-chevron-left"></i></a>
                                </div>
                            <?php endif; ?>
                            <div class="col-3 form-floating">
                                <input type="coupon_name" class="form-control" id="coupon_name" placeholder="coupon_name" name="coupon_name">
                                <label for="coupon_name">優惠券名稱</label>
                            </div>
                            <div class="col-3 form-floating">
                                <input type="coupon_sid" class="form-control" id="coupon_sid" placeholder="coupon_sid" name="coupon_sid">
                                <label for="coupon_sid">優惠券序號</label>
                            </div>
                            <div class="col-3 form-floating">
                                <input type="date" class="form-control" name="coupon_startDate" value="<?= $coupon_startDate ?>">
                                <label for="coupon_startDate">開始日期</label>
                            </div>
                            <div class="col-3 form-floating">
                                <input type="date" class="form-control" name="coupon_endDate" value="<?= $coupon_endDate ?>">
                                <label for="coupon_endDate">結束日期</label>
                            </div>
                        </div>
                        <div class="row g-2 d-flex justify-content-between pt-3 align-items-center">
                            <div class="col-3 form-floating">
                                <select class="form-select" id="coupon_state" placeholder="coupon_state" name="coupon_state">
                                    <option value="所有狀態">所有狀態</option>
                                    <option value="啟用">啟用</option>
                                    <option value="停用">停用</option>
                                    <option value="已失效">已失效</option>
                                </select>
                                <label for="coupon_state">優惠券狀態</label>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <button type="submit" class="btn btn-dark btn-lg">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
        <div class="bg-white shadow rounded-2 border">
            <div class="table-title mb-3 d-flex justify-content-between align-items-center p-2 rounded-top">
                <h6 class="m-0 text-primary ms-2">查詢結果</h6>
                <a class="btn btn-primary me-2" href="createCoupon.php">新增</a>
            </div>
            <div class="p-3">
                <table class="coupon-table table table-bordered p-3">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>優惠券名稱</th>
                            <th>優惠券序號</th>
                            <th>數量</th>
                            <th>發放方式</th>
                            <th>最低消費</th>
                            <th>折抵類別</th>
                            <!-- <th>折抵</th> -->
                            <th>有效時間起迄</th>
                            <th>優惠券狀態</th>
                            <th>自動發送時間</th>
                            <th>活動併用方式</th>
                            <th>功能項目</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $row["id"] ?></td>
                                <td><?= $row["coupon_sid"] ?></td>
                                <td><?= $row["coupon_name"] ?></td>
                                <td>發放數量: <?= $row["coupon_amount"] ?><br>使用次數上限:<?= $row["coupon_maxUse"] ?></td>
                                <td><?= $row["coupon_send"] ?></td>
                                <td><?= $row["coupon_lowPrice"] ?></td>
                                <td><?= $row["coupon_rewardType"] ?></td>
                                <td><?= $row["coupon_startDate"] ?> ~ <?= $row["coupon_endDate"] ?></td>
                                <td><?= $row["coupon_state"] ?></td>
                                <td><?= $row["coupon_specifyDate"] ?></td>
                                <td><?= $row["coupon_mode"] ?></td>
                                <td class="gap-1 p-3">
                                    <a href=""><i class="fa-solid fa-pen"></i></a>
                                    <a href=""><i class="fa-solid fa-eye"></i></a>
                                    <a href=""><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>