@extends('dashboard.master')


@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ url('/all-boardmember') }}" class="btn btn-primary float-end"> All Board Members </a>

        @if(Session::has('team_updated'))
        <p class="alert alert-success"> {{ Session::get('team_updated') }} </p>
        @endif
        <form class="form-horizontal" action="{{ route('boardmember.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $team->id }}" />
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="Branch name"> Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="name" placeholder="Enter Branch Name" value="{{ $team->name }}">
                    </div>
                </div>
            </div>


            <div class="form-group">


                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="image">Choose Photo: </label>
                    </div>

                    <div class="col-sm-10">
                        @if($team->image)
                        <img src="../uploads/teamimg/{{$team->image }}" height="100">
                      
                       
                        @endif
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
                        <input type="text" name="facebook" placeholder="Enter Facebook Link" value="{{ $team->facebook }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="Twitter"> Twitter Link: </label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="twitter" placeholder="Enter Twitter link" value="{{ $team->twitter }}">
                    </div>
                </div>



            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="Gmail "> Gmail Link: </label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="gmail" placeholder="Enter Gmail Link" value="{{ $team->gmail }}">
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


    @endsection