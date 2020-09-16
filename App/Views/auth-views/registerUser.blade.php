
@extends("auth-views.layouts.authMaster")
@section("content")
    <head>
        <title>عضویت</title>
    </head>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <br>
                <div class="login100-pic js-tilt mt-5" data-tilt>
                    <img src="assets/img/sign-up.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="" method="post">
          <span class="login100-form-title">
             عضویت
          </span>
                    <?php
                    if (isset($response) && !empty($response))
                    {
                    foreach ($response as $result) {

                    ?>
                    <div class="alert alert-danger" role="alert">
                        <p class="mt-2 direction text-right"><?= $result ?></p>

                    </div>

                    <?php
                    }
                    }
                    ?>

                    <div class="wrap-input100 validate-input">
                        <input class="input100 direction" type="text" name="name"
                               value="<?= $_POST['name'] ?? '' ?>" placeholder="نام و نام خانوادگی ">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
            </span>
                    </div>


                    <div class="wrap-input100 validate-input">
                        <input class="input100 direction" type="text" name="email"
                               value="<?= $_POST['email'] ?? '' ?>" placeholder="آدرس ایمیل">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
            </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100 direction" type="password" name="password" id="passCode"
                               value="<?= $_POST['password'] ?? '' ?>" placeholder="رمز عبور">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
            </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100 direction" type="password" name="repititionPassword" id="cnfPassCode"
                               value="<?= $_POST['repititionPassword'] ?? '' ?>" placeholder="تکرار رمز عبور ">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
            </span>
                    </div>

                    <div class="custom-control custom-checkbox show-hide-password mt-1 mb-3 mr-2">
                        <input type="checkbox" class="custom-control-input" id="showPass" name="showPassword">
                        <label class="custom-control-label text-right" for="showPass" onclick="showPass()">
                            نمایش
                            رمزعبور</label>
                    </div>

                    <div class="form-check pt-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center service">
                                    <h6 class="direction mb-2">نوع سرویس را انتخاب نمایید : </h6>
                                    <label class="form-check-label label-service" for="servicInp1">
                                        <input type="radio" class="form-check-input" id="servicInp1" name="service"
                                               value="سرویس دهنده"
                                        <?= (isset($_POST['service']) && $_POST['service'] == "سرویس دهنده") ? 'checked' : '' ?>>
                                        سرویس دهنده
                                    </label>
                                    <br>
                                    <label class="form-check-label label-service mt-2" for="servicInp2">
                                        <input type="radio" class="form-check-input" id="servicInp2" name="service"
                                               value="سرویس گیرنده"
                                        <?= (isset($_POST['service']) && $_POST['service'] == "سرویس گیرنده") ? 'checked' : '' ?>>
                                        سرویس گیرنده
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="send-register">
                            ثبت
                        </button>
                    </div>
                    <br><br>
                    <div class="text-center m2-5 service">
                        <a class="txt2" href="login">
                            ورود
                        </a>
                        <a class="txt2" href="/">
                            صفحه اصلی
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection





@section("js")
    <script>
        function showPass()
        {
            var x = document.getElementById("passCode");
            var y = document.getElementById("cnfPassCode");
            if (x.type === "password")
            {
                x.type = "text";
            }
            else
            {
                x.type = "password";
            }
            if (y.type === "password")
            {
                y.type = "text";
            }
            else
            {
                y.type = "password";
            }
        }
    </script>

@endsection


