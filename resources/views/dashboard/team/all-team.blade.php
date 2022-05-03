@extends('dashboard.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 margin-tb">


            <div class="pull-left" style="margin-top: 10px;">
                <a class="btn btn-primary" href=" {{ url('/add-team') }}"> Add New Team Member</a>
            </div>
        </div>
    </div>
    @if(Session::has('team_deleted'))
    <p class="alert alert-success"> {{ Session::get('team_deleted') }}</p>
    @endif
<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Member Name </th>
                <th scope="col">Facebook </th>

                <!-- <th scope="col" style="width: max 200px;">Description</th> -->
                
                 <th scope="col">Twitter</th> 
                 <th scope="col">Image</th> 

                <th scope="col">Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach ( $teams as $team )


            <tr>

                <th scope="row">{{ $team->id}}</th>
                <td> {{ $team->name ?? null}} </td>
                <td> {{ $team->facebook ?? null}} </td>
               
                <td> {{ $team->twitter ?? null}} </td>


               
                 <td> <img src="uploads/teamimg/{{$team->image }} " width="100px"> </td> 
                <td>
                  

                    <a href="/delete-team/{{$team->id}}" class="btn btn-danger">Delete </a>
                </td>



            </tr>

            @endforeach


        </tbody>
    </table>

 </div>


    </table>


</div>
<style>
    .imagetext img {
        width: 150px;

    }
</style>



@endsection