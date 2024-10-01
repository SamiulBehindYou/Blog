
<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('frontend') }}/img/favicon.png">

    <!-- Title -->Stay Connected
    <title>{{ App\Models\Setting::find(1)->title }}</title>

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

    <!-- Header-->
    <header class="header navbar-expand-lg fixed-top ">
        <div class="container-fluid ">
            <div class="header-area ">
                <!--logo-->
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset('frontend') }}/img/logo/logo-dark.png" alt="" class="logo-dark">
                        <img src="{{ asset('frontend') }}/img/logo/logo-white.png" alt="" class="logo-white">
                    </a>
                </div>
                <div class="header-navbar">
                    <nav class="navbar">
                        <!--navbar-collapse-->
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav ">
                                <li class="nav-item ">
                                    <a class="nav-link {{ request()->routeIs('front.dashboard') ? 'active' : '' }}" href="{{ route('front.dashboard') }}"> Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(1) === 'blog' ? 'active' : '' }}" href="#"> Blogs </a>
                                </li>
                                @auth('author')
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(1) === 'author' ? 'active' : '' }}" href="#"> Authors </a>
                                </li>
                                @endauth
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}"> About </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}"> Contact </a>
                                </li>
                            </ul>
                        </div>
                        <!--/-->
                    </nav>
                </div>

                <!--header-right-->
                <div class="header-right ">
                    <!--theme-switch-->
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <span class="slider round ">
                                <i class="lar la-sun icon-light"></i>
                                <i class="lar la-moon icon-dark"></i>
                            </span>
                        </label>
                    </div>

                    <!--search-icon-->
                    <div class="search-icon">
                        <i class="las la-search"></i>
                    </div>
                    <!--button-subscribe-->
                    @auth('author')
                    <div class="dropdown">
                        <button class="btn btn-subscribe " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ Auth::guard('author')->user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item btn-subscribe" href="{{ route('author.control') }}">Author Controls</a>
                          <form method="POST" action="{{ route('author.logout') }}">
                            @csrf
                                <button type="submit" class="dropdown-item btn-subscribe text-danger">Log Out</button>
                            </form>
                        </div>
                      </div>
                    @else
                    <div class="botton-sub">
                        <a href="{{ route('front.login') }}" class="btn-subscribe">Sign In</a>
                    </div>
                    @endauth

                    <!--navbar-toggler-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

@yield('main')


    <!--footer-->
    <div class="footer">
        <div class="footer-area">
            <div class="footer-area-content">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="menu">
                                <h6>Menu</h6>
                                <ul>
                                    <li><a href="{{ route('front.dashboard') }}">Homepage</a></li>
                                    <li><a href="#">Blogs</a></li>
                                    <li><a href="{{ route('about') }}">About us</a></li>
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--newslatter-->
                        <div class="col-md-6">
                            <div class="newslettre">
                                <div class="newslettre-info">
                                    <h3>Subscribe To OurNewsletter</h3>
                                    <p>Sign up for free and be the first to get notified about new posts.</p>
                                </div>

                                <form action="{{ route('subscrib') }}" method="POST" class="newslettre-form">
                                    @csrf
                                    <div class="form-flex">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email Adress" required="required">
                                        </div>
                                        <button class="submit-btn" type="submit">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                    @error('email')
                                        <strong class="text-warning">{{ $message }}</strong>
                                    @enderror
                                </form>
                            </div>
                        </div>
                        <!--/-->
                        <div class="col-md-3">
                            <div class="menu">
                                <h6>Follow us</h6>
                                <ul class="p-0 m-0">
                                    @php
                                        $setting = App\Models\Setting::find(1);
                                    @endphp
                                    @if($setting->facebook_status == 1)
                                        <li><a target="blank" href="{{ $setting->facebook }}">Facebook</a></li>
                                    @endif
                                    @if($setting->instagram_status == 1)
                                        <li><a target="blank" href="{{ $setting->insagram }}">Insagram</a></li>
                                    @endif
                                    @if($setting->twiter_status == 1)
                                        <li><a target="blank" href="{{ $setting->twiter }}">Twiter</a></li>
                                    @endif
                                    @if($setting->youtube_status == 1)
                                        <li><a target="blank" href="{{ $setting->youtube }}">YouTube</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer-copyright-->
            <div class="footer-area-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <p>© 2024, SAMIUL's Blog, All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/-->
        </div>
    </div>

    <!--Back-to-top-->
    <div class="back">
        <a href="#" class="back-top">
            <i class="las la-long-arrow-alt-up"></i>
        </a>
    </div>

    <!--Search-form-->
    <div class="search">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 m-auto">
                    <div class="search-width">
                        <button type="button" class="close">
                            <i class="far fa-times"></i>
                        </button>
                        <form class="search-form" action="{{ route('search') }}" method="GET">
                            <input type="search" name="keyword" placeholder="What are you looking for?">
                            <button type="submit" class="search-btn"> Search</button>
                        </form>
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
    <script src="{{ asset('frontend') }}/js/theia-sticky-sidebar.js"></script>
    <script src="{{ asset('frontend') }}/js/ajax-contact.js"></script>
    <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/js/switch.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.marquee.js"></script>


    <!-- JS main  -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
    <script>
        Swal.fire({
        position: "center",
        icon: "success",
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
    @endif
    @if (session('error'))
    <script>
        Swal.fire({
        position: "center",
        icon: "error",
        title: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 3500
        });
    </script>
    @endif
    @if (session('registration'))
    <script>
        Swal.fire({
        position: "center",
        icon: "success",
        title: "{{ session('registration') }}",
        });
    </script>
    @endif
    @if (session('info'))
    <script>
        Swal.fire({
        position: "center",
        icon: "info",
        title: "{{ session('info') }}",
        });
    </script>
    @endif



</body>
</html>
