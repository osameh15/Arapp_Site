<!DOCTYPE html>
<html lang="en">
<head>
    <title>تغییر رمز عبور</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/fonts.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/img/favicon-home.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="css/login-1a.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <br>
            <div class="login100-pic js-tilt mt-5" data-tilt>
                <img src="assets/img/sign-up.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" action="" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 direction">
								<span class="login100-form-title">
						         بازیابی رمز عبور
									<p class="mt-2 direction">رمز جدید خود را وارد نمایید</p>
					           </span>

                        </div>
                    </div>
                </div>

                <?php
                if (isset($response['errors'])){
                ?>
                <div class="alert alert-danger" role="alert">
                    <p class="mt-2 direction text-right"><?= $response['errors']; ?></p>

                </div>
                <?php
                }
                ?>

                <div class="wrap-input100 validate-input">
                    <input class="input100 direction mb-2" type="password" name="password"
                           value="<?= $_POST['password'] ?? '' ?>" placeholder="رمز عبور">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
						</span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100 direction" type="password" name="r-password"
                           value="<?= $_POST['r-password'] ?? '' ?>" placeholder="تکرار رمز عبور">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
						</span>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="reset-password" type="submit">
                        ثبت
                    </button>
                </div>
                <br><br>
                <div class="text-center m2-5 service">

                    <a class="txt2" href="/">
                        بازگشت به صفحه ی اصلی
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="assets/js/jquery-3.2.1.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>

<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<script src="assets/js/login.js"></script>

</body>
</html>