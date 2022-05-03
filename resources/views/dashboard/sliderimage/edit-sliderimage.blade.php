@extends('dashboard.master')

@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ route('Sliderimage.index')}}" class="btn btn-primary float-end"> view all Parentpage</a>

        @if(Session::has('success'))
        <p class="alert alert-success"> {{ Session::get('success') }}</p>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="form-horizontal" action="{{ route('Sliderimage.update',$sliderimage->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $sliderimage->id }}" />


            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="for description">Image Caption:</label>
                    </div>
                    <div class="col-sm-10">
                    <input type="text" class="col-xs-4" id="name" name="name" value="{{ $sliderimage->name }}" placeholder="Enter page title">
             
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-2 text-right">
                        <label for="exampleInputFile">Upload Image:</label>
                    </div>
                    <div class="col-sm-10">
                    <img src="../../uploads/slider/{{$sliderimage->image}}" height="100px">
                    <input style="margin-top: 10px;" type="file" name="image" placeholder="image" onchange="previewFile(this)">
             

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
        <script>
            function hideImg() {
                document.getElementById("previewImg")
                    .style.display = "none";
            }
        </script>