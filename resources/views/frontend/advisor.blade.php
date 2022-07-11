<?php

use App\Models\SelectClass;

$sc = new SelectClass();
$selectTeams = $sc->selectAdvisor();

?>

@include('frontend.layouts.title')

<body>
    <!-- header -->
    @include('frontend.layouts.header')
    <!-- header end -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title font-weight-bold pt-sm-5 pt-4">Advisor</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Advisor</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="w3l-team py-5" id="ourteam">
        <div class="container py-md-5 py-4">
            <!-- <h3 class="title-style text-center mb-5">Our <span>Team</span></h3> -->
            <div class="row text-center">
                @foreach ($selectTeams as $selectTeam)
                <div class="col-lg-3 col-sm-6">
                    <div class="team-block-single">
                        <div class="team-grids">

                            <img src="{{ url('uploads/teamimg/') . '/' . $selectTeam->image }}" class="img-fluid-service" alt="">
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
    @include('frontend.layouts.footer')


</body>

</html>