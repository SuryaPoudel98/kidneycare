@extends('dashboard.master')

@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ url('/all-parentpage')}}" class="btn btn-primary float-end"> View All Parentpage</a>

        @if(Session::has('parentpage_added'))
        <p class="alert alert-success"> {{ Session::get('parentpage_added') }}</p>
        @endif
        <form class="form-horizontal" action="{{ route('addparentpage.store') }}" method="POST">
            @csrf
            <div class="form-group">


                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="title">Page Title:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="col-xs-4 " id="title" name="title" placeholder="Enter Page Title" required>
                        @error('title')
                        <div class=" col-xs-4  alert alert-danger mt-1 mb-1 p-2" style="height:10px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


            </div>
            <div class="form-group">


                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="page">Child Page:</label>

                    </div>
                    <div class="col-sm-10">
                        <select name="ischild" class="form-select form-select-sm">
                            <option value="0">No child</option>
                            <option value="1">Has childPage</option>

                        </select>
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