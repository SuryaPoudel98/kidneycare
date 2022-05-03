@extends('dashboard.master')

@section('content')
<div>
         <div class="grid-form1">
        
            
               <a href="{{ url('/all-childpage')}}" class="btn btn-primary float-end"> View All Childpage</a>
            
                @if(Session::has('childpage_updated'))
                            <p class="alert alert-success"  > {{ Session::get('childpage_updated') }}</p>
                @endif
            <form class="form-horizontal" action="{{ route('childpage.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $childpage->id }}"/>
                   <div class="form-group" Style="display:inline-flex; margin-left:35px;" >
                        <label for="child">Parent Page</label>
                        <select name="parentpage_id" id="parentpage_id" class="form-select form-select-sm"   value="{{ $childpage->parentpage_id }}"  Style="margin-left:40px">
                     <option value="{{ $childpage->parentpage->id }}" selected >{{ $childpage->parentpage->title }} </option> -->

                    @foreach ($parentpages as $parentpage )
                        @if($childpage->parentpage->title!=$parentpage->title)
                        {

                                

                         <option   value="{{ $parentpage->id }}" hide > {{ $parentpage->title }}  </option>

                        }
                         
                        @endif                                                                                          
                     @endforeach
                            
                       </select>   
                    </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Child Page Title</label>
                            <div class="col-sm-10">
                            <input type="text" class="col-xs-4" id="title" name="title" value="{{ $childpage->child_title }}"  placeholder="Enter page title" required>

                        </div>
                    </div>
                    
                  
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Update</button>
                        </div>
                    </div>
             </form>
        </div>
 <div>
 <javascript> 
 </javascript>

 @endsection
