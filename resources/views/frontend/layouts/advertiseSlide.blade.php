<?php

use App\Models\SelectClass;

$sc = new SelectClass();

// $selectBranches = $sc->selectBranch();

$newsEvent = $sc->selectNews();

$sliderForAd = $sc->selectAdvertisementForSlide();
?>

<link rel="stylesheet" type="text/css" href="adslider/css/style.css">
<!----Light slider css link-->
<link rel="stylesheet" type="text/css" href="adslider/css/lightslider.css">
<!----Jquery---------->
<!-- <script type="text/javascript" src="adslider/js/jquery.js"></script> -->
<!----Light Slider slider js-->
<script type="text/javascript" src="adslider/js/lightslider.js"></script>
<script type="text/javascript" src="adslider/https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<!--BOX SLIDER-->
<ul id="autoWidth" class="cs-hidden">


    @foreach ($sliderForAd as $slider)
    <li class="item-a">
        <div class="box">
            <!---IMG BOX-->
            <div class="slide-img">
                <img src="uploads/advertisementimg/{{ @$slider->image }}" alt="1">
                <!------Overlayer-->
                <div class="overlayer">
                    <!------BUY BUTTON-->

                </div>
            </div>
            <!----DETAILS BOX-->
           
        </div>
    </li>
    @endforeach



</ul>

<!-----SCRIPT LINK-->
<script type="text/javascript" src="adslider/js/script.js"></script>