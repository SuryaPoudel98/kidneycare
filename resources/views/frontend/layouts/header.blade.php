    <?php

    use App\Models\SelectClass;

    $sc = new SelectClass();

    $subheadings = $sc->selectSubHeading("About");

    $subheadingsServices = $sc->selectSubHeading("Services");

    $headingskidneyhealths = $sc->selectSubHeading("Kidney Health");




    //  dd($headingskidneyhealths);
    ?>


    <body>
        <!-- header -->
        <header id="site-header" class="fixed-top nav-fixed">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('frontend/assets/images/logo.svg') }}" height="65" />
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                        <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav ms-auto me-2 my-2 my-lg-0 navbar-nav-scroll">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('')}}">Home</a>
                            </li> -->

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
                            <!-- <li class="nav-item">
                            <a class="nav-link" href="about.html">Treatement & Support</a>
                        </li> -->
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
                    <!-- toggle switch for light and dark theme -->
                    <!-- <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div> -->
                    <!-- //toggle switch for light and dark theme -->
                </nav>
            </div>
        </header>
        <!-- //header -->