<!DOCTYPE html>
<html lang="en">
<head>
    <title>کد تایید</title>
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
<?php   $phoneNumber = $_SESSION['reset_password'] ?? $_SESSION['resetPasswordUser'] ?>
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
                        <div class="col-md-12">
								<span class="login100-form-title">
						         بازیابی رمز عبور
					           </span>
                            <div class="alert alert-success" role="alert">

                                <p class="mt-2 direction text-right">کد تایید 6 رقمی به
                                    <span><?= '0' . substr($phoneNumber, -10, 10); ?></span> ارسال
                                    شد</p>
                            </div>
                            <div id="timerContainer" class="alert alert-info text-right">زمان باقیمانده: <span
                                        id="timer"></span></div>


                            <?php
                            if (isset($response['errors']))
                            {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <p class="mt-2 direction text-right"
                                   style="color: #721c24;"><?= $response['errors']; ?></p>

                            </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100 direction" type="text" name="resetPassword"
                           value="<?= $_POST['resetPassword'] ?? '' ?>" placeholder="کد تایید">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="submitChangeCode" id="submitButton" type="submit">
                        تایید
                    </button>
                </div>
                <br><br>
                <div class="text-center m2-5 service">

                    <a class="txt2" href="resetPasswordPhone">
                        اصلاح شماره موبایل
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
<script>
    {{--change button after 1 mintute--}}
    setTimeout(function () {

        document.querySelector('#submitButton').innerHTML = 'ارسال مجدد کد فراموشی رمز عبور';
        document.getElementById('submitButton').setAttribute('name', 'changeCode')
    }, 60000)

    {{--timer--}}
    document.getElementById('timer').innerHTML =
        1 + ":" + 00;

    startTimer();

    function startTimer() {
        var presentTime = document.getElementById('timer').innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];

        var s = checkSecond((timeArray[1] - 1));
        if (s == 59) {
            m = m - 1
            if (m < 10) {
                m = '0' + m;
            }
        }

        document.getElementById('timer').innerHTML =
            m + ":" + s;
        if (s < 10) {
            document.getElementById('timerContainer').classList.add("alert-danger");
        }

        if (document.getElementById('timer').innerHTML != '00:00') {

            setTimeout(startTimer, 1000);
        }
    }

    function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {
            sec = "0" + sec
        }
        ; // add zero in front of numbers < 10
        if (sec < 0) {
            sec = "59"
        }
        ;
        return sec;
    }
</script>

</body>
</html>