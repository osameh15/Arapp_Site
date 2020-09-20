@extends('master')
@section("content")
    <head>
        <title>ارتباط با آراپ</title>
    </head>
<!-- bradcam_area  -->
<div class="bradcam_area contact-us-image">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>ارتباط با ما</h3>
                    <p class="direction">آماده شنیدن انتقادات و پیشنهادات شما هستیم</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- ================ contact section start ================= -->
<section class="contact-section direction">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-right">با ما در ارتباط باشید</h2>
            </div>
            <div class="col-lg-8" data-aos="fade-up-left">
                <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100 text-right direction" name="message" id="message" cols="30" rows="9"   placeholder="انتقاد یا پیشنهاد ..."></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid text-right" name="name" id="name" type="text"  placeholder="نام و نام خانوادگی">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid text-right" name="email" id="email" type="email"  placeholder="ایمیل">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control text-right" name="subject" id="subject" type="text"  placeholder="موضوع">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 text-center mb-5">
                        <button type="submit" class="button button-contactForm boxed-btn">ارسال</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1" data-aos="fade-up-right">
                <div class="media contact-info">
                    <div class="media-body">
                        <h3 class="text-center">آدرس</h3>
                        <p class="text-center">گیلان، فومن، دانشکده فنی فومن</p>
                    </div>
                    <span class="contact-info__icon"><i class="ti-home"></i></span>

                </div>
                <div class="media contact-info">
                    <div class="media-body">
                        <h3 class="text-center">0936-964-2754</h3>
                        <p class="text-center">پاسخگویی 24 ساعته</p>
                    </div>
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                </div>
                <div class="media contact-info">
                    <div class="media-body">
                        <h3 class="text-center">sajjad.haghzad@gmail.com</h3>
                        <p class="text-center direction">پشتیبانی در طول هفته</p>
                    </div>
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="serch_form">
                <input class="text-right direction" type="text" placeholder="نام مکان،هتل و ... را وارد کنید">
                <button type="submit">جستجو</button>
            </div>
        </div>
    </div>
</div>
@endsection

