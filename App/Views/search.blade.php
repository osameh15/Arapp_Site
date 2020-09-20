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
@section('content')
    <head>
        <title>سرویس های آراپ</title>
    </head>


    <div class="popular_places_area mt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>سرویس ها</h3>
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