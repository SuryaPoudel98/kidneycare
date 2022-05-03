@extends('dashboard.master')
@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ url('/all-report') }}" class="btn btn-primary float-end">View All Patient Reports </a>

        <a href="{{ url('/all-patient') }}" class="btn btn-primary float-right">Back To Patient Details  </a>


        @if(Session::has('success'))
        <p class="alert alert-success"> {{ Session::get('success') }} </p>
        @endif

        @if(Session::get('fail'))
        <div class="alert alert-denger" style="color:red;">
            {{ Session::get('fail') }}
        </div>

        @endif()
        <form class="form-horizontal" action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row ">
                    <div class="col-sm-2 text-right">
                        <label for="Branch name">Patient ID</label>
                        <input name="patient_id" value="{{$patient->id}}" type="text" hidden />
                    </div>
                    <div class="col-sm-10 form-group-lg ">
                        <input type="text" name="" placeholder="Client number" value="P{{ $patient->id}}-{{ $patient->phone_no}}" readonly>
                        <span class="text-danger">@error('patient_id') {{ $message }} @enderror</span>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row ">
                    <div class="col-sm-2 text-right">
                        <label for="Branch name">Name</label>

                    </div>
                    <div class="col-sm-10 form-group-lg ">
                        <input type="text" name="" placeholder="Patient Name" value="{{$patient->name}}" readonly>
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>

                    </div>
                </div>
            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="for blood_sugar"> Creatinine  </label>
                    </div>

                    <div class="col-sm-10">
                        <input type="number" name="creatinine" placeholder="" step=0.00001 value="{{ old('creatinine') }}" >
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
                        <input type="number" name="blood_sugar" placeholder="  " step=0.000001 value="{{ old('blood_sugar') }}">
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
                        <input type="number" name="blood_pressure" placeholder="60 To 180 " step=0.000001 value="{{ old('blood_pressure') }}">
                        <span class="text-danger">@error('blood_pressure') {{ $message }} @enderror</span>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="Email"> Urine Albumin </label>
                    </div>
                    <div class="col-sm-10">
                        <input type="number" name="urine_albumin" placeholder=" 0.22 To 1.9 mg/dl " step=0.000001 value="{{ old('urine_albumin') }}">
                        <span class="text-danger">@error('urine_albumin') {{ $message }} @enderror</span>

                    </div>
                </div>



            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="dob ">Report Document </label>
                    </div>
                    <div class="col-sm-10">
                        <input type="file" name="document">
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
                        <input type="file" name="optional_document">
                        <span class="text-danger">@error('optional_document') {{ $message }} @enderror</span>

                    </div>
                </div>

                   <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="dob ">Report Date</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" name="report_date">
                                <span class="text-danger">@error('report_date') {{ $message }} @enderror</span>

                            </div>
                        </div>



                    </div>



            </div>





            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
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