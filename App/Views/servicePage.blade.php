@extends('master')

<style>
    .popular_places_area .row{
        direction: rtl;
    }

    .owl-carousel .owl-nav div.owl-next i {
        position: relative;
        right: 0;
        top: 50px;
    }

    .owl-carousel .owl-nav div.owl-prev i {
        position: relative;
        top: 50px !important;
    }
    .serch_form form{
        margin-bottom: 0 !important;
    }
</style>



@section("css")

    <link rel="stylesheet" href="assets/rate-yo/jquery.rateyo.min.css">
@endsection
@section('content')
    <head>
        <title>جزئیات سرویس</title>
    </head>


    <div class="bradcam_area service_image">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>رستوران عقاب سبز</h3>

                        <p class="direction"><i class="fa fa-star-o" aria-hidden="true"></i> 4.4</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h2 class="direction text-center my-5">جزئیات سرویس</h2>
    <div class="row direction">

        <div class="col-md-2 text-right"></div>
        <div class="col-md-8 direction text-right">
            <div class="row">
                <div class="col-md-6"><p class="direction">نوع سرویس : رستوران</p></div>
                <div class="col-md-6"><p class="direction">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> زمان ثبت سرویس: 2 روز پیش </p>
                </div>
                <div class="col-md-6">
                    <p class="direction"><i class="fa fa-user-o" aria-hidden="true"></i> سرویس دهنده: اسامه ایراندوست </p>
                </div>
                <div class="col-md-6">
                    <p class="direction"><i class="fa fa-phone" aria-hidden="true"></i> شماره تماس: 09369642754</p>
                </div>
                <div class="coll-md-6">
                    <p class="direction"><i class="fa fa-location-arrow " aria-hidden="true"></i>کردستان، سنندج</p>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <hr>

    <div class="container">
        <h2 class="direction text-center my-5">عملکرد سرویس</h2>
        <div class="row direction">

            <div class="col-md-2 text-right"></div>
            <div class="col-md-8 direction text-right">
                در خیابان های کردستان تنها قدم نزنید. رستوران عقاب سبز شما را به دنیایی دیگر می برد. با عقاب سفر کنید.
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row direction">
            <div class="col-md-12">
                {{--                <div class="section-top-border">--}}
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8">
                        <h3 class="mb-30 direction text-right">نظر خود را به اشتراک بگذارید: </h3>
                        <form action="/add_comment?service=" method="post">
                            <div class="mt-10 ">
                                    <textarea class="single-textarea direction" name="comment-title"
                                              placeholder="نظر خود را وارد نمایید... " required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">ثبت نظر</button>
                        </form>


                        <div class="single-element-widget mt-30">
                            <h3 class="mb-30 direction text-right">از عملکرد این سرویس چقدر راضی بودید؟ </h3>
                            <form action="/add_rate?service=" method="post">

                                <div class="mb-4">
                                    <div class="rateyo text-left mr-auto" id="rating"
                                         data-rateyo-rating="2.4"
                                         data-rateyo-num-stars="5"
                                         data-rateyo-score="1"
                                    >
                                    </div>
                                    <input type="hidden" name="rating">
                                </div>
                                <button type="submit" class="btn btn-primary">ثبت امتیاز</button>

                            </form>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="popular_places_area mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>سرویس های پیشنهادی</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="zoom-out-right">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="assets/img/service/4.jpg" alt="">
                        </div>
                        <div class="place_info">
                            <a href="/service?service=sss" class="text-right">
                                <h3>مرکز خرید ولیعصر</h3></a>
                            <p class="text-right direction">گیلان، رشت</p>
                            <div class="rating_days d-flex justify-content-between">

                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">چند دقیقه پیش</a>
                                </div>
                                <span class="d-flex justify-content-center align-items-center">
                                 <a class="direction" href="#">(4 نظر)</a>

                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-out-down">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="assets/img/service/1.jpg" alt="">
                        </div>
                        <div class="place_info">
                            <a href="/service?service=sss" class="text-right">
                                <h3>رستوران عقاب سبز</h3></a>
                            <p class="text-right direction">کردستان، سنندج</p>
                            <div class="rating_days d-flex justify-content-between">

                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">2 روز پیش</a>
                                </div>
                                <span class="d-flex justify-content-center align-items-center">
                                                                         <a class="direction" href="#">(20 نظر)</a>

                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-out-left">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="assets/img/service/2.jpg" alt="">
                        </div>
                        <div class="place_info">
                            <a href="/service?service=sss" class="text-right">
                                <h3>کافه لاماسیا</h3></a>
                            <p class="text-right direction">گیلان، رشت</p>
                            <div class="rating_days d-flex justify-content-between">

                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">5 روز پیش</a>
                                </div>
                                <span class="d-flex justify-content-center align-items-center">
                                                                         <a class="direction" href="#">(2 نظر)</a>

                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Modal -->
    <div class="modal fade custom_search_pop " id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="serch_form">
                    <form action="/search" method="get">
                        <input class="text-right direction" type="text" name="name"
                               placeholder="نام مکان،هتل و ... را وارد کنید. ">
                        <button type="submit">جستجو</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section("js")
    <script type="text/javascript" src="assets/rate-yo/jquery.min.js"></script>
    <script type="text/javascript" src="assets/rate-yo/jquery.rateyo.js"></script>
    <script>
        $(function () {
            $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :' + rating);
                $(this).parent().find('input[name=rating]').val(rating);
                var rating = data.rating;
                $(this).next().text(rating);
            });
        });
    </script>
@endsection
















{{--nazarat--}}


{{--<div class="container" data-aos="flip-left">--}}
{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<h2 class="direction text-center">جدیدترین نظرات</h2>--}}
{{--<div class="testimonial_area">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-xl-12">--}}
{{--<div class="testmonial_active owl-carousel">--}}


{{--<div class="single_carousel">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-lg-8">--}}
{{--<div class="single_testmonial text-center">--}}
{{--<div class="author_thumb">--}}
{{--<img src="assets/img/testmonial/author.png" alt="">--}}
{{--</div>--}}
{{--<p class="direction">خوب بود</p>--}}
{{--<div class="testmonial_author">--}}
{{--<h3 class="direction">Mohammad badzohreh</h3>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

