@extends('dashboard.master')

@section('content')
   <div class="container">
                <div class="row">
                                <div class="col-lg-9 margin-tb">
                                         
                                   
                                    <div class="pull-left" style="margin-top: 10px;">
                                        <a class="btn btn-primary" href=" {{ route('Sliderimage.create') }}"> Add Slide Image</a>
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
                            <th scope="col">Image Capation</th>
                            <th scope="col">Images</th>
                          
                            <th scope="col">Action</th>  



                           </tr>
                        </thead>
                        <tbody>
                           
                        @foreach (  $sliderimages as $item)   
                           
                            <tr>
                                <th scope="row">{{ $item->id }} </th>
                                <td>  {{ $item-> name }} </td>
                               
                                <td> <img src="uploads/slider/{{$item->image}}" width="100px"> </td>
                                <td style="display: inline-flex;" >                                   
                                 <a class="btn btn-primary" href="{{ route('Sliderimage.edit',$item->id) }}">Edit</a>
                                 <form action="{{ route('Sliderimage.destroy',$item->id) }}" method="POST">
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