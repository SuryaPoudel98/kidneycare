    <?php

    use App\Models\SelectClass;

    $sc = new SelectClass();

    $subheadings = $sc->selectSubHeading('About Us');

    $conditionsSubheading = $sc->selectSubHeading('Conditions');

    $treatmentsSubheading = $sc->selectSubHeading('Treatments');
    $KidneyScreeningSubheading = $sc->selectSubHeading('Kidney Screening');
    $KidneyHealthCampSubheading = $sc->selectSubHeading('Kidney Health Camp');
    $GeneralCheckupSubheading = $sc->selectSubHeading('General Checkup');
    $OnlineConsulationSubheading = $sc->selectSubHeading('Online Consultation');
    $subheadingsServices = $sc->selectSubHeading('OUR SERVICES');

    $headingskidneyhealths = $sc->selectSubHeading('Kidney Health');

    //  dd($headingskidneyhealths);

    ?>


    <body>
        <!-- header -->
        <style type="text/css">
            /* ============ desktop view ============ */
            @media (min-width: 992px) {

                .dropdown-menu li {
                    position: relative;
                }

                .dropdown-menu .submenu {
                    display: none;
                    position: absolute;
                    left: 100%;
                    top: -7px;
                }

                .dropdown-menu .submenu-left {
                    right: 100%;
                    left: auto;
                }

                .dropdown-menu>li:hover {
                    background-color: #f1f1f1
                }

                .dropdown-menu>li:hover>.submenu {
                    display: block;
                }
            }

            /* ============ desktop view .end// ============ */

            /* ============ small devices ============ */
            @media (max-width: 991px) {

                /* .dropdown-menu .dropdown-menu {
                    margin-left: 0.7rem;
                    margin-right: 0.7rem;
                    margin-bottom: .5rem;
                } */

            }

            /* ============ small devices .end// ============ */
        </style>


        <script type="text/javascript">
            //	window.addEventListener("resize", function() {
            //		"use strict"; window.location.reload(); 
            //	});


            document.addEventListener("DOMContentLoaded", function() {


                /////// Prevent closing from click inside dropdown
                document.querySelectorAll('.dropdown-menu').forEach(function(element) {
                    element.addEventListener('click', function(e) {
                        e.stopPropagation();
                    });
                })



                // make it as accordion for smaller screens
                if (window.innerWidth < 992) {

                    // close all inner dropdowns when parent is closed
                    document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown) {
                        everydropdown.addEventListener('hidden.bs.dropdown', function() {
                            // after dropdown is hidden, then find all submenus
                            this.querySelectorAll('.submenu').forEach(function(everysubmenu) {
                                // hide every submenu as well
                                everysubmenu.style.display = 'none';
                            });
                        })
                    });

                    document.querySelectorAll('.dropdown-menu a').forEach(function(element) {
                        element.addEventListener('click', function(e) {

                            let nextEl = this.nextElementSibling;
                            if (nextEl && nextEl.classList.contains('submenu')) {
                                // prevent opening link if link needs to open dropdown
                                e.preventDefault();
                                console.log(nextEl);
                                if (nextEl.style.display == 'block') {
                                    nextEl.style.display = 'none';
                                } else {
                                    nextEl.style.display = 'block';
                                }

                            }
                        });
                    })
                }
                // end if innerWidth

            });
            // DOMContentLoaded  end
        </script>


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

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    About &nbsp;<i class="fas fa-angle-down"> </i>
                                </a>



                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">




                                    @foreach ($subheadings as $subheading)
                                    <li>
                                        <a class="dropdown-item" href="{{ url('pages/') . '/' . $subheading->id }}">{{ $subheading->child_title }}</a>
                                    </li>
                                    @endforeach
                                    <li>
                                        <a class="dropdown-item" href="{{ url('boardmember') }}">Board Member</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('advisor') }}">Advisor</a>
                                    </li>
                                </ul>


                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Kidney Health &nbsp;<i class="fas fa-angle-down"> </i>
                                </a>
                                <ul class="dropdown-menu">

                                    <li><a class="dropdown-item" href="#"> Conditions <i class="fas fa-angle-right"> </i> </a>
                                        <ul class="submenu dropdown-menu">


                                            @foreach ($conditionsSubheading as $subheading)
                                            <li>
                                                <a class="dropdown-item" href="{{ url('pages/') . '/' . $subheading->id }}">{{ $subheading->child_title }}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="#"> Treatments <i class="fas fa-angle-right"> </i> </a>
                                        <ul class="submenu dropdown-menu">


                                            @foreach ($treatmentsSubheading as $subheading)
                                            <li>
                                                <a class="dropdown-item" href="{{ url('pages/') . '/' . $subheading->id }}">{{ $subheading->child_title }}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>


                                </ul>


                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Services &nbsp;<i class="fas fa-angle-down"> </i>
                                </a>

                                <ul class="dropdown-menu">

                                    <li><a class="dropdown-item" href="#">Kidney Screening <i class="fas fa-angle-right"> </i> </a>
                                        <ul class="submenu dropdown-menu">


                                            @foreach ($KidneyScreeningSubheading as $subheading)
                                            <li>
                                                <a class="dropdown-item" href="{{ url('pages/') . '/' . $subheading->id }}">{{ $subheading->child_title }}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Kidney Health Camp <i class="fas fa-angle-right"> </i> </a>
                                        <ul class="submenu dropdown-menu">


                                            @foreach ($KidneyHealthCampSubheading as $subheading)
                                            <li>
                                                <a class="dropdown-item" href="{{ url('pages/') . '/' . $subheading->id }}">{{ $subheading->child_title }}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="#">General Checkup <i class="fas fa-angle-right"> </i> </a>
                                        <ul class="submenu dropdown-menu">


                                            @foreach ($GeneralCheckupSubheading as $subheading)
                                            <li>
                                                <a class="dropdown-item" href="{{ url('pages/') . '/' . $subheading->id }}">{{ $subheading->child_title }}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Online Consultation <i class="fas fa-angle-right"> </i> </a>
                                        <ul class="submenu dropdown-menu">


                                            @foreach ($OnlineConsulationSubheading as $subheading)
                                            <li>
                                                <a class="dropdown-item" href="{{ url('pages/') . '/' . $subheading->id }}">{{ $subheading->child_title }}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>

                                </ul>



                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('bloglisting') }}">Blog </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('newslisting') }}">News & Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('mainpage/') . '/4' }}">Donate</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('mykideny') }}">My Kidney</a>
                            </li>
                        </ul>

                    </div>

                </nav>
            </div>
        </header>
        <!-- //header -->
        <!-- <script src="{{ asset('frontend/assets/js/script.js') }}"></script> -->