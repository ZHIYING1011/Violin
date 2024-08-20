<!doctype html>
<html lang="en">

<head>
    <title>create user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php include("../css.php") ?>
</head>

<body>
    <div class="container">
        <div class="py-2">
            <a class="btn btn-primary" href="doCreateCoupon.php" title="回使用者列表"><i class="fa-solid fa-circle-chevron-left"></i></a>
        </div>
        <div class="p-3 bg-white shadow rounded-2 mb-4 border">
            <div class="row g-2 align-items-center mb-2">
                <div class="col-auto">
                    <a class="btn btn-primary" href="order-list.php"><i class="fa-solid fa-circle-chevron-left"></i></a>
                </div>
                <div class="col">
                    <h1 class="m-0">優惠券列表</h1>
                </div>
            </div>
            <div class="py-2">
                <form action="doCreateCoupon.php" method="post">
                    <?php
                    $today = date('Y-m-d');
                    $start = isset($_GET["start"]) ? $_GET["start"] :
                        $today;
                    $end = isset($_GET["end"]) ? $_GET["end"] : $today;
                    ?>
                    <div class="row g-2">
                        <div class="col-6 form-floating pb-3">
                            <input type="coupon_name" class="form-control" id="coupon_name" placeholder="coupon_name" name="coupon_name">
                            <label for="coupon_name"><span class="text-danger">*</span>優惠券名稱</label>
                        </div>
                        <div class="col-6 form-floating pb-3">
                            <input type="coupon_sid" class="form-control" id="coupon_sid" placeholder="coupon_sid" name="coupon_sid">
                            <label for="coupon_sid"><span class="text-danger">*</span>優惠券序號</label>
                        </div>
                        <div class="col-12 form-floating pb-3">
                            <input type="coupon_info" class="form-control" id="coupon_info" placeholder="coupon_info" name="coupon_info">
                            <label for="coupon_info"><span class="text-danger">*</span>優惠券說明</label>
                        </div>
                        <div class="col-6  d-flex gap-2 align-items-center pb-3">
                            <div class="form-floating col-10">
                                <input class="form-control" type="text" placeholder="coupon_amount" name="coupon_amount" id="coupon_amount">
                                <label for="form-label" for="coupon_amount"><span class="text-danger">*</span>發放數量</label>
                            </div>
                            <div class="form-check col-2">
                                <label for="unlimitedCheckbox">
                                    <input type="checkbox" id="unlimitedCheckbox" name="unlimitedCheckbox">
                                    無上限
                                </label>
                            </div>
                        </div>
                        <div class="col-6  d-flex gap-2 align-items-center pb-3">
                            <div class="form-floating col-10">
                                <input class="form-control" type="text" placeholder="coupon_maxUse" name="coupon_maxUse" id="coupon_maxUse">
                                <label for="form-label" for="coupon_maxUse"><span class="text-danger">*</span>使用次數上限</label>
                            </div>
                            <div class="form-check col-2">
                                <label for="unlimitedUseCheckbox">
                                    <input type="checkbox" id="unlimitedUseCheckbox" name="unlimitedUseCheckbox">
                                    無上限
                                </label>
                            </div>
                        </div>
                        <div class="col-6 form-floating pb-3">
                            <select class="form-select" id="coupon_send" placeholder="coupon_send" name="coupon_send">
                                <option value="全員發送">全員發送</option>
                                <option value="生日">生日</option>
                                <option value="等級">等級</option>
                            </select>
                            <label for="coupon_send"><span class="text-danger">*</span>發放方式</label>
                        </div>
                        <div class="col-6 form-floating pb-3">
                            <input class="form-control" type="number" placeholder="coupon_lowPrice" name="coupon_lowPrice" id="coupon_lowPrice">
                            <label for="form-label" for="coupon_lowPrice"><span class="text-danger">*</span>發放門檻(最低消費)</label>
                        </div>
                        <div class="col-6 form-floating pb-3">
                            <select class="form-select" id="coupon_rewardType" placeholder="coupon_rewardType" name="coupon_rewardType">
                                <option value="百分比">百分比</option>
                                <option value="金額">金額</option>
                            </select>
                            <label for="coupon_rewardType"><span class="text-danger">*</span>折抵類別</label>
                        </div>
                        <div class="col-6 form-floating pb-3">
                            <input type="couponRewardType" class="form-control" id="couponRewardType" placeholder="couponRewardType" name="couponRewardType">
                            <label for="couponRewardType"><span class="text-danger">*</span>折抵</label>
                        </div>
                        <div class="col-6 form-floating pb-3">
                            <select class="form-select" id="coupon_mode" placeholder="coupon_mode" name="coupon_mode">
                                <option value="皆可使用">皆可使用</option>
                                <option value="指定商品可使用">指定商品可使用</option>
                                <option value="指定商品不可使用">指定商品不可使用</option>
                            </select>
                            <label for="coupon_mode"><span class="text-danger">*</span>活動併用方式</label>
                        </div>
                        <div class="col-6 form-floating pb-3">
                            <select class="form-select" id="product_id" placeholder="product_id" name="product_id">
                                <option value="皆可使用">撈商品id，要做dialog</option>
                            </select>
                            <label for="product_id">綁定商品標籤</label>
                        </div>
                        <div class="col-6 form-floating pb-3">
                            <input type="date" class="form-control" name="coupon_startDate" value="<?= $coupon_startDate ?>" id="coupon_startDate">
                            <label for="coupon_startDate">有效開始日期</label>
                        </div>
                        <div class="col-6 form-floating pb-3">
                            <input type="date" class="form-control" name="coupon_endDate" value="<?= $coupon_endDate ?>" id="coupon_endDate">
                            <label for="coupon_endDate">有效結束日期</label>
                        </div>
                        <div class="col-6  d-flex gap-2 align-items-center pb-3">
                            <div class="form-floating col-10">
                                <input class="form-control" type="text" placeholder="coupon_specifyDate" name="coupon_specifyDate" id="coupon_specifyDate">
                                <label for="form-label" for="coupon_specifyDate"><span class="text-danger">*</span>自動發送時間</label>
                            </div>
                            <div class="form-check col-2">
                                <label for="couponSpecifyDateCheckbox">
                                    <input type="checkbox" id="couponSpecifyDateCheckbox" name="couponSpecifyDateCheckbox">
                                    立即發送
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">送出</button>
                </form>
            </div>
        </div>
        <script>
            const coupon_amount = document.getElementById("coupon_amount");
            const unlimitedCheckbox = document.getElementById("unlimitedCheckbox");
            const coupon_maxUse = document.getElementById("coupon_maxUse");
            const unlimitedUseCheckbox = document.getElementById("unlimitedUseCheckbox");
            const coupon_specifyDate = document.getElementById("coupon_specifyDate");
            const couponSpecifyDateCheckbox = document.getElementById("couponSpecifyDateCheckbox");
            //發放數量
            unlimitedCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    coupon_amount.value = '無上限';
                    coupon_amount.disabled = true;
                    coupon_amount.classList.add('unlimited-input');
                } else {
                    coupon_amount.value = '';
                    coupon_amount.disabled = false;
                    coupon_amount.classList.remove('unlimited-input');
                }
            });
            //使用次數上限
            unlimitedUseCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    coupon_maxUse.value = '無上限';
                    coupon_maxUse.disabled = true;
                    coupon_maxUse.classList.add('unlimitedUse-input');
                } else {
                    coupon_maxUse.value = '';
                    coupon_maxUse.disabled = false;
                    coupon_maxUse.classList.remove('unlimitedUse-input');
                }
            });
            //使用次數上限
            couponSpecifyDateCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    coupon_specifyDate.value = '立即發送';
                    coupon_specifyDate.disabled = true;
                    coupon_specifyDate.classList.add('unlimitedUse-input');
                } else {
                    coupon_specifyDate.value = '';
                    coupon_specifyDate.disabled = false;
                    coupon_specifyDate.classList.remove('unlimitedUse-input');
                }
            });
        </script>
    </div>
</body>

</html>