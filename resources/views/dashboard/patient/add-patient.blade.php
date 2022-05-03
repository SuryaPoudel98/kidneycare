@extends('dashboard.master')
@section('content')
<div>
    <div class="grid-form1">


                <a href="{{ url('/all-patient') }}" class="btn btn-primary float-end">View  All Patients Details </a>

                @if(Session::has('patient_added'))
                 <p class="alert alert-success"> {{ Session::get('patient_added') }} </p> 
                @endif
            <form  action="{{ route('patient.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row ">
                            <div class="col-sm-2 text-right">
                                <label for="Branch name"> Name:</label>

                            </div>
                            <div class="col-sm-10  ">
                                <input type="text" name="name" placeholder="Enter Patient Full Name">
                           <span class="text-danger">@error('email') {{ $message }} @enderror</span>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">   

                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="for Address">Address </label>
                            </div>

                            <div class="col-sm-10">
                                <input type="text" name="address" placeholder="Enter Full Address of Patients">
                             <span class="text-danger">@error('address') {{ $message }} @enderror</span>

                            </div>
                        </div>
                        </div>   
                     <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="phone number">Phone Number </label>
                            </div>

                            <div class="col-sm-10">
                                <input type="text" name="phone_no" placeholder="Enter The Phone Number Of Patients">
                               <span class="text-danger">@error('phone_no') {{ $message }} @enderror</span>

                            </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="Email "> Email Address </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="email" placeholder="Enter patient email addess">
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>

                            </div>
                        </div>



                     </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="dob ">Date of Birth  </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" name="dob">
                                <span class="text-danger">@error('dob') {{ $message }} @enderror</span>

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