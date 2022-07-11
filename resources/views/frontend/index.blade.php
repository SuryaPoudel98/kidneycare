<?php

use App\Models\SelectClass;

$sc = new SelectClass();

// $selectBranches = $sc->selectBranch();

$newsEvent = $sc->selectNews();

$selectServices = $sc->SelectServices('Kidney Screening');

$generalCheckup = $sc->SelectServices('General Checkup');
$KidneyHealthCamp = $sc->SelectServices('Kidney Health Camp');
$OnlineConsulation = $sc->SelectServices('Online Consulation');

$selectTeams = $sc->SelectTeam();

$selectBranches = $sc->selectindexBranch();

$advertismentFirst = $sc->selectAdvertisement(1);
$advertismentSecond = $sc->selectAdvertisement(2);
$advertismentThird = $sc->selectAdvertisement(3);
$advertismentFour = $sc->selectAdvertisement(4);
$advertismentFive = $sc->selectAdvertisement(5);
$aboutKidneyPara = $sc->selectParagraphOfPageDetailsFromTable(2);
$welcomeimage = $sc->selectWelcomeimg();
?>

@include('frontend.layouts.title')


<body>
    <style>
        .thumbnail {
            /* background-color: #fff; */
            width: 100%;
            height: 250px;
            display: inline-block;
            /* makes it fit in like an <img> */
            background-size: cover;
            /* or contain */
            background-position: center center;
            background-repeat: no-repeat;
            /* border-radius: 4px 4px 0 0; */
            position: relative;

        }
    </style>

    @include('frontend.layouts.header')



    <section class="w3l-main-slider py-7" id="home">

        <div class="swiper">

            <div class="swiper-wrapper">



                @foreach ($sliders as $slider)
                <div class="swiper-slide"> <img src="uploads/slider/{{ $slider->image }}"></div>
                @endforeach




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
                        <img src="uploads/Welcomeimg/{{ $welcomeimage->image }}" alt="" class="img-fluid radius-image">
                        <!-- <img src="{{ asset('frontend/assets/images/about.jpg') }}" alt="" class="img-fluid radius-image"> -->
                    </div>
                    <div class="imginfo__box">
                        <h6 class="imginfo__title">Please visit us!</h6>
                        <p>मृगौला जचाऔं, मृगौला बचाऔं</p>
                        <p>Check Your Kidney, Save Your Kidney</p>
                        <a href="tel:http://+977 9851234477"><i class="fas fa-phone-alt"></i> +977 9851334636</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 offset-xl-1 mt-lg-0 mt-5 pt-lg-0 pt-5">
                    <h3 class="title-style mb-md-5 mb-4">Welcome !!</span>
                    </h3>

                    {!! substr(@$aboutKidneyPara[0]->text, 0, 500) !!}
                    <a href="{{ url('pages/') . '/2' }}" class="btn btn-style mt-5">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- //home block 1 -->

    @if (@$advertismentFirst[0]->image)
    <div class="service-section py-5" id="Services">
        <div class="container pt-lg-5 pb-lg-5 pb-4 text-center">

            <img class="img-fluid" src="uploads/advertisementimg/{{ @$advertismentFirst[0]->image }}" />
        </div>

    </div>
    @endif
    <?php $i = 0; ?>
    <section class="about-section text-center pt-lg-5 pb-5" id="center">
        <div class="container pt-lg-5 pb-lg-5 pb-4">
            <h3 class="title-style text-center mb-5">Our <span>Center</span></h3>
            <div class="row justify-content-center">
                @foreach ($selectBranches as $selectBranch)
                <?php $i++; ?>
                <div class="col-lg-4 col-md-6">
                    <div class="about-single p-3">
                        <div class="about-icon mb-4">
                            @if ($selectBranch->image)
                            <img src="uploads/Branchimg/{{ $selectBranch->image ?? logo . png }}" class="rounded-circle" width="304" height="236">
                            @else
                            <img src="uploads/Branchimg/logo.png" class="rounded-circle" width="304" height="236">
                            @endif
                        </div>
                        <div class="about-content">
                            <h5 class="mb-3"><a href="branchpage/{{ $selectBranch->id }}">{{ $selectBranch->branch_name }}</a>
                            </h5>
                            <p>{{ $selectBranch->address }}</p>
                            <p>{{ $selectBranch->Phone_no }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <?php if ($i > 3) { ?>

                <a href="{{ url('branchlisting') }}" class="btn btn-style mt-5">View More</a>

            <?php } ?>
        </div>
    </section>

    @if (@$advertismentSecond[0]->image)
    <div class="service-section py-5" id="Services">
        <div class="container pt-lg-5 pb-lg-5 pb-4 text-center">

            <img class="img-fluid" src="uploads/advertisementimg/{{ @$advertismentSecond[0]->image }}" />
        </div>

    </div>
    @endif
    <!-- home block 2 -->

    <!-- //home block 2 -->

    <!-- home block 3 with slider -->
    <div class="service-section py-5" id="Services">
        <div class="container py-md-5 py-4">
            <h3 class="title-style text-center mb-sm-5 mb-4">Our <span>Services</span></h3>
            <div class="row justify-content-center">
                @foreach ($selectServices as $drug)
                <div class="col-lg-3 col-md-6 mt-md-0 mt-4 mb-4 pt-md-0 pt-2 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative border-0">
                            <a href="{{ url('pages/' . $drug->childpage_id) }}">
                                <img class=" img-fluid-service " src="uploads/childcontentimg/{{ $drug->Thumbnailimg }}" height="250" alt="card-image">

                            </a>
                        </div>
                        <div class="card-body service-details">
                            <a href="{{ url('pages/' . $drug->childpage_id) }}">
                                <h4 class="service-heading">{{ $drug->child_title }}</h4>
                            </a>
                            <!-- <p> {!! substr(@$drug->text, 0, 100) !!} ...
                                <a href="{{ url('pages/' . $drug->childpage_id) }}" class="btn btn-style mt-1">View More</a>
                            </p> -->
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($generalCheckup as $drug)
                <div class="col-lg-3 col-md-6 mt-md-0 mt-4  mb-4  pt-md-0 pt-2 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative border-0">
                            <a href="{{ url('pages/' . $drug->childpage_id) }}">
                                <img class=" img-fluid-service" src="uploads/childcontentimg/{{ $drug->Thumbnailimg }}" height="250" alt="card-image">

                            </a>
                        </div>
                        <div class="card-body service-details">
                            <a href="{{ url('pages/' . $drug->childpage_id) }}">
                                <h4 class="service-heading">{{ $drug->child_title }}</h4>
                            </a>
                            <!-- <p> {!! substr(@$drug->text, 0, 100) !!} ...
                                <a href="{{ url('pages/' . $drug->childpage_id) }}" class="btn btn-style mt-1">View More</a>
                            </p> -->
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($KidneyHealthCamp as $drug)
                <div class="col-lg-3 col-md-6 mt-md-0 mt-4  mb-4  pt-md-0 pt-2 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative border-0">
                            <a href="{{ url('pages/' . $drug->childpage_id) }}">
                                <img class=" img-fluid-service" src="uploads/childcontentimg/{{ $drug->Thumbnailimg }}" height="250" alt="card-image">

                            </a>
                        </div>
                        <div class="card-body service-details">
                            <a href="{{ url('pages/' . $drug->childpage_id) }}">
                                <h4 class="service-heading">{{ $drug->child_title }}</h4>
                            </a>
                            <!-- <p> {!! substr(@$drug->text, 0, 100) !!} ...
                                <a href="{{ url('pages/' . $drug->childpage_id) }}" class="btn btn-style mt-1">View More</a>
                            </p> -->
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($OnlineConsulation as $drug)
                <div class="col-lg-3 col-md-6 mt-md-0 mt-4  mb-4  pt-md-0 pt-2 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative border-0">
                            <a href="{{ url('pages/' . $drug->childpage_id) }}">
                                <img class=" img-fluid-service" src="uploads/childcontentimg/{{ $drug->Thumbnailimg }}" height="250" alt="card-image">

                            </a>
                        </div>
                        <div class="card-body service-details">
                            <a href="{{ url('pages/' . $drug->childpage_id) }}">
                                <h4 class="service-heading">{{ $drug->child_title }}</h4>
                            </a>
                            <!-- <p> {!! substr(@$drug->text, 0, 100) !!} ...
                                <a href="{{ url('pages/' . $drug->childpage_id) }}" class="btn btn-style mt-1">View More</a>
                            </p> -->
                        </div>
                    </div>
                </div>
                @endforeach







            </div>
        </div>
    </div>
    <!-- //home block 3 with slider -->

    <!-- stats section -->
    @if (@$advertismentThird[0]->image)
    <div class="service-section py-5" id="Services">
        <div class="container pt-lg-5 pb-lg-5 pb-4 text-center">

            <img class="img-fluid" src="uploads/advertisementimg/{{ @$advertismentThird[0]->image }}" />
        </div>

    </div>
    @endif
    <!-- //stats section -->

    <!-- team section -->
    <section class="w3l-team py-5" id="ourteam">
        <div class="container py-md-5 py-4">
            <h3 class="title-style text-center mb-5">Our <span>Team</span></h3>
            <div class="row text-center">
                @foreach ($selectTeams as $selectTeam)
                <div class="col-lg-3 col-sm-6">
                    <div class="team-block-single">
                        <div class="team-grids">

                            <img src="{{ url('uploads/teamimg/') . '/' . $selectTeam->image }}" class="img-fluid" alt="">
                            <div class="team-info">
                                <div class="social-icons-section">
                                    <a class="fac" href="{{ $selectTeam->facebook }}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="twitter mx-2" href="{{ $selectTeam->twitter }}">
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
    @if (@$advertismentFour[0]->image)
    <div class="service-section py-5" id="Services">
        <div class="container pt-lg-5 pb-lg-5 pb-4 text-center">

            <img class="img-fluid" src="uploads/advertisementimg/{{ @$advertismentFour[0]->image }}" />
        </div>

    </div>
    @endif

    @if (@$newsEvent[0]->title)
    <div class="w3l-homeblock2 py-5">
        <div class="container py-md-5 py-4">
            <h3 class="title-style text-center mb-5">News <span>&</span> Events</h3>
            <div class="row">

                @foreach ($newsEvent as $news)

                <div class="col-lg-6 mt-lg-0 mt-4">
                    <div class="bg-clr-white hover-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6 position-relative">
                                <a href="#blog">
                                    <img class="img-fluid-service" src="{{ url('uploads/Postimg/') . '/' . @$news->image }}" alt="{{$news->title}}">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body blog-details align-self pl-sm-0">
                                    <a href="news/{{ @$news->id }}" class="blog-desc">
                                        {!! substr(@$news->title, 0, 50) !!}</a>
                                    <p>{!! substr(@$news->description, 0, 200) !!}</p>
                                    <div class="d-flex align-items-center justify-content-between mt-lg-4 mt-5">
                                        <!-- <h5 class="text-blog-e">July 18, 2021</h5> -->
                                        <!-- <a href="#blog" class="blog-icon-e"><i class="fas fa-plus"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </div>
    @endif

    @if (@$advertismentFive[0]->image)
    <div class="service-section py-5" id="Services">
        <div class="container pt-lg-5 pb-lg-5 pb-4 text-center">

            <img class="img-fluid" src="uploads/advertisementimg/{{ @$advertismentFive[0]->image }}" />
        </div>

    </div>
    @endif


    @include('frontend.layouts.advertiseSlide')


    @include('frontend.layouts.footer')

</body>