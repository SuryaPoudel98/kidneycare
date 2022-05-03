@include('frontend.layouts.title')

<body>

    @include('frontend.layouts.header')
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title font-weight-bold pt-sm-5 pt-4">My Kideny</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>My Kindey</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="w3l-contact-11" id="contact">
        <div class="container py-md-5 py-4">
            <!-- <h3 class="title-style text-center mb-5"><span>My </span> Kideny</h3> -->

            <div class="form-inner-cont mx-auto" style="max-width:800px">
                <form action="{{ route('patient.search.report') }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-form-map">
                        <div class="col-sm-3 form-input">
                            <p style="margin-top: 10px; text-align: right;">
                                Patient ID
                            </p>
                        </div>
                        <div class="col-sm-6 form-input">

                            <input type="text"  id="pid" placeholder="Enter your patient ID" />
                        </div>
                        <div class="col-sm-3 form-input">

                        </div>
                        <div class="col-sm-3 form-input">

                        </div>
                        <div class="col-sm-6 form-input">
                            <div class="submit text-right">
                                <button type="button" onclick="selectDataFromTable();" class="btn btn-style">Search Report
                                </button>
                            </div>

                        </div>
                </form>
            </div>
        </div>
    </section>


    <!-- <p>{{@$patient->id}}</p> -->


    <?php

    // use App\Models\SelectClass;

    // $sc = new SelectClass();

    // $report = $sc->selectReportUsingPID($patient->id);

    // // echo $report;

    // foreach ($report as $item) {
    //     echo $item->blood_suger;
    // }


    ?>


    <!-- aboutblock1 section -->
    <section class="w3l-homeblock1" id="report" style="display: none;">
        <div class="container py-md-5">
            <div class="row align-items-center">
                <div class="col-lg-6 pe-xl-5">
                    <h3 class="title-style text-center mb-5">Blood Sugar</h3>
                    <canvas id="myChart"></canvas>

                </div>

                <div class="col-lg-6 pe-xl-5">
                    <h3 class="title-style text-center mb-5">Blood Pressure</h3>
                    <canvas id="myChartBloodPressure"></canvas>

                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 pe-xl-5">
                    <h3 class="title-style text-center mb-5">Urine Albumin</h3>
                    <canvas id="myChartUrineAlbumin"></canvas>

                </div>

                <div class="col-lg-6 pe-xl-5">
                    <h3 class="title-style text-center mb-5">Creatinine </h3>
                    <canvas id="myChartCreatinine"></canvas>

                </div>
            </div>
        </div>
    </section>
    <!-- //aboutblock1 section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    @include('frontend.layouts.footer')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        var axajUrl;

        function selectDataFromTable() {
            var PID = document.getElementById("pid").value;
            var mobile="";
            //  alert("haha");
            axajUrl = "selectPropertiesToFront?PID=" + PID + "&mobile=" + mobile + "";
            $.ajax({
                type: "GET",
                url: axajUrl,
                async: false,
                success: function(dataResult) {
                    response = dataResult;
                    console.log(dataResult);
                    var dataResult = JSON.parse(dataResult);
                    //alert(dataResult);
                    const blood_sugar = [];
                    const report_date = [];
                    const blood_pressure = [];
                    const urine_albumin = [];
                    const creatinine = [];
                    document.getElementById("report").style.display = "block";
                    for (var i = 0; i < dataResult.length; i++) {

                        //alert(dataResult[i].blood_sugar);
                        blood_sugar.push(dataResult[i].blood_sugar);
                        report_date.push(dataResult[i].report_date);
                        blood_pressure.push(dataResult[i].blood_pressure);
                        urine_albumin.push(dataResult[i].urine_albumin);
                        creatinine.push(dataResult[i].creatinine);
                    }


                    //var r = 1;
                    bloodSugerChart(report_date, blood_sugar);
                    bloodPressuerChart(report_date, blood_pressure);
                    urineAlbuminChart(report_date, urine_albumin);
                    creatinineChart(report_date, creatinine);

                }
            });
        }


        function creatinineChart(xValues, yValues) {
           
           var xValues = xValues;
           var yValues = yValues;
          // alert(yValues);

           new Chart("myChartCreatinine", {
               type: "line",
               data: {
                   labels: xValues,
                   datasets: [{
                       fill: false,
                       lineTension: 0,
                       backgroundColor: "rgba(0,0,255,1.0)",
                       borderColor: "rgba(0,0,255,0.1)",
                       data: yValues
                   }]
               },
               options: {
                   legend: {
                       display: false
                   },
                   scales: {
                       yAxes: [{
                           ticks: {
                               min: 0.2,
                               max: 10
                           }
                       }],
                   }
               }
           });
       }



        function urineAlbuminChart(xValues, yValues) {
           
           var xValues = xValues;
           var yValues = yValues;
          // alert(yValues);

           new Chart("myChartUrineAlbumin", {
               type: "line",
               data: {
                   labels: xValues,
                   datasets: [{
                       fill: false,
                       lineTension: 0,
                       backgroundColor: "rgba(0,0,255,1.0)",
                       borderColor: "rgba(0,0,255,0.1)",
                       data: yValues
                   }]
               },
               options: {
                   legend: {
                       display: false
                   },
                   scales: {
                       yAxes: [{
                           ticks: {
                               min: 0.2,
                               max: 10
                           }
                       }],
                   }
               }
           });
       }



        function bloodPressuerChart(xValues, yValues) {
           
            var xValues = xValues;
            var yValues = yValues;

            new Chart("myChartBloodPressure", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "rgba(0,0,255,1.0)",
                        borderColor: "rgba(0,0,255,0.1)",
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 60,
                                max: 180
                            }
                        }],
                    }
                }
            });
        }




        function bloodSugerChart(xValues, yValues) {
            
            var xValues = xValues;
            var yValues = yValues;

            new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "rgba(0,0,255,1.0)",
                        borderColor: "rgba(0,0,255,0.1)",
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 10,
                                max: 160
                            }
                        }],
                    }
                }
            });
        }
    </script>