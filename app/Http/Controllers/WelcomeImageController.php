<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WelcomeImage;
use Illuminate\Support\Facades\File;


class WelcomeImageController extends Controller
{


    //
    public function welcomeimage(Request $request)
    {
  
      $image = WelcomeImage::find(1);
      if($image) {
           return view('dashboard.welcomeimg.welcomeimage',compact('image'));
             }
         else{
           return view('dashboard.welcomeimg.welcomeimage'); 
       }
    }
  
    public function addwelcomeimage(Request $request)
    {
      if($request->id)
      {
        $request->validate([
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',        
        ]);
        $welcomeimage=WelcomeImage::find($request->id);                 
        if ($request->hasfile('image')) {
            $destination = 'uploads/Welcomeimg/' . $welcomeimage->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/Welcomeimg/', $filename);
            $welcomeimage->image = $filename;
        }
        $welcomeimage->update();
        return redirect()->back()->with('imageadd','image upadated  successfully'); 
      }
  
      else
      {
        $request->validate([
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $welcomeimage = new WelcomeImage();
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('/uploads/Welcomeimg'), $imageName);

            $welcomeimage->image = $imageName;
        }
        $welcomeimage->save();
        $image=WelcomeImage::FindorFail(1);     
        return redirect()->back()->with('imageadd', 'Image  added successfully',compact('image'));
      
  
      }
        
      
      
  
    
    }
}
