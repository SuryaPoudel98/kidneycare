@extends('dashboard.master')

@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ url('/all-patient') }}" class="btn btn-primary float-end"> View All Patients Details </a>

        @if(Session::has('patient_updated'))
        <p class="alert alert-success"> {{ Session::get('patient_updated') }}</p>
        @endif
        <form class="form-horizontal" action="{{ route('patient.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $patient->id }}" />


            <div class="form-group">
                        <div class="row ">
                            <div class="col-sm-2 text-right">
                                <label for="Branch name"> Name:</label>

                            </div>
                            <div class="col-sm-10 form-group-lg ">
                                <input type="text" name="name" placeholder="Enter Patient Full Name" value="{{ $patient->name }}" >
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
                                <input type="text" name="address" placeholder="Enter Full Address of Patients" value="{{ $patient->address }}">
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
                                <input type="text" name="phone_no" placeholder="Enter The Phone Number Of Patients" value="{{ $patient->phone_no }}" >
                               <span class="text-danger">@error('address') {{ $message }} @enderror</span>

                            </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="Email "> Email Address </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="email" placeholder="Enter patient email addess" value="{{ $patient->email }}">
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
                                <input type="date" name="dob" value="{{ $patient->dob }}">
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





        @endsection