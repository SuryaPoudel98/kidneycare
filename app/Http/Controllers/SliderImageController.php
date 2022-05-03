<?php

namespace App\Http\Controllers;

use App\Models\SliderImage;
use Illuminate\Http\Request;

class SliderImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderimages=SliderImage::orderBy('created_at','desc')->get();
    
        return view('dashboard.sliderimage.all-sliderimage', compact('sliderimages'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliderimage.add-sliderimage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) 
        {
            $destinationPath = 'uploads/slider/';
            $sliderImage = date('time') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $sliderImage);
            $input['image'] = "$sliderImage";
        }
    
        SliderImage::create($input);
     
        return redirect()->route('Sliderimage.index')
                        ->with('success',' SliderImage is created successfully.');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $sliderimage=SliderImage::find($id);
        return view('dashboard.sliderimage.edit-sliderimage',compact('sliderimage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SliderImage  $sliderImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SliderImage $Sliderimage)
    {  
      
        $request->validate([
            'name'=> 'required',
        
        ]);
  
        $input = $request->only(['name', 'image']);
  
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/slider/';
            $slideImage = date('Time'). "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $slideImage);
            $input['image'] = $slideImage;
        }else{
            unset($input['image']);
        } 
        $Sliderimage->update($input);
    
        return redirect()->route('Sliderimage.index')
                        ->with('success','Sliderimage updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SliderImage $Sliderimage)
    {
        {
            $Sliderimage->delete();
         
            return redirect()->route('Sliderimage.index')
                            ->with('success','SliderImage deleted successfully');
        }
    }
}
