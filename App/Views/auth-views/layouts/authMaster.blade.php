<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/fonts.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/img/favicon-home.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="css/login-1a.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">

    @yield("css")
    <!--===============================================================================================-->
</head>
<body>
@yield("content")
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<script src="js/login.js"></script>

@yield("js")
</html>