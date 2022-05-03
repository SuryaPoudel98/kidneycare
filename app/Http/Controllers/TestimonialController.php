<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::orderBy('created_at','desc')->get();
    
        return view('dashboard.testimonial.all-testimonial', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.testimonial.add-testimonial');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //kdfjd
        $request->validate([
            'name' => 'required',
            'description'=>'required',
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
     
        if ($image = $request->file('image')) 
        {
            $destinationPath = 'uploads/testimonial/';
            $testimonial = date('time') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $testimonial);
            $input['image'] = "$testimonial";
        }
    
        Testimonial::create($input);
        return redirect()->route('Testimonial.index')
        ->with('success',' Testimonial is created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $Testimonial)
    {
        //
        {
            $Testimonial->delete();
         
            return redirect()->route('Testimonial.index')
                            ->with('success','Testimonial deleted successfully');
        }
    }
}
