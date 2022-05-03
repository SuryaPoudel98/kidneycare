@extends('dashboard.master')

@section('content')
   <div class="container">
                <div class="row">
                                <div class="col-lg-9 margin-tb">
                                    
                                    <div class="">
                                        <a class="btn btn-primary" href=" {{ route('Testimonial.create') }}"> Add New Testimonial</a>
                                    </div>
                                </div>
                </div>
                @if(Session::has('success'))
                            <p class="alert alert-success"> {{ Session::get('success') }}</p>
                @endif
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>


                            <th scope="col">Images</th>
                          
                            <th scope="col">Action</th>  



                           </tr>
                        </thead>
                        <tbody>
                           
                     @foreach ($testimonials as $testimonial)
                         
                   
                           
                            <tr>
                                <th scope="row">{{ $testimonial->id  }}</th>
                                <td>  {{ $testimonial->name  }} </td>
                                <td>{{ $testimonial->description }} </td>
                               
                                <td> <img src="uploads/testimonial/{{$testimonial->image }}" width="100px"> </td>
                                <td style="display: inline-flex;" >                                   
                                 
                                 <form action="{{ route('Testimonial.destroy',$testimonial->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                 </form>
                                 </td>


                           
                            </tr>
                        @endforeach   

                            

                           
                            
                          
                        </tbody>
                        </table>

               
                </table>


   </div>



@endsection