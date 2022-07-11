 <!-- //call section -->

    <!-- footer -->
    <footer class="w3l-footer-29-main">
        <div class="footer-29 pt-5 pb-4">
            <div class="container pt-md-4">
                <div class="row footer-top-29">
                    <div class="col-md-5 footer-list-29 pe-xl-5">
                        <h6 class="footer-title-29">About Us</h6>
                        <p class="mb-2 pe-xl-5">Mission: Affordable Kidney Care.
                        </p>
                        <p class="mb-2 pe-xl-5">Vision: State-of-the-art Kidney Care Centre.
                        </p>
                        
                        
                    </div>
                    <div class="col-md-2 col-4 footer-list-29 mt-md-0 mt-4">
                        <ul>
                            <h6 class="footer-title-29">Kidney Care</h6>
                            <li><a href="#Services">Services</a></li>
                            <li><a href="#center">Center</a></li>
                            <li><a href="#ourteam">Our Team</a></li>
                           
                        </ul>
                    </div>
                    <div class="col-md-2 col-4 footer-list-29 mt-md-0 mt-4">
                        <ul>
                            <h6 class="footer-title-29">Links</h6>
                            <li><a href="{{ url('blogpost') }}">Blog Posts</a></li>
                            <li><a href="{{ url('newslisting') }}">News & Events</a></li>
                            <li><a href="{{url('contact')}}">Contact Us</a></li>
                            
                        </ul>
                    </div>
                   
                    <div class="col-lg-3 col-md-3 col-4 footer-list-29 mt-md-0 mt-4">
                        <ul>
                            <h6 class="footer-title-29">Contact Info</h6>
                            <p class="mb-2 pe-xl-5">Address : Tarkeshowr Nagarpalika,Kathmandu Nepal 
                            </p>
                            <p class="mb-2">Phone Number : <a href="tel:+977 9851334636">+977 9851334636</a></p>
                            <p class="mb-2">Email : <a href="mailto:caremykidney@gmail.com">caremykidney@gmail.com</a></p>
                        </ul>
                    </div>
                </div>
                <!-- copyright -->
                <p class="copy-footer-29 text-center pt-lg-2 mt-5 pb-2">© 2021 Kidney Care. All rights reserved. Powered by
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
    <script src="{{ asset('frontend/assets/js/theme-change.js') }}"></script>
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
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
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
   
   
    <!-- //Js scripts -->
</body>

</html>