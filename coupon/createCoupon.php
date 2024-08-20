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
            <a class="btn btn-primary" href="coupon.php" title="回使用者列表"><i class="fa-solid fa-circle-chevron-left"></i></a>
        </div>
        <form action="doCreateUser.php" method="post">
            <div class="mb-2">
                <label class="form-label" for="name"><span class="text-danger">*</span>Account</label>
                <input class="form-control" type="text" name="account" required>
            </div>
            <div class="mb-2">
                <label class="form-label" for="name"><span class="text-danger">*</span>Password</label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="mb-2">
                <label class="form-label" for="name"><span class="text-danger">*</span>Re-type Password</label>
                <input class="form-control" type="password" name="repassword" required>
            </div>
            <div class="mb-2">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="mb-2">
                <label class="form-label" for="phone">Phone</label>
                <input class="form-control" type="tel" name="phone">
            </div>
            <div class="mb-2">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email">
            </div>
            <button class="btn btn-primary" type="submit">送出</button>
        </form>
    </div>
</body>

</html>