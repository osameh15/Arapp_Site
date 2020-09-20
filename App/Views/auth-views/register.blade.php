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
                    <img src="assets/img/navlogo.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="" method="post">
                    <div class="container">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-md-12 direction">
								<span class="login100-form-title">
						                 شماره موبایل
									<p class="mt-2 direction">برای عضویت شماره موبایل خودرا وارد نمایید</p>
					           </span>
                            </div>

                            <?php
                            if (isset($response['errors'])){
                            ?>
                            <div class="alert alert-danger " role="alert">
                                <p class="mt-2 direction text-right"><?= $response['errors']; ?></p>

                            </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100 direction" type="text" name="phoneEmail"
                               value="<?= $_POST['phoneEmail'] ?? '' ?>" placeholder="شماره موبایل ">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
						</span>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            تایید
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
