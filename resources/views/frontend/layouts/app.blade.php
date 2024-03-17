<!-- @format -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}" />
    <!-- pop font  -->
    <link rel="stylesheet" href="{{ asset('assets/front/font/pop-font.css') }}" />
    <!-- css link  -->
    <link rel="stylesheet" href="{{ asset('assets/front/icon/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}" />
    <!-- SLICK SLIDER  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
</head>

<body>
    {{-- header --}}
    <header>
        <div class="main-header">
            <div class="container">
                <a href="{!! route('Index') !!}" class="logo">
                    <img src="img/logo.png" alt="logo" />
                </a>
                <nav>
                    <ul class="nav">
                        <li><a href="{!! route('Index') !!}" class="navbar-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                        <li><a href="{!! route('About.Us') !!}" class="navbar-link {{ request()->is('about/us') ? 'active' : '' }}">About Us</a></li>
                        <li><a href="{!! route('Service.Us') !!}" class="navbar-link {{ request()->is('service/us') ? 'active' : '' }}">Service</a></li>
                        <li><a href="product.html" class="navbar-link">Product</a></li>
                        <li><a href="faq.html" class="navbar-link">FAQ</a></li>
                        <li><a href="blog.html" class="navbar-link">Blog </a></li>
                        <li><a href="blog.html" class="navbar-link">Start Job </a></li>
                    </ul>
                    <!-- <i class="fa-solid fa-xmark"></i> -->
                </nav>
                <a href="contact.html" class="nav_hed_btn">Contact us</a>

                <div id="menu-bar" class="fa-solid fa-bars"></div>
            </div>
        </div>
    </header>
    {{-- header end --}}

        @yield('front-content')

    {{-- SCROLL BUTTON --}}
    <button id="btnScrollToTop">
        <i class="fa-solid fa-angle-up"></i>
    </button>

    {{-- Footer  --}}
    <footer class="pt-60">
        <div class="container">
            <div class="footer-body">
                <div class="footer-text">
                    <div class="footer-logo">
                        <img src="img/footer-logo.png" alt="logo" />
                    </div>

                    <p>
                        Lorem ipsum is placeholder text
                        commonly used in the graphic, print,
                        and publishing industries for previewing
                        layouts and visual mockups.
                    </p>
                </div>
                <div class="footer-list">
                    <h3>Product</h3>
                    <ul>
                        <li><a href="https://opstelit.com">Product 1</a></li>
                        <li><a href="https://opstelit.com/about">Product 2</a></li>
                        <li><a href="https://opstelit.com/service">Product 3</a></li>
                        <li><a href="https://opstelit.com/product">Product 4</a></li>
                        <li><a href="https://opstelit.com/blog">Product 5</a></li>
                    </ul>
                </div>
                <div class="footer-list">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="https://opstelit.com/contact">Services</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>
                <div class="footer-list">
                    <h3>Support </h3>
                    <ul class="top-header-social d-flex mt-4">
                        <li>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-down">
            <p>Developed By <a href="">Opstel it</a> © 2024</p>
        </div>
    </footer>
    {{-- footer end --}}



    <!-- js link js  -->
    <script src="{{ asset('assets/front/js/jq.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script src="{{ asset('assets/front/js/script.js') }}"></script>
    <!-- SLICK SLIDER  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>


    <!-- cliend logo slider  -->
    <script>
        $(".home-partner-content").slick({
            rows: 2,
            autoplay: true,
            autoplaySpeed: 1500,
            dots: true,
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 4,

            speed: 800,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToScroll: 2,
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,

                        rows: 1
                    },
                },
            ],

        });
    </script>

    <!-- review slider   -->
    <script>
        $('.Review_slider').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: "<i class='a-left control-c prev slick-prev fa-solid fa-caret-left' style='z-index:9;'></i>",
            nextArrow: "<i class='a-right control-c next slick-next fa-solid fa-caret-right' style='z-index:9;'></i>",
            responsive: [{
                    breakpoint: 950,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },


            ]
        });
    </script>

    <!-- our Project js filter start  -->
    <script>
        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myContant");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("action12");
                current[0].className = current[0].className.replace(" action12", "");
                this.className += " action12";
            });
        }
        // gallery data filter
        $(document).ready(function() {
            var $list = $(".gallery .gallery_img").hide(),
                $curr;

            $(".btn")
                .on("click", function() {
                    var $this = $(this);
                    // $this.addClass("active").siblings().removeClass("active");
                    $curr = $list.filter("." + this.id).hide();
                    $curr.slice().show(200);
                    $list.not($curr).hide(100);
                })
                .filter(".action12")
                .click();
        });
    </script>


</body>

</html>
