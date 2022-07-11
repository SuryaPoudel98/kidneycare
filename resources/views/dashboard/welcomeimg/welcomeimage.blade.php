@extends('dashboard.master')

@section('content')
    {{-- <div id="page-wrapper">
        <div class="main-page">
            <div class="grid-form1">
                <div class=" form-grids row form-grids-right">
                    <div class="widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Welcome image </h4>
                        </div>
                       
                        <div class="form-body">
                          
                                @csrf
                                <input type="hidden" name="id" value="{{ @$image->id }}">
                              

                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label for="for ItemName" class="col-sm-4 control-label">
                                         Image
                                        </label>
                                    </div>
                                    <div> 

                                        <h1></h1>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="DATE" class="form-control" name="facialyeardate"
                                            placeholder="company's name" value="{{@$image->image; }}">
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}

    {{-- //this is another --}}
    <div>
        <div class="grid-form1">

            <h4 class="text">Welcome Image </h4>

            @if (Session::has('imageadd'))
                <p class="alert alert-success"> {{ Session::get('imageadd') }}</p>
            @endif
            <form class="form-horizontal" action="{{ url('addwelcomeimage') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ @$image->id }}">


                <div class="form-group">

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-2 text-right">
                            <label for="exampleInputFile">Upload Image:</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="file" name="image" placeholder="image" onchange="previewFile(this)">

                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-2 text-right">
                            <label for="exampleInputFile">Image:</label>
                        </div>
                        <div class="col-sm-10">
                           
                            @if(@$image ?? '')
                            <img src="../uploads/Welcomeimg/{{ @$image->image }}" height="100">
    
                            @endif
                        </div>
                    </div>

                </div>



                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2 text-right"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-default">
                                @if (@$image->id)
                                    Update
                                @else
                                    Save
                                @endif
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div>
        @endsection
