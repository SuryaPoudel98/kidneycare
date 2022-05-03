@include('frontend.layouts.title')

<body>
    <!-- header -->
@include('frontend.layouts.header')
     <!-- header end -->

    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title font-weight-bold pt-sm-5 pt-4">News & Events</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>News & Events</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->


    <!-- //aboutblock1 section -->


    <!-- blog section -->
    <div class="w3l-homeblock2 py-2">
        <div class="container py-md-5 py-4">
            <!-- <h3 class="title-style text-center mb-5">News <span>&</span> Events</h3> -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="bg-clr-white hover-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6 position-relative">
                                <a href="#blog">
                                    <img class="img-fluid d-block" src="assets/images/nurse.jpg" alt="image">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body blog-details align-self pl-sm-0">
                                    <a href="#blog" class="blog-desc">Dialysis Nursing Training
                                    </a>
                                    <p>Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit.</p>
                                    <div class="d-flex align-items-center justify-content-between mt-lg-4 mt-5">
                                        <h5 class="text-blog-e">July 15, 2021</h5>
                                        <a href="#blog" class="blog-icon-e"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-4">
                    <div class="bg-clr-white hover-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6 position-relative">
                                <a href="#blog">
                                    <img class="img-fluid d-block" src="assets/images/clinical.jpg" alt="Card image cap">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body blog-details align-self pl-sm-0">
                                    <a href="#blog" class="blog-desc">Clinical Practicum Traning</a>
                                    <p>Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit.</p>
                                    <div class="d-flex align-items-center justify-content-between mt-lg-4 mt-5">
                                        <h5 class="text-blog-e">July 18, 2021</h5>
                                        <a href="#blog" class="blog-icon-e"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //blog section -->

   

    <!-- footer -->
    <footer class="w3l-footer-29-main">
        <div class="footer-29 pt-5 pb-4">
            <div class="container pt-md-4">
                <div class="row footer-top-29">
                    <div class="col-md-5 footer-list-29 pe-xl-5">
                        <h6 class="footer-title-29">About Us</h6>
                        <p class="mb-2 pe-xl-5">Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit.
                            Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit.
                        </p>
                        
                        
                    </div>
                    <div class="col-md-2 col-4 footer-list-29 mt-md-0 mt-4">
                        <ul>
                            <h6 class="footer-title-29">Kideny Care</h6>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="about.html">Special Offers</a></li>
                            <li><a href="about.html">Orthodontics</a></li>
                            <li><a href="about.html">About Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-4 footer-list-29 mt-md-0 mt-4">
                        <ul>
                            <h6 class="footer-title-29">Links</h6>
                            <li><a href="#blog">Blog Posts</a></li>
                            <li><a href="#privacy">Privacy policy</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="#license">License & uses</a></li>
                        </ul>
                    </div>
                    <!-- <div class="col-lg-3 col-md-3 col-4 ps-lg-5 ps-md-4 footer-list-29 mt-md-0 mt-4">
                        <ul>
                            <h6 class="footer-title-29">Links</h6>
                            <li><a href="#blog">Blog Posts</a></li>
                            <li><a href="#privacy">Privacy policy</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="#license">License & uses</a></li>
                        </ul>
                    </div> -->
                    <div class="col-lg-3 col-md-3 col-4 footer-list-29 mt-md-0 mt-4">
                        <ul>
                            <h6 class="footer-title-29">Contact Info</h6>
                            <p class="mb-2 pe-xl-5">Address : Tarkeshowr Nagarpalika,Kathmandu Nepal 
                            </p>
                            <p class="mb-2">Phone Number : <a href="tel:+1(21) 234 4567">+977 9851234477</a></p>
                            <p class="mb-2">Email : <a href="mailto:info@example.com">info@kidenycare.com.np</a></p>
                        </ul>
                    </div>
                </div>
                <!-- copyright -->
                <p class="copy-footer-29 text-center pt-lg-2 mt-5 pb-2">© 2021 Dentition. All rights reserved. Design by
                    <a href="https://tukisoft.com.np/" target="_blank">
                        Tuki Soft </a>
                </p>
                <!-- //copyright -->
            </div>
        </div>
    </footer>
    <!-- //footer -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-level-up-alt" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    
    <!-- //common jquery plugin -->

    <!-- for services carousel slider -->
    <!-- <script src="assets/js/owl.carousel.js"></script>
    <script>
        $(document).ready(function () {
            $('.owl-three').owlCarousel({
                loop: true,
                stagePadding: 20,
                margin: 20,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    991: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            })
        })
    </script> -->
    <!-- //for services carousel slider -->

    <!-- theme switch js (light and dark)-->
    <script src="assets/js/theme-change.js"></script>
    <!-- //theme switch js (light and dark)-->

    <!-- MENU-JS -->
    <script>
        // $(window).on("scroll", function () {
        //     var scroll = $(window).scrollTop();

        //     if (scroll >= 80) {
        //         $("#site-header").addClass("nav-fixed");
        //     } else {
        //         $("#site-header").removeClass("nav-fixed");
        //     }
        // });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap -->

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            autoplay: {
                display: 3000,
                disableOnInteraction: false,
            },
            loop: true,


            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },


            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });

    </script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- //Js scripts -->
</body>

</html>