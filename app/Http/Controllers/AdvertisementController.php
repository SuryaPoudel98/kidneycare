<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\File;


class AdvertisementController extends Controller
{
    //
    public function Addadvertisement()
    {
        return view('dashboard.advertisement.add-advertisement');
    }
    public function advertisementStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image'=>'required',
           

        ]);
            $advertisement = new Advertisement();
            $advertisement ->title =$request->title;  
          if($request->hasfile('image'))
           {
                $image=$request->file('image');
                $imageName=time().'.'.$image->extension();
                $image->move(public_path('/uploads/Advertisementimg'), $imageName);
                    
                $advertisement ->image=$imageName;
        

      
            }
            $advertisement->save();
           return redirect()->back()->with('advertisement_added','Advertisement    added successfully'); 
    }

    public function advertisements()
    { 
        $advertisements=Advertisement::all();
        return view('dashboard.advertisement.all-advertisement',compact('advertisements'));
    }

    public function Editadvertisement($id)
    {
        $advertisement=Advertisement::find($id);
        return view('dashboard.advertisement.edit-advertisement',compact('advertisement'));
    }

    public function Updateadvertisement(Request $request)
    {
        
      
        $advertisement=Advertisement::find($request->id); 
        $advertisement->title =$request->title;
       
  
  
       
        if($request->hasfile('image'))
          {
              $destination ='uploads/advertisementimg/'. $advertisement->image;
              if(File::exists($destination))
              { 
                  File::delete($destination);
  
              }
              $file = $request->file('image');
              $extension = $file->getClientOriginalExtension();
              $filename = time().'.'.$extension;
              $file->move('uploads/advertisementimg/',$filename); 
              $advertisement->image=$filename;
  
          } 
  
       
      
          $advertisement->update();
        return back()->with('success','Advertisement updated successfully is successfully updated');
    }
   
    public function Deleteadvertisement($id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->delete();
        return redirect()->back()->with('Advertisement_deleted','Advertisement   deleted  successfully');
    }

}