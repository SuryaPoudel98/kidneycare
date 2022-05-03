@extends('dashboard.master')

@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ url('/Sliderimage') }}" class="btn btn-primary float-end"> view all Testimonial </a>

        @if(Session::has('testimonial_added'))
        <p class="alert alert-success"> {{ Session::get('testimonial_added') }}</p>
        @endif
        <form class="form-horizontal" action="{{ route('Testimonial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">


                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="title">Full Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="col-xs-4" id="name" name="name" placeholder="Enter Full Name">
                        <span style="text-color:red; margin-top:10px;">@error('name')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                </div>



            </div>
            <div class="form-group">

                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="title">Note:</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea name="description"  rows="6" cols="50"></textarea>
                        <span style="text-color:red;  margin-top:10px;">@error('description')>
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                </div>


            </div>
            <div class="form-group ">

                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="title">Photo:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="file" name="image" placeholder="image" onclick="alert('image size should be width=260px and height=342px');">

                        @error('image')
                        <div class="error" style="margin-top: 10px;">{{ $message }}</div>
                        @enderror
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







        @endsection