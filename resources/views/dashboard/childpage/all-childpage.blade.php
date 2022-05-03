@extends('dashboard.master')

@section('content')
   <div class="container">
                <div class="row">
                                <div class="col-lg-9 margin-tb">                                                                                                              
                                    <div class="pull-left" style="margin-top: 10px;" >
                                        <a class="btn btn-primary" href=" {{ url('/add-childpage') }}"> Add New Child Page</a>
                                    </div>
                                </div>
                </div>
                @if(Session::has('childpage_deleted'))
                            <p class="alert alert-success"> {{ Session::get('childpage_deleted') }}</p>
                @endif
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Parent Page</th>
                            <th scope="col">Child Page</th>
                            <th scope="col">Action</th>                           

                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($childpages as $childpage )
                                
                           
                            <tr>
                                <th scope="row">{{  $childpage->id}}</th>
                                <td>{{ $childpage->parentpage->title}}</td>
                                <td>{{ $childpage->child_title}}</td>
                                <td >
                                  <a href="/edit-childpage/{{$childpage->id}}" class="btn btn-info">Edit </a> 
                        
                                  <a href="/delete-childpage/{{$childpage->id}}" class="btn btn-danger" >Delete </a>
                                 </td>


                           
                            </tr>

                            @endforeach
                            
                          
                        </tbody>
                        </table>

               
                </table>


   </div>



@endsection