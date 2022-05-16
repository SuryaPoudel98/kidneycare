@extends('dashboard.master')

@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ url('/all-parentpage')}}" class="btn btn-primary float-end"> View All Parent Page</a>

        @if(Session::has('parentpage_updated'))
        <p class="alert alert-success"> {{ Session::get('parentpage_updated') }}</p>
        @endif
        <form class="form-horizontal" action="{{ route('parentpage.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $parentpage->id }}" />
            <div class="form-group">
                <div class="row">
                <div class="col-sm-2 text-right">
                        <label for="title">Page Title:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="col-xs-4 " id="title" name="title" value="{{ $parentpage->title }}" placeholder="Enter page title">
                    </div>
                </div>


            </div>
            <div class="form-group">

                <div class="row">
                    <div class="col-sm-2 text-right">
                        <label for="child"> Child Page</label>
                    </div>
                    <div class="col-sm-10 text-left">
                        <select name="ischild"  value="{{ $parentpage->ischild }}">
                            <option value="1">Has Child Page</option>
                            <option value="0">No Child</option>

                        </select>
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