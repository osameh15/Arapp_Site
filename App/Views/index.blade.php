@extends('master')
@section('content')
    <head>
        <title>آراپ</title>
    </head>
    <!-- slider_area_start -->
    <div class="slider_area" data-aos="zoom-out">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <!--                                <h3>جدیدترین اخبار 1</h3>-->
                                <p class="direction">توضیحات مربوط به اخبار و جدیدترین اطلاعیه ها</p>
                                <a href="#" class="boxed-btn3">بیشتر</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <!--                                <h3>Australia</h3>-->
                                <p class="direction">توضیحات مربوط به اخبار و جدیدترین اطلاعیه ها.</p>
                                <a href="#" class="boxed-btn3">بیشتر</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_3 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <!--                                <h3>Switzerland</h3>-->
                                <p class="direction">توضیحات مربوط به اخبار و جدیدترین اطلاعیه ها.</p>
                                <a href="#" class="boxed-btn3">بیشتر</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_4 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <!--                                <h3>Switzerland</h3>-->
                                <p class="direction">توضیحات مربوط به اخبار و جدیدترین اطلاعیه ها.</p>
                                <a href="#" class="boxed-btn3">بیشتر</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_5 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <!--                                <h3>Switzerland</h3>-->
                                <p class="direction">توضیحات مربوط به اخبار و جدیدترین اطلاعیه ها.</p>
                                <a href="#" class="boxed-btn3">بیشتر</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- slider_area_end -->


    <!-- popular_destination_area_start  -->
    <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>دسته بندی سرویس ها</h3>
                        <!--                        <p>محل توضیحات لازم</p>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6" data-aos="fade-right">
                    <a href="/search?category=1">
                        <div class="single_destination">

                            <div class="thumb">
                                <img src="assets/img/destination/restaurant.jpg" alt="">
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6" data-aos="fade-left">
                    <a href="/search?category=2">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="assets/img/destination/fast food.jpg" alt="">
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6" data-aos="fade-right">
                    <a href="/search?category=3">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="assets/img/destination/cafe.jpg" alt="">
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6" data-aos="fade-left">
                    <a href="/search?category=4">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="assets/img/destination/hotel.jpg" alt="">
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6" data-aos="fade-right">
                    <a href="/search?category=5">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="assets/img/destination/guest house.jpg" alt="">
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6" data-aos="fade-left">
                    <a href="/search?category=6">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="assets/img/destination/stores.jpg" alt="">
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->

    <!-- newletter_area_start  -->
    <div class="newletter_area overlay" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="row align-items-center">

                        <div class="col-lg-7">
                            <div class="mail_form">
                                <div class="row no-gutters">
                                    <div class="col-lg-9 col-md-8">
                                        <div class="newsletter_field">
                                            <input type="email" placeholder="" class="text-right">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="newsletter_btn">
                                            <button class="boxed-btn4 " type="submit">ارسال</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="newsletter_text">
                                <h4 class="text-center mt-4">دریافت اپلیکیشن</h4>
                                <p class="direction text-right">با وارد کردن شماره موبایل خود لینک مستقیم برای دانلود
                                    اپلیکیشن برای شما ارسال خواهد شد.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newletter_area_end  -->

    <div class="popular_places_area mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>سرویس های ویژه</h3>
                    </div>
                </div>
            </div>
            <div class="row">


                <?php
                foreach ($specials as $special):
                ?>
                <div class="col-lg-4 col-md-6" data-aos="zoom-out-right">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="assets/img/place/1.png" alt="">
                        </div>
                        <div class="place_info">
                            <a href="/service?service={{$special->slug}}" class="text-right">
                                <h3>{{$special->title}}</h3></a>
                            <p class="text-right direction">{{$special->address}}</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <a class="direction" href="#">(20 نظر)</a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">ویژه به مدت محدود</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
            <div class="row" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="/search?special=true">نمایش بیشتر</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr style="width: 50%;">

    <!-- general services -->

    <div class="popular_places_area mt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>محبوب ترین سرویس‌ها‌</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="zoom-out-right">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="assets/img/place/1.png" alt="">
                            <!--                            <a href="#" class="prise">$500</a>-->
                        </div>
                        <div class="place_info">
                            <a href="service" class="text-right"><h3>رستوران محرم</h3></a>
                            <p class="text-right direction">رشت، منظریه،جنب بانک ملت</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <a class="direction" href="#">(20 نظر)</a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">ویژه به مدت محدود</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-out-down">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="assets/img/place/2.png" alt="">
                            <!--                            <a href="#" class="prise">$500</a>-->
                        </div>
                        <div class="place_info">
                            <a href="service" class="text-right"><h3>رستوران محرم</h3></a>
                            <p class="text-right direction">رشت، منظریه،جنب بانک ملت</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                      <a class="direction" href="#">(20 نظر)</a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">ویژه به مدت محدود</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-out-left">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="assets/img/place/3.png" alt="">
                            <!--                            <a href="#" class="prise">$500</a>-->
                        </div>
                        <div class="place_info">
                            <a href="service" class="text-right"><h3>رستوران محرم</h3></a>
                            <p class="text-right direction">رشت، منظریه،جنب بانک ملت</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                      <a class="direction" href="#">(20 نظر)</a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">ویژه به مدت 1 هفته</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="#">نمایش بیشتر</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end general services -->

    <hr style="width: 50%;">
    <!-- most popular services -->

    <div class="popular_places_area mt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>سرویس های عادی</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($no_specials as $no_special) :
                ?>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-out-right">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="assets/img/place/1.png" alt="">
                            </div>
                            <div class="place_info">
                                <a href="/service?service={{$no_special->slug}}" class="text-right">
                                    <h3>{{$no_special->title}}</h3></a>
                                <p class="text-right direction">{{$no_special->address}}</p>
                                <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <a class="direction" href="#">(20 نظر)</a>
                                </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">ویژه به مدت محدود</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php
                endforeach;
                ?>

            </div>
            <div class="row" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="/search?special=false">نمایش بیشتر</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end most popular services -->




    <!-- Modal -->
    <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="serch_form">
                    <form action="/search" method="get">
                    <input class="text-right direction" type="text"  name="name" placeholder="نام مکان،هتل و ... را وارد کنید. ">
                        <button type="submit">جستجو</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection