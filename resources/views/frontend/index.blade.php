<?php

use App\Models\SelectClass;

$sc = new SelectClass();



// $selectBranches = $sc->selectBranch();



$newsEvent = $sc->selectNews();


$selectTeams = $sc->SelectTeam();

$selectBranches = $sc->selectindexBranch();

?>

@include('frontend.layouts.title')

<body>

    @include('frontend.layouts.header')



    <section class="w3l-main-slider py-7" id="home">

        <div class="swiper">

            <div class="swiper-wrapper">

                <div class="swiper-slide"><img src="{{asset('frontend/images/1.jpg') }}"></div>

                <div class="swiper-slide"><img src="{{asset('frontend/images/2.jpg') }}"></div>
                <div class="swiper-slide"><img src="{{asset('frontend/images/3.jpg') }} "></div>



            </div>

            <div class="swiper-pagination"></div>



        </div>

    </section>


    <!-- banner section -->

    <!-- //banner section -->

    <!-- home block 1 -->
    <section class="w3l-servicesblock " id="aboutus">
        <div class="container py-md-5 py-4">
            <div class="row pb-xl-5 align-items-center">
                <div class="col-lg-6 position-relative home-block-3-left pb-lg-0 pb-5">
                    <div class="position-relative">
                        <img src="{{ asset('frontend/assets/images/about.jpg') }}" alt="" class="img-fluid radius-image">
                    </div>
                    <div class="imginfo__box">
                        <h6 class="imginfo__title">Get a Appointment Today!</h6>
                        <p>We have started online consultation for <br> our patient through eHospital platfrom. </p>
                        <a href="tel:http://+977 9851234477"><i class="fas fa-phone-alt"></i> +977 9851234477</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 offset-xl-1 mt-lg-0 mt-5 pt-lg-0 pt-5">
                    <h3 class="title-style mb-md-5 mb-4">Welcome <span>To </span> kidney<span> Care</span>
                    </h3>
                    <p class="sub-para">"Our Patients are our Patients, we offer quality Kidney services with a team of
                        specialists. More details about our services below".</p>
                    <p class="mt-4 pt-sm-2">Whether you’re newly diagnosed or a long term kidney patient we have lots of information
                        on the many aspects of kidney health - including dialysis, kidney function, and transplants.</p>
                    <p class="mt-4 pt-sm-2">Find out about the different types of kidney conditions, and the treatments
                        that are available to help you have a decent lifestyle</p>
                </div>
            </div>
        </div>
    </section>
    <!-- //home block 1 -->


    <div class="service-section py-5" id="Services">
        <div class="container pt-lg-5 pb-lg-5 pb-4 text-center">

            <img src="https://www.onlinekhabar.com/wp-content/uploads/2022/04/900x100.gif"/>
        </div>

    </div>


    <section class="about-section text-center pt-lg-5 pb-5" id="center">
        <div class="container pt-lg-5 pb-lg-5 pb-4">
            <h3 class="title-style text-center mb-5">Our <span>Center</span></h3>
            <div class="row justify-content-center">
                @foreach ( $selectBranches as $selectBranch)
                <div class="col-lg-4 col-md-6">
                    <div class="about-single p-3">
                        <div class="about-icon mb-4">
                            @if($selectBranch->image)
                            <img src="uploads/Branchimg/{{$selectBranch->image ?? logo.png }}" class="rounded-circle" width="304" height="236">

                            @else
                            <img src="uploads/Branchimg/logo.png" class="rounded-circle" width="304" height="236">

                            @endif
                        </div>
                        <div class="about-content">
                            <h5 class="mb-3"><a href="branchpage/{{ $selectBranch->id }}">{{ $selectBranch->branch_name }}</a></h5>
                            <p>{{ $selectBranch->address }}</p>
                            <p>{{ $selectBranch->Phone_no }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <a href="{{ url('branchlisting') }}" class="btn btn-style mt-5">View More</a>
        </div>
    </section>


    <!-- home block 2 -->

    <!-- //home block 2 -->

    <!-- home block 3 with slider -->
    <div class="service-section py-5" id="Services">
        <div class="container py-md-5 py-4">
            <h3 class="title-style text-center mb-sm-5 mb-4">Our <span>Services</span></h3>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative border-0">
                            <a href="{{ url('pages/6') }}">
                                <img class="d-block img-responsive" src="{{ asset('frontend/assets/images/opd.jpg') }} " height="250" alt="card-image">
                            </a>
                        </div>
                        <div class="card-body service-details">
                            <a href="{{ url('pages/6') }}">
                                <h4 class="service-heading">General Checkup</h4>
                            </a>
                            <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit accusa ntium dolor emque laudan.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-md-0 mt-4 pt-md-0 pt-2">
                    <div class="card">
                        <div class="card-header p-0 position-relative border-0">
                            <a href="{{ url('pages/8') }}">
                                <img class="d-block img-responsive" src="{{ asset('frontend/assets/images/dialysis.jpg') }} " height="250" alt="card-image">
                            </a>
                        </div>
                        <div class="card-body service-details">
                            <a href="{{ url('pages/8') }}">
                                <h4 class="service-heading">Dialysis</h4>
                            </a>
                            <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit accusa ntium dolor emque laudan.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-lg-0 mt-4 pt-lg-0 pt-2">
                    <div class="card">
                        <div class="card-header p-0 position-relative border-0">
                            <a href="{{ url('pages/5') }}">
                                <img class="d-block img-responsive" src="{{ asset('frontend/assets/images/pro.jpg') }}" height="250" alt="card-image">
                            </a>
                        </div>
                        <div class="card-body service-details">
                            <a href="{{ url('pages/5') }}">
                                <h4 class="service-heading">Kidney Screening</h4>
                            </a>
                            <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit accusa ntium dolor emque laudan.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-lg-0 mt-4 pt-lg-0 pt-2">
                    <div class="card">
                        <div class="card-header p-0 position-relative border-0">
                            <a href="{{ url('pages/7') }}">
                                <img class="d-block img-responsive" src="{{ asset('frontend/assets/images/healthcamp.jpg') }}" height="250" alt="card-image">
                            </a>
                        </div>
                        <div class="card-body service-details">
                            <a href="{{ url('pages/7') }}">
                                <h4 class="service-heading">Kidney Health Camp</h4>
                            </a>
                            <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit accusa ntium dolor emque laudan.</p> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- //home block 3 with slider -->

    <!-- stats section -->

    <!-- //stats section -->

    <!-- team section -->
    <section class="w3l-team py-5" id="ourteam">
        <div class="container py-md-5 py-4">
            <h3 class="title-style text-center mb-5">Our <span>Team</span></h3>
            <div class="row text-center">
                @foreach ($selectTeams as $selectTeam )
                <div class="col-lg-3 col-sm-6">
                    <div class="team-block-single">
                        <div class="team-grids">

                            <img src="{{url('uploads/teamimg/').'/'.$selectTeam->image }}" class="img-fluid" alt="">
                            <div class="team-info">
                                <div class="social-icons-section">
                                    <a class="fac" href="{{ $selectTeam->facebook}}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="twitter mx-2" href="{{ $selectTeam->twitter}}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="google" href="{{ $selectTeam->gmail }}">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="team-bottom-block p-4">
                            <h5 class="member mb-1"><a href="#team">{{ $selectTeam->name }}</a></h5>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- //team setion -->

    <!-- blog section -->


    @if(@$newsEvent[1]->title)


    <div class="w3l-homeblock2 py-5">
        <div class="container py-md-5 py-4">
            <h3 class="title-style text-center mb-5">News <span>&</span> Events</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="bg-clr-white hover-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6 position-relative">
                                <a href="#blog">
                                    <img class="img-fluid d-block" src="{{url('uploads/Postimg/').'/'.@$newsEvent[0]->image }}" alt="image">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body blog-details align-self pl-sm-0">
                                    <a href="news/{{@$newsEvent[0]->id}}" class="blog-desc"> {!! substr(@$newsEvent[0]->title , 0, 50) !!}
                                    </a>
                                    <p>{!! substr(@$newsEvent[0]->description , 0, 200) !!}</p>
                                    <div class="d-flex align-items-center justify-content-between mt-lg-4 mt-5">
                                        <!-- <h5 class="text-blog-e">July 15, 2021</h5> -->
                                        <!-- <a href="#blog" class="blog-icon-e"><i class="fas fa-plus"></i></a> -->
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
                                    <img class="img-fluid d-block" src="{{url('uploads/Postimg/').'/'.@$newsEvent[1]->image }}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body blog-details align-self pl-sm-0">
                                    <a href="news/{{@$newsEvent[1]->id}}" class="blog-desc"> {!! substr(@$newsEvent[1]->title , 0, 50) !!}</a>
                                    <p>{!! substr(@$newsEvent[1]->description , 0, 200) !!}</p>
                                    <div class="d-flex align-items-center justify-content-between mt-lg-4 mt-5">
                                        <!-- <h5 class="text-blog-e">July 18, 2021</h5> -->
                                        <!-- <a href="#blog" class="blog-icon-e"><i class="fas fa-plus"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif



    <!-- <section class="w3l-contact-11 py-5" id="contact">
        <div class="container py-md-5 py-4">
            <h3 class="title-style text-center mb-5"><span>eGFR </span> Calculator</h3>




            <div class="form-inner-cont mx-auto" style="max-width:800px">
                <form action="" method="post" class="signin-form">
                    <div class="row align-form-map">
                        <div class="col-sm-3  mt-2 form-input">

                            <b style="text-align: right;">Serum Creatinine:</b>
                        </div>
                        <div class="col-sm-3 form-input">
                            <input type="email" name="w3lSender" id="w3lSender" placeholder="" required="" />
                        </div>
                        <div class="col-sm-3 mt-2 form-input">

                            <b>mg/dl</b>
                        </div>


                    </div>
                    <div class="row align-form-map">
                        <div class="col-sm-3  mt-2 form-input">

                            <b style="text-align: right;">Serum Cystatin C:</b>
                        </div>
                        <div class="col-sm-3 form-input">
                            <input type="email" name="w3lSender" id="w3lSender" placeholder="" required="" />
                        </div>
                        <div class="col-sm-3 mt-2 form-input">

                            <b>mg/l</b>
                        </div>


                    </div>
                    <div class="row align-form-map">
                        <div class="col-sm-3  mt-2 form-input">

                            <b style="text-align: right;">Age:</b>
                        </div>
                        <div class="col-sm-3 form-input">
                            <input type="email" name="w3lSender" id="w3lSender" placeholder="" required="" />
                        </div>
                        <div class="col-sm-3 mt-2 form-input">

                            <b>years</b>
                        </div>


                    </div>
                    <div class="row align-form-map">
                        <div class="col-sm-3  mt-2 form-input">

                            <b style="text-align: right;">Gender:</b>
                        </div>
                        <div class="col-sm-3 form-input ">
                            <select class="form-select">
                                <option selected>Select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                      

                    </div>

                    <div class="submit text-left mt-3">
                        <button type="submit" class="btn btn-style"> Calculate </button>
                    </div>
                </form>
            </div>
        </div>
    </section> -->


    <!-- call section -->
    <!-- <section class="w3l-call-to-action-6">
        <div class="container py-md-5 py-sm-4 py-5">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div class="left-content-call">
                    <h3 class="title-big">Visit Now!</h3>
                    <p class="text-white mt-1">Begin the change today</p>
                </div>
                <div class="right-content-call mt-sm-0 mt-4">
                    <ul class="buttons">
                        <li class="phone-sec me-lg-4"><i class="fas fa-phone-volume"></i>
                            <a class="call-style-w3" href="tel:+1(23) 456 789 0000">+1(23) 456 789 0000</a>
                        </li>
                        <li><a href="appointment.html" class="btn btn-style btn-style-2 mt-lg-0 mt-3">Book Now</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section> -->
    @include('frontend.layouts.footer')

</body>