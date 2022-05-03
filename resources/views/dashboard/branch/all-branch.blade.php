@extends('dashboard.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 margin-tb">


            <div class="pull-left" style="margin-top: 10px;">
                <a class="btn btn-primary" href=" {{ url('/add-branch') }}"> Add New Branch</a>
            </div>
        </div>
    </div>
    @if(Session::has('branch_deleted'))
    <p class="alert alert-success"> {{ Session::get('branch_deleted') }}</p>
    @endif
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Branch Name </th>
                <th scope="col">Address</th>

                <!-- <th scope="col" style="width: max 200px;">Description</th> -->
                 <th scope="col">Images</th> 
                <th scope="col">Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach ( $branches as $branch )


            <tr>

                <th scope="row">{{ $branch->id}}</th>
                <td> {{ $branch->branch_name ?? null}} </td>
                <td> {{ $branch->address ?? null}} </td>

               
                 <td> <img src="uploads/Branchimg/{{ $branch->image }} " width="100px"> </td> 
                <td>
                    <a href="/edit-branch/{{ $branch->id}}" class="btn btn-info">Edit </a>

                    <a href="/delete-branch/{{ $branch->id}}" class="btn btn-danger">Delete </a>
                </td>



            </tr>

            @endforeach


        </tbody>
    </table>


    </table>


</div>
<style>
    .imagetext img {
        width: 150px;

    }
</style>



@endsection