@extends('dashboard.master')


@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ url('/all-team') }}" class="btn btn-primary float-end"> All Team Members </a>

        @if(Session::has('team_added'))
        <p class="alert alert-success"> {{ Session::get('team_added') }} </p>
        @endif
        <form class="form-horizontal" action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="Branch name"> Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="name" placeholder="Enter Branch Name">
                    </div>
                </div>
            </div>


            <div class="form-group">


                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="image">Choose Photo: </label>
                    </div>
                    <div class="col-sm-10">
                        <input type="file" name="image" placeholder="image" onchange="previewFile(this)">
                        <img id="previewImg" src="" alt="image" onerror='this.style.display = "none"'>

                    </div>
                </div>

            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="for Address"> Facebook Link: </label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="facebook" placeholder="Enter Facebook Link">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="Twitter"> Twitter Link: </label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="twitter" placeholder="Enter Twitter link">
                    </div>
                </div>



            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="Gmail "> Gmail Link: </label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="gmail" placeholder="Enter Gmail Link">
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