@extends('dashboard.master')

@section('content')
<div>
    <div class="grid-form1">


        <a href="{{ url('/all-childpage') }}" class="btn btn-primary float-end"> View all Child Page </a>

        @if(Session::has('childpage_added'))
        <p class="alert alert-success"> {{ Session::get('childpage_added') }}</p>
        @endif
        <form class="form-horizontal" action="{{ route('childpage.store') }}" method="POST">
            @csrf
            <div class="form-group">


            <div class="row">
                <div class="col-sm-2 text-right">
                <label for="ParentPage">Parent Page:</label>
                </div>
                <div class="col-sm-10">
                <select name="parentpage_id" id="parentpage_id" class="form-select form-select-sm" >
                    @foreach ($parentpages as $parentpage )
                    <option value="{{ $parentpage->id }}">{{ $parentpage->title }} </option>
                    @endforeach

                </select>
                </div>
            </div>
               

            <div class="row ">
                <div class="col-sm-2 text-right">
                <label for="inputEmail3" >Child Page Title:</label>
                </div>
                <div class="col-sm-10">
                <input type="text" class="col-xs-4" id="title" name="title" placeholder="Enter Child Page Title" required>
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