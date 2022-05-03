@extends('dashboard.master')
@section('content')
<div>
    <div class="grid-form1">


                <a href="{{ url('/all-report') }}" class="btn btn-primary float-end">View  All Patient Reports </a>

                @if(Session::has('report_updated'))
                 <p class="alert alert-success"> {{ Session::get('report_updated') }} </p> 
                @endif

               
            <form class="form-horizontal" action="{{ route('report.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            <input type="hidden" name="id" value="{{ $report->id }}" />

                    <div class="form-group">
                        <div class="row ">
                            <div class="col-sm-2 text-right">
                                <label for="Branch name">client Number</label>

                            </div>
                            <div class="col-sm-10 form-group-lg ">
                                <input type="text" name="phone_no" placeholder="Client number" value="{{ $report->phone_no }}">
                            <span class="text-danger">@error('phone_no') {{ $message }} @enderror</span>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ">
                            <div class="col-sm-2 text-right">
                                <label for="Branch name">client Number</label>

                            </div>
                            <div class="col-sm-10 form-group-lg ">
                                <input type="number" name="patient_id" placeholder="id" value="{{ $report->patient_id }}">
                           <span class="text-danger">@error('number') {{ $message }} @enderror</span>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="for blood_sugar"> Creatinine  </label>
                            </div>

                            <div class="col-sm-10">
                                <input type="number" name="creatinine" placeholder="" value="{{ $report->creatinine }}">
                                <span class="text-danger">@error('creatinine') {{ $message }} @enderror</span>

                            </div>
                        </div>
                    </div>
                   

                    <div class="form-group">   

                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="for blood_sugar">Blood Sugar </label>
                            </div>

                            <div class="col-sm-10">
                                <input type="number" name="blood_sugar" placeholder="" value="{{ $report->blood_sugar }}">
                             <span class="text-danger">@error('blood_sugar') {{ $message }} @enderror</span>

                            </div>
                        </div>
                        </div>   
                     <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="Blodd pressure">Blood Pressure </label>
                            </div>

                            <div class="col-sm-10">
                                <input type="number" name="blood_pressure" placeholder=" " value="{{ $report->blood_pressure }}">
                               <span class="text-danger">@error('blood_pressure') {{ $message }} @enderror</span>

                            </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="Email "> Urine Albumin </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" name="urine_albumin" placeholder=" " value="{{ $report->urine_albumin }}" >
                                <span class="text-danger">@error('urine_albumin') {{ $message }} @enderror</span>

                            </div>
                        </div>



                     </div>

                     <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="dob ">Report Document  </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" name="document" value="uploads/report/{{ $report->document }}">
                                <span class="text-danger">@error('document') {{ $message }} @enderror</span>

                            </div>
                        </div>



                     </div>

                     <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="dob">Another Document</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" name="optional_document" value="uploads/report/{{ $report->optional_document }}">
                                <span class="text-danger">@error('optional_document') {{ $message }} @enderror</span>

                            </div>
                        </div>



                     </div>

                    

                     <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="dob ">Report Date</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" name="report_date" value="{{$report->report_date }}">
                                <span class="text-danger">@error('date_report') {{ $message }} @enderror</span>

                            </div>
                        </div>



                    </div>



                

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-default">Update</button>
                            </div>
                        </div>

                    </div>
            </form>

        </div>
    <div>
        <script src="{{ asset('ckeditor/ckeditor.js')}}"> </script>










        <script>
            function previewFile(input) {
                var file = $("input[type=file]").get(0).files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        $('#previewImg').attr("src", reader.result);

                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>

        @endsection