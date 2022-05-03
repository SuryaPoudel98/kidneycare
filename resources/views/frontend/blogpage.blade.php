@include('frontend.layouts.title')

<body>
    <!-- header -->
    @include('frontend.layouts.header')
    <!-- header end -->


    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title font-weight-bold pt-sm-5 pt-4">{{ $BlogDetails[0]->title ?? ''}}</h4>

                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>{{$BlogDetails[0]->title ?? ''}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- aboutblock1 section -->
    <section class="w3l-homeblock1 py-5" id="about">
        <div class="container py-md-5 py-4">
            <div class="row align-items-center">
                <div class="col-lg-12 pe-xl-5">
                    @isset($BlogDetails[0]->image)



                    <img class="img-fluid" width="100%" src="{{url('uploads/Postimg/').'/'.$BlogDetails[0]->image }}">

                    @endisset


                    <h3 class="title-style mb-3">Welcome to <span>{{ $BlogDetails[0]->title ?? ''}}</span></h3>
                    <p> {!! $BlogDetails[0]->description ?? '' !!}  </p>
                    <div class="mt-4">
                        <!-- <ul class="service-list">
                            <li class="service-link"><a href="#url"><i class="fas fa-check-circle"></i>Exceptional
                                    Service</a></li>
                            <li class="service-link"><a href="#url"><i class="fas fa-check-circle"></i>Soft & Gentle</a>
                            </li>
                        </ul>  -->
                    </div>

                </div>
                <!-- <div class="col-lg-6 homeaboutblock mt-lg-0 mt-5">
               
                 
                  @isset($ParentContentDetails[0]->Thumbnailimg)
						
					

                        <img class="img-fluid" width="100%" src="{{url('uploads/parentcontentimg/').'/'.$ParentContentDetails[0]->Thumbnailimg }}">
                     
                   @endisset
                </div> -->
            </div>
        </div>
    </section>
    <!-- //aboutblock1 section -->

    <!-- footer -->
    @include('frontend.layouts.footer')
    <!-- end footer -->

</body>

</html>