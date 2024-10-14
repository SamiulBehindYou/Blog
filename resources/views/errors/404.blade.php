
<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('frontend') }}/img/favicon.png">

    <!-- Title -->
    <title> Oredoo - Personal Blog HTML Template </title>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/fontawesome.css">

    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/custom.css">
</head>

<body>
    <!--loading -->
    <div class="loader">
        <div class="loader-element"></div>
      </div>

    <!--page404-->
    <div class="page404 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="page404-content">
                       <img src="{{ asset('frontend') }}/img/other/error404.png" alt="">
                        <h3>Oops... Page Not Found!</h3>
                        <p>The page which you are looking for does not exist. Please return to the homepage.
                        </p>
                        <a href="{{ route('front.dashboard') }}" class="btn-custom">Back to homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>

    <!-- JS Plugins  -->
    <script  src="{{ asset('frontend') }}/js/theia-sticky-sidebar.js"></script>
    <script src="{{ asset('frontend') }}/js/ajax-contact.js"></script>
    <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/js/switch.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.marquee.js"></script>

    <!-- JS main  -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

</body>
</html>
