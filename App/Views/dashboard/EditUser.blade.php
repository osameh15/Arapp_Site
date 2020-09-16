@extends("dashboard.layouts.dashboardMaster")
@section("content")
    <head>
        <title>ویرایش اطلاعات کاربری</title>
    </head>

<div class="container">
    <div id="add_product_form">




        <form action="" method="post" enctype="multipart/form-data" id="form">
            <div>
                <input id="title" type="text" placeholder="نام" name="name">
            </div>

            <div>
                <input placeholder="ایمیل" name="email"/>
            </div>
            <div>
                <input placeholder="شماره موبایل" name="mobile" disabled/>
            </div>
            <div class="select">
                <select name="education">
                    <option style="display: none">تحصیلات</option>
                    <option>لیسانس</option>
                    <option value="1">فوق لیسانس</option>
                    <option value="1">دکترا</option>
                </select>
            </div>
            <div>
                <input type="file" name="avatar" id="file"/>
                <div id="imageContiner">
                    <img src="assets/dashboard/images/userUpload.png" class="userUpload" alt="اپلود تصویر">
                </div>
            </div>


            <div>
                <textarea cols="30" rows="10"placeholder="بیوگرافی" name="bio"></textarea>
            </div>

            <input type="checkbox" id="notification_receiver" placeholder="notification_receiver"
                   name="notification_receiver" value="1"/>
            <label for="notification_receiver" class="notification-reciver">ارسال نظرات</label>


            <button class="add_product_button">ویرایش</button>
        </form>
    </div>
</div>
@endsection
