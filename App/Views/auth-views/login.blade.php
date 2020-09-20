@extends("auth-views.layouts.authMaster")
@section("content")
<head>
    <title>ورود</title>
</head>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt mt-5 ml-5" data-tilt>
                    <img src="assets/img/navlogo.png" alt="IMG">
                </div>
                <form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						ورود
					</span>
                    <?php
                    if (isset($response['errors']))
                    {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <p class="mt-2 direction text-right"><?= $response['errors']; ?></p>

                    </div>
                    <?php
                    }
                    ?>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100 direction" type="text" name="phone"
                               value="<?= $_POST['phone'] ?? '' ?>" placeholder="شماره موبایل">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100 direction" type="password" name="password"
                               value="<?= $_POST['password'] ?? '' ?>" placeholder="رمز عبور">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
						</span>
                    </div>
                    <a class="txt2 text-right pr-2" style="display: block;" href="resetPasswordPhone">
                        فراموشی رمز عبور
                    </a>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="loginSubmit" type="submit">
                            ورود
                        </button>
                    </div>
                    <br><br>
                    <div class="text-center m2-5 service">
                        <a class="txt2" href="register">
                            عضویت
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

