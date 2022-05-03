@extends('dashboard.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 margin-tb">


            <div class="pull-left" style="margin-top: 10px;">
                <a class="btn btn-primary" href=" {{ url('/add-blog') }}"> Add New Blog</a>
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
                <th scope="col">Post Title </th>
                <th scope="col">Description</th>

                <!-- <th scope="col" style="width: max 200px;">Description</th> -->
                 <th scope="col">Images</th> 
                <th scope="col">Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach (  $posts as $post )


            <tr>

                <th scope="row">{{ $post->id}}</th>
                <td> {{ $post->title ?? null}} </td>
                <td> {{ $post->description ?? null}} </td>

               
                 <td> <img src="uploads/Postimg/{{ $post->image }} " width="100px"> </td> 
                <td>
                    <a href="/edit-post/{{ $post->id}}" class="btn btn-info">Edit </a>

                    <a href="/delete-post/{{ $post->id}}" class="btn btn-danger">Delete </a>
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