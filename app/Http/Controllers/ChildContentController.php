<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ChildContent;
use App\Models\ChildPage;

class ChildContentController extends Controller
{
    //
    public function AddChildContent()
    {
        
        $childpages=ChildPage::all();   
        return view('dashboard.childcontent.add-childcontent',compact('childpages'));
    }

    public function ChildContentStore(Request $request)
    {              
            $parentcontent = new ChildContent();
            $parentcontent->childpage_id=$request->childpage_id;
            $parentcontent->text =$request->text;
          if($request->hasfile('thumbnailimg'))
           {
                $image=$request->file('thumbnailimg');
                $imageName=time().'.'.$image->extension();
                $image->move(public_path('/uploads/childcontentimg'), $imageName);
                    
                $parentcontent->thumbnailimg=$imageName;
        

      
            }
        $parentcontent->save();
        return redirect()->back()->with('childcontent_added','ChildContent   added successfully'); 

    }
    public function ChildContents()
    {
        $childcontents = ChildContent::with('childpage')->get();
        
        return view('dashboard.childcontent.all-childcontent',compact('childcontents') );
    }

    public function EditChildContent($id)
    { 
    
        $childcontent = ChildContent::FindorFail($id);
        
         $childpages= ChildPage::where([ ['child_title','!=','$childpage->childpage->child_title'],
         ])->get();


        return view('dashboard.childcontent.edit-childcontent', compact('childcontent','childpages'));

    }
    public function UpdateChildContent(Request $request)
    {      
      
   
      $childcontent=ChildContent::find($request->id); 
      $childcontent->childpage_id=$request->childpage_id;
      $childcontent->text =$request->text;
      if($request->hasfile('thumbnailimg'))
        {
            $destination ='uploads/childcontentimg/'. $childcontent->thumbnailimg;
            if(File::exists($destination))
            { 
                File::delete($destination);

            }
            $file = $request->file('thumbnailimg');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/childcontentimg/',$filename); 
            $childcontent->thumbnailimg=$filename;

        } 

     
    
        $childcontent->update();
      return back()->with('childcontent_updated','Child Content updated successfully is successfully updated');
    }
    public function DeleleChildContent($id)    
    {
        $childcontent = ChildContent::find($id);
        if (file_exists($childcontent ->thumbnailimg))
        {
            unlink(public_path('/uploads/childcontentimg').'/'.$childcontent ->thumbnailimg);
        }      
        $childcontent ->delete();       
       return back()->with('childcontent_deleted',' ChildContent is delete successfully');
    }

    public function upload(Request $request)
    {
        
        //getfilename with extension
        $filenamewithextension=$request->file('upload')->getClientOriginalName();
            
        //getfilename with out extension
        $filename=pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
        //get file_extension
        $extension =$request->file('upload')->getClientOriginalExtension();
        //file name to store
        $filenametostore =$filename.'_'.time().'.'.$extension;
        //file upload
        $request->file('upload')->storeAs('public/uploads',$filenametostore);
        //$request->file('upload')->storeAs('public/uploads/thumbnail',$filenametostore);

        //Resize the image here
        /*$thumbnailpath = public_path('storage/uploads/thumbnail'.$filenametostore);
        $image= Image::make($thumbnailpath)->resize(500,150, function($constraint)
        {
           $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
*/

        echo json_encode(['fileName'=> $filenametostore]);
        /*echo json_encode([
           'default'=>asset('storage/uploads/'.$filenametostore),
           '500'=>asset('storage/uploads/thumbnail'.$filenametostore),
        ]); 
        */
    }
}
