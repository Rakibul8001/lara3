<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{asset('/front-end')}}/img/favicon.png" type="image/png" />
    <title>Eiser ecommerce</title>
    <!-- Bootstrap CSS -->
   @include("front-end.styles")
</head>

<body>
<!--================Header Menu Area =================-->
@include("front-end.nav")
</header>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
@yield('main-body')
<!--================ End Blog Area =================-->

<!--================ start footer Area  =================-->
@include("front-end.footer")
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include("front-end.script")
</body>

</html>

