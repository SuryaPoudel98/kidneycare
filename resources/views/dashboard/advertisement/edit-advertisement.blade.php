@extends('dashboard.master')

@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ url('/all-advertisement')}}" class="btn btn-primary float-end"> View all Advertisements</a>

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
        <form class="form-horizontal" action="{{ route('advertisement.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
         
            <input type="hidden" name="id" value="{{ $advertisement->id }}" />


            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="for description">Advertisement Caption:</label>
                    </div>
                    <div class="col-sm-10">
                    <input type="text" class="col-xs-4" id="name" name="title" value="{{ $advertisement->title }}" placeholder="Enter page title">
             
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-2 text-right">
                        <label for="exampleInputFile">Upload Image:</label>
                    </div>
                    <div class="col-sm-10">
                    <img src="../../uploads/Advertisementimg/{{$advertisement->image}}" height="100px">
                    <input style="margin-top: 10px;" type="file" name="image" placeholder="image" onchange="previewFile(this)" onclick="alert('image file must be height:200px and width:1000px')">
             
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