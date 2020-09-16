
@extends('master')
@section('content')
    <head>
        <title>درباره آراپ</title>
    </head>
<div class="bradcam_area bradcam_bg_3">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>درباره ما</h3>
                    <p class="direction">آراپ، انتخاب همه سلیقه ها</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="about_story">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="story_heading">
                    <h3 class="text-center">آراپ</h3>
                </div>
                <div class="row">
                    <div class="col-lg-11 offset-lg-1">
                        <div class="story_info">
                            <div class="row">
                                <div class="col-lg-9">
                                    <p class="text-right direction">آراپ را همه خواهند شناخت. رای بده بهترین را انتخاب کن</p>
                                </div>
                            </div>
                        </div>
                        <div class="story_thumb">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="thumb padd_1">
                                        <img src="img/about/1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="thumb">
                                        <img src="img/about/2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="counter_wrap">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_counter text-center">
                                        <h3  class="counter">3250</h3>
                                        <p>مشتریان راضی</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_counter text-center">
                                        <h3 class="counter">15</h3>
                                        <p>رستوران های فعال</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_counter text-center">
                                        <h3 class="counter">43</h3>
                                        <p>هتل های فعال</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection