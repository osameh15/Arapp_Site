<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>آراپ</title>
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

    <!--    <link rel="stylesheet" type="text/css" href="assets/mainCss/fonts.css">-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="assets/mainCss/style.css">
    <!-- <link rel="stylesheet" href="assets/mainCss/responsive.css"> -->
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
                                <a href="index.blade.php">
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
                                                <li><a href="destination_details.html" class="text-right">رستوران</a>
                                                </li>
                                                <li><a href="elements.html" class="text-right">فست‌فود</a></li>
                                                <li><a href="elements.html" class="text-right">کافه</a></li>
                                                <li><a href="elements.html" class="text-right">هتل</a></li>
                                                <li><a href="elements.html" class="text-right">مسافرخانه</a></li>
                                                <li><a href="elements.html" class="text-right">مراکز خرید</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="text-right" href="blog">بلاگ</a></li>
                                        <li><a class="text-right" href="about">درباره ما</a></li>
                                        <li><a class="text-right" href="contact">ارتباط با ما</a></li>
                                        <li class="text-right">
                                            <button type="button" class="btn btn-outline active color"><a
                                                        class="text-right" href="travel_destination.html"><i
                                                            class="fa fa-user" aria-hidden="true"></i> ورود/ثبت نام </a>
                                            </button>
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


<div class="popular_places_area mt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>
                        {{$title}}
                    </h3>
                </div>
            </div>
        </div>



        <div class="row">
            <?php
            foreach ($services as $service):


            ?>




                <div class="col-lg-4 col-md-6" data-aos="zoom-out-down">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="assets/img/place/2.png" alt="">
                        </div>
                        <div class="place_info">
                            <a href="/service?service=<?= $service->slug ?>" class="text-right">
                                <h3>
                                    {{ $service->title }}
                                </h3>
                            </a>
                            <p class="text-right direction">{{$service->address}}</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                      <a class="direction" href="#">
                                      </a>
                                </span>
                                <?php
                                if ($service->special):

                                ?>

                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">ویژه به مدت محدود</a>
                                </div>
                                <?php
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>




                <?php
            endforeach;
            ?>
        </div>
    </div>
</div>

<hr style="width: 50%;">


<footer class="footer p-0">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">

                    <div class="footer_widget">
                        <h3 class="footer_title text-center">

                            شرکت
                        </h3>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <ul class="links">
                                        <li class="text-center"><a href="#">درباره ما</a></li>
                                        <li class="text-center"><a href="#">ارتباط ما</a></li>
                                        <li class="text-center"><a href="#"> گزارش مشکلات</a></li>
                                        <li class="text-center"><a href="#">سوالات متداول</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 mt-2">
                                    <ul class="links">
                                        <li class="text-center"><a href="#"><b>سرویس‌های محبوب</b></a></li>
                                        <li class="text-center"><a href="#">سرویس محبوب 1</a></li>
                                        <li class="text-center"><a href="#">سرویس محبوب 2</a></li>
                                        <li class="text-center"><a href="#">سرویس محبوب 3</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 mt-2">
                                    <ul class="links">
                                        <li class="text-center"><a href="#">درباره ما</a></li>
                                        <li class="text-center"><a href="#">ارتباط ما</a></li>
                                        <li class="text-center"><a href="#"> گزارش مشکلات</a></li>
                                        <li class="text-center"><a href="#">سوالات متداول</a></li>
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

                        <p class="direction"><i class="fa fa-location-arrow" aria-hidden="true"></i>گیلان، فومن، دانشکده
                            فنی فومن<br>
                            <a href="#"><i class="fa fa-phone-square" aria-hidden="true"></i>0936-964-2754</a> <br>
                            <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>sajjad.haghzad@gmail.com</a>
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
</footer>


<!-- Modal -->
<div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="serch_form">
                <input class="text-right direction" type="text" placeholder="نام مکان،هتل و ... را وارد کنید. ">
                <button type="submit">جستجو</button>
            </div>
        </div>
    </div>
</div>
<!-- link that opens popup -->
<!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
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
</body>

</html>