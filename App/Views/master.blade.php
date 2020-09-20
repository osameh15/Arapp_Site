<!doctype html>
<html>
{{--links--}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/mainCss/bootstrap.min.css">
    <link rel="stylesheet" href="assets/mainCss/custom.css">
    <link rel="stylesheet" href="assets/mainCss/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/mainCss/magnific-popup.css">
    <link rel="stylesheet" href="assets/mainCss/font-awesome.min.css">
    <link rel="stylesheet" href="assets/mainCss/themify-icons.css">
    <link rel="stylesheet" href="assets/mainCss/nice-select.css">
    <link rel="stylesheet" href="assets/mainCss/flaticon.css">
    <link rel="stylesheet" href="assets/mainCss/gijgo.css">
    <link rel="stylesheet" href="assets/mainCss/animate.css">
    <link rel="stylesheet" href="assets/mainCss/slick.css">
    <link rel="stylesheet" href="assets/mainCss/slicknav.css">
    <link rel="stylesheet" href="assets/mainCss/aos.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="assets/mainCss/style.css">

    @yield("css")
</head>

<body>


<!-- header-start -->
<header>
    <div class="header-area">
        <div id="sticky-header" class="main-header-area p-3">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="assets/img/navlogo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>

                        <div class="col-xl-6 col-lg-6 direction text-right">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active text-right active" href="/">خانه</a></li>
                                        <li class="text-right">دسته بندی‌ها <a class="text-center" href="#"> <i
                                                        class="ti-angle-down"></i></a>
                                            <ul class="submenu">

                                                <?php
                                                foreach ($categories as $category):
                                                ?>

                                                <li><a href="/search?category={{$category->id}}"
                                                       class="text-right">{{$category->title}}</a>
                                                </li>


                                                <?php
                                                endforeach;
                                                ?>
                                            </ul>
                                        </li>
                                        <li><a class="text-right" href="blog">بلاگ</a></li>
                                        <li><a class="text-right" href="about">درباره ما</a></li>
                                        <li><a class="text-right" href="contact">ارتباط با ما</a></li>
                                        <li class="text-right">

                                            @if(isset($user) && isset($_SESSION["userLogin"]) && !is_null($user))


                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{$user->name}}

                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item text-center" href="/dashboard/addAdvertise">افزودن سرویس</a>
                                                        <a class="dropdown-item text-center" href="/logout">خروج</a>
                                                    </div>
                                                </div>

                                                @else
                                                <button type="button" class="btn btn-outline active color"><a
                                                            class="text-right" href="login">
                                                        <i class="fa fa-user" aria-hidden="true"></i> ورود/ثبت نام </a>
                                                </button>
                                                @endif
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->

@yield('content')


<footer class="footer p-0">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">

                    <div class="footer_widget">
                        <h3 class="footer_title text-center">
                            شرکت آراپ
                        </h3>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <ul class="links">
                                        <li class="text-center"><a href="/about">درباره ما</a></li>
                                        <li class="text-center"><a href="/contact">ارتباط ما</a></li>
                                        <li class="text-center"><a href="#"> گزارش مشکلات</a></li>
                                        <li class="text-center"><a href="#">سوالات متداول</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 mt-2">
                                    <ul class="links">
                                        <li class="text-center"><a href="#"><b>سرویس‌های محبوب</b></a></li>
                                        <li class="text-center"><a href="#">کافه لاماسیا</a></li>
                                        <li class="text-center"><a href="#">رستوران محرم</a></li>
                                        <li class="text-center"><a href="#">فروشگاه گیزمیز</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 mt-2">
                                    <ul class="links">
                                        <li class="text-center"><a href="/about">وبلاگ</a></li>
                                        <li class="text-center"><a href="/contact">خدمات سرویس دهندگان</a></li>
                                        <li class="text-center"><a href="#">خدمات سرویس گیرندگان</a></li>
                                        <li class="text-center"><a href="#">حریم خصوصی</a></li>
                                        {{--todo daryaft app--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="footer_widget text-center">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="assets/img/test.png" alt="">
                            </a>
                        </div>

                        <p class="direction"><i class="fa fa-location-arrow" aria-hidden="true"></i>گیلان، فومن،
                            دانشکده فنی فومن<br>
                            <a href="#"><i class="fa fa-phone-square" aria-hidden="true"></i>0936-964-2754</a> <br>
                            <a href="#"><i class="fa fa-envelope"
                                           aria-hidden="true"></i>sajjad.haghzad@gmail.com</a>
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-telegram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- JS here -->
<script src="assets/mainJs/modernizr-3.5.0.min.js"></script>
<script src="assets/mainJs/jquery-1.12.4.min.js"></script>
<script src="assets/mainJs/popper.min.js"></script>
<script src="assets/mainJs/bootstrap.min.js"></script>
<script src="assets/mainJs/owl.carousel.min.js"></script>
<script src="assets/mainJs/isotope.pkgd.min.js"></script>
<script src="assets/mainJs/ajax-form.js"></script>
<script src="assets/mainJs/waypoints.min.js"></script>
<script src="assets/mainJs/jquery.counterup.min.js"></script>
<script src="assets/mainJs/imagesloaded.pkgd.min.js"></script>
<script src="assets/mainJs/scrollIt.js"></script>
<script src="assets/mainJs/jquery.scrollUp.min.js"></script>
<script src="assets/mainJs/wow.min.js"></script>
<script src="assets/mainJs/nice-select.min.js"></script>
<script src="assets/mainJs/jquery.slicknav.min.js"></script>
<script src="assets/mainJs/jquery.magnific-popup.min.js"></script>
<script src="assets/mainJs/plugins.js"></script>
<script src="assets/mainJs/gijgo.min.js"></script>
<script src="assets/mainJs/slick.min.js"></script>
<script src="assets/mainJs/aos.js"></script>


<!--contact js-->
<script src="assets/mainJs/contact.js"></script>
<script src="assets/mainJs/jquery.ajaxchimp.min.js"></script>
<script src="assets/mainJs/jquery.form.js"></script>
<script src="assets/mainJs/jquery.validate.min.js"></script>
<script src="assets/mainJs/mail-script.js"></script>


<script>
    AOS.init({
        duration: 1000,
    });
</script>


<script src="assets/mainJs/main.js"></script>
<script>
    $('#datepicker').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-caret-down"></span>'
        }
    });
</script>


@yield("js")
</body>

</html>