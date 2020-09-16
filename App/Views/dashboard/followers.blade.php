@extends("dashboard.layouts.dashboardMaster")
@section("content")
    <head>
        <title>دنبال شوندگان</title>
    </head>


    <div class="container">

    <div id="tabs">
        <ul>
            <li id="tab_one" class="active">دنبال شده ها</li>
            <li id="tab_two">دنبال کننده های شما</li>
        </ul>
    </div>

    <div id="followers">

        <div id="tab_one_content" class="item_container display-none display-block">
            <div class="item">
                <img src="assets/dashboard/images/userIcon.png" alt="ایکون کاربر"/>
                <b>علیرفاطمی نیا</b>
                <button>
                    دنبال شده
                    <i class="fa fa-check"></i>
                </button>

            </div>
        </div>
        <div id="tab_two_content" class="item_container display-none">
            <div class="item">
                <img src="assets/dashboard/images/userIcon.png" alt="ایکون کاربر"/>
                <b>علیرفاطمی نیا</b>
                <button>
                    دنبال کردن
                </button>

            </div>
            <div class="item">
                <img src="assets/dashboard/images/userIcon.png" alt="ایکون کاربر"/>
                <b>علیرفاطمی نیا</b>
                <button>
                    دنبال کردن
                </button>

            </div>
            <div class="item">
                <img src="assets/dashboard/images/userIcon.png" alt="ایکون کاربر"/>
                <b>علیرفاطمی نیا</b>
                <button>
                    دنبال کردن
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
