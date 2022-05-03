@extends('dashboard.master')

@section('content')
   <div class="container">
                <div class="row">
                                <div class="col-lg-9 margin-tb">
                                   
                                    <div class="pull-left" style="margin-top: 10px;">
                                        <a class="btn btn-primary" href="{{ url('/add-parentpage') }}"> Add New ParentPage</a>
                                    </div>
                                </div>
                </div>
                @if(Session::has('parentpage_deleted'))
                            <p class="alert alert-success"> {{ Session::get('parentpage_deleted') }}</p>
                @endif
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Page Status</th>
                            <th scope="col">Action</th>                           

                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($parentpages as $parentpage )
                                
                           
                            <tr>
                                <th scope="row">{{$parentpage->id}}</th>
                                <td>{{ $parentpage->title}}</td>
                                <td>{{ $parentpage->ischild}}</td>
                                <td >
                                  <a href="/edit-parentpage/{{$parentpage->id}}" class="btn btn-info">Edit </a> 
                        
                                  <a href="/delete-parentpage/{{$parentpage->id}}" class="btn btn-danger" >Delete </a>
                                 </td>


                           
                            </tr>

                            @endforeach
                            
                          
                        </tbody>
                        </table>

               
                </table>


   </div>



@endsection