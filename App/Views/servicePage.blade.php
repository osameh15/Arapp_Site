@extends('master')
@section("css")

    <link rel="stylesheet" href="assets/rate-yo/jquery.rateyo.min.css">
@endsection
@section('content')
    <head>
        <title>سرویس</title>
    </head>


<div class="bradcam_area bradcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>رستوران محرم</h3>

                    <p class="direction"><i class="fa fa-clock-o" aria-hidden="true"></i> زمان ثبت سرویس 1399/1/20 </p>
                    <p class="direction"> <i class="fa fa-user-o" aria-hidden="true"></i> سرویس دهنده : اسامه ایراندوست </p>
                    <p class="direction"><i class="fa fa-phone" aria-hidden="true"></i> 09369642754</p>
                    <p class="direction">نوع سرویس : رستوران</p>
                    <p class="direction"><i class="fa fa-star-o" aria-hidden="true"></i> 4.4</p>
                    <p class="direction"><i class="fa fa-location-arrow " aria-hidden="true"></i>ddd</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="direction text-center my-5">توضیح کامل سرویس</h2>
    <div class="row direction">

        <div class="col-md-2 text-right"></div>
        <div class="col-md-8 direction text-right">
            dfffdd
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="container">
    <div class="row direction">
        <div class="col-md-12">
            <div class="section-top-border">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8">
                        <h3 class="mb-30 direction text-right">نظر خودرا وارد نمایید : </h3>
                        <form action="/add_comment?service=<?= $service->slug ?>" method="post">
                            <div class="mt-10 ">
                                <textarea class="single-textarea direction" name="comment-title" placeholder="نظر خود را وارد نمایید... " required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">ارسال نظر</button>
                        </form>



                        <div class="single-element-widget mt-30">
                                <h3 class="mb-30 direction text-right">نظر خود را از 1 تا 5 انتخاب نمایید : </h3>
                            <form action="/add_rate?service={{$service->slug}}" method="post">

                                <div class="mb-4" >
                                    <div class="rateyo text-left mr-auto" id= "rating"
                                         data-rateyo-rating="{{$avg}}"
                                         data-rateyo-num-stars="5"
                                         data-rateyo-score="1"
                                    >
                                    </div>
                                    <input type="hidden" name="rating">
                                </div>
                                <button type="submit" class="btn btn-primary">ارسال امتیاز</button>

                            </form>

                            </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container" data-aos="flip-left">
    <div class="row">
        <div class="col-md-12">
            <h2 class="direction text-center">جدیدترین نظرات</h2>
            <div class="testimonial_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testmonial_active owl-carousel">
                                <?php

                                foreach ($comments as $comment) :

                                ?>

                                    <div class="single_carousel">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="single_testmonial text-center">
                                                    <div class="author_thumb">
                                                        <img src="assets/img/testmonial/author.png" alt="">
                                                    </div>
                                                    <p class="direction">{{$comment->body}}</p>
                                                    <div class="testmonial_author">
                                                        <h3 class="direction">{{$comment->user->name}}</h3>
                                                    </div>
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
                </div>
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
                $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :'+ rating);
                $(this).parent().find('input[name=rating]').val(rating);
                var rating = data.rating;
                $(this).next().text(rating);
            });
        });
    </script>
@endsection


