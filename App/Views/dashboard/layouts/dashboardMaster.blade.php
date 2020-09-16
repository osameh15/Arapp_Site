<!DOCTYPE html>
<html lang="en">
<head>
@include("dashboard.layouts.head")

    @yield("css")
</head>
<body>

<div class="wrapper">


@include("dashboard.layouts.navbar")

    <div class="main_container">
        @include("dashboard.layouts.sidebar")
        @yield("content")
    </div>
</div>
</body>

@include("dashboard.layouts.js")

@yield("js")

</html>










