@extends('dashboard.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 margin-tb">


            <div class="pull-left" style="margin-top: 10px;">
                <a class="btn btn-primary" href=" {{ url('/add-childcontent') }}"> Add New Child Page Content</a>
            </div>
        </div>
    </div>
    @if(Session::has('childcontent_deleted'))
    <p class="alert alert-success"> {{ Session::get('childcontent_deleted') }}</p>
    @endif
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Child Page </th>
                <!-- <th scope="col" style="width: max 200px;">Description</th> -->
                <!-- <th scope="col">Images</th> -->
                <th scope="col">Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach ( $childcontents as $childcontent )


            <tr>

                <th scope="row">{{ $childcontent->id}}</th>
                <td> {{ $childcontent->childpage->child_title ?? null}} </td>
                <!-- <td class="imagetext" style="width: 700px;">{!! $childcontent->text !!}</td> -->
                <!-- <td> <img src="uploads/childcontentimg/{{ $childcontent->Thumbnailimg }} " width="100px"> </td> -->
                <td>
                    <a href="/edit-childcontent/{{ $childcontent->id}}" class="btn btn-info">Edit </a>

                    <a href="/delete-childcontent/{{ $childcontent->id}}" class="btn btn-danger">Delete </a>
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