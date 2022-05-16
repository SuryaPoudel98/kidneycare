    <?php

    use App\Models\SelectClass;

    $sc = new SelectClass();

    $subheadings = $sc->selectSubHeading("About Us");

    $subheadingsServices = $sc->selectSubHeading("OUR SERVICES");

    $headingskidneyhealths = $sc->selectSubHeading("Kidney Health");




    //  dd($headingskidneyhealths);
    ?>


    <body>
        <!-- header -->



        <header id="site-header" class="fixed-top nav-fixed">
            <div class="container">


                <nav>
                    <div class="navbar">
                        <i class='bx bx-menu'></i>
                        <div class="logo"><a class="navbar-brand" href="/">
                                <img src="{{ asset('frontend/assets/images/logo.svg') }}" height="65" />
                            </a></div>
                        <div class="nav-links">
                            <div class="sidebar-logo">
                                <span class="logo-name">Kidney Care</span>
                                <i class='bx bx-x'></i>
                            </div>
                            <ul class="links">
                                <li><a href="#">About</a></li>
                                <li>
                                    <a href="#">Kidney Health</a>
                                    <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                                    <ul class="htmlCss-sub-menu sub-menu">
                                        <li class="more">
                                            <span><a href="#">Conditions</a>
                                                <!-- <i class='bx bxs-chevron-right arrow more-arrow'></i> -->
                                            </span>
                                            <ul class="more-sub-menu sub-menu">
                                                <li><a href="#">Neumorphism</a></li>
                                                <li><a href="#">Pre-loader</a></li>
                                                <li><a href="#">Glassmorphism</a></li>
                                            </ul>
                                        </li>
                                        <li class="more">
                                            <span><a href="#">Treatments</a>
                                                <!-- <i class='bx bxs-chevron-right arrow more-arrow'></i> -->
                                            </span>
                                            <ul class="more-sub-menu sub-menu">
                                                <li><a href="#">Neumorphism</a></li>
                                                <li><a href="#">Pre-loader</a></li>
                                                <li><a href="#">Glassmorphism</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                    <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                                    <ul class="htmlCss-sub-menu sub-menu">
                                        <li class="more">
                                            <span><a href="#">Kidney Screening </a>
                                                <!-- <i class='bx bxs-chevron-right arrow more-arrow'></i> -->
                                            </span>
                                            <ul class="more-sub-menu sub-menu">
                                                <li><a href="#">Neumorphism</a></li>
                                                <li><a href="#">Pre-loader</a></li>
                                                <li><a href="#">Glassmorphism</a></li>
                                            </ul>
                                        </li>
                                        <li class="more">
                                            <span><a href="#">Kidney Health Camp</a>
                                                <!-- <i class='bx bxs-chevron-right arrow more-arrow'></i> -->
                                            </span>
                                            <ul class="more-sub-menu sub-menu">
                                                <li><a href="#">Neumorphism</a></li>
                                                <li><a href="#">Pre-loader</a></li>
                                                <li><a href="#">Glassmorphism</a></li>
                                            </ul>
                                        </li>
                                        <li class="more">
                                            <span><a href="#">General Checkup</a>
                                                <!-- <i class='bx bxs-chevron-right arrow more-arrow'></i> -->
                                            </span>
                                            <ul class="more-sub-menu sub-menu">
                                                <li><a href="#">Neumorphism</a></li>
                                                <li><a href="#">Pre-loader</a></li>
                                                <li><a href="#">Glassmorphism</a></li>
                                            </ul>
                                        </li>
                                        <li class="more">
                                            <span><a href="#">Online Consulation</a>
                                                <!-- <i class='bx bxs-chevron-right arrow more-arrow'></i> -->
                                            </span>
                                            <ul class="more-sub-menu sub-menu">
                                                <li><a href="#">Neumorphism</a></li>
                                                <li><a href="#">Pre-loader</a></li>
                                                <li><a href="#">Glassmorphism</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Blog</a>
                                   
                                </li>
                                <li><a href="#">News & Events</a></li>
                                <li><a href="#">Donate</a></li>
                                <li><a href="#">CONTACT US</a></li>
                                <li><a href="#">My Kidney</a></li>
                            </ul>
                        </div>
                        <!-- <div class="search-box">
                            <i class='bx bx-search'></i>
                            <div class="input-box">
                                <input type="text" placeholder="Search...">
                            </div>
                        </div> -->
                    </div>
                </nav>



                <!-- <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('frontend/assets/images/logo.svg') }}" height="65" />
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                        <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav ms-auto me-2 my-2 my-lg-0 navbar-nav-scroll">
                           
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    About &nbsp;<i class="fas fa-angle-down"> </i>
                                </a>



                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    @foreach($subheadings as $subheading )
                                    <li>
                                        <a class="dropdown-item" href="{{ url('pages/').'/'.$subheading->id }}">{{ $subheading->child_title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Kidney Health &nbsp;<i class="fas fa-angle-down"> </i>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">

                                    @foreach($headingskidneyhealths as $subheading )
                                    <li>
                                        <a class="dropdown-item" href="{{ url('pages/').'/'.$subheading->id }}">{{ $subheading->child_title }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </li>
                         
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Services &nbsp;<i class="fas fa-angle-down"> </i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">

                                    @foreach($subheadingsServices as $subheading )
                                    <li>
                                        <a class="dropdown-item" href="{{ url('pages/').'/'.$subheading->id }}">{{ $subheading->child_title }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('bloglisting') }}">Blog </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('newslisting') }}">News & Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('mainpage/').'/4' }}">Donate</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('contact')}}">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('mykideny')}}">My Kidney</a>
                            </li>
                        </ul>

                    </div>
                   
                </nav> -->
            </div>
        </header>
        <!-- //header -->
        <script src="{{ asset('frontend/assets/js/script.js')}}"></script>