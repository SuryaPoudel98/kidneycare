<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentPage;
use App\Models\ParentContent;
use Illuminate\Support\Facades\File;
use image;




class ParentContentController extends Controller
{
    //

    public function AddParentContent()
    {
        
        $parentpages=ParentPage::where('ischild', 0)->get();   
        return view('dashboard.parentcontent.add-parentcontent',compact('parentpages'));
    }

    public function ParentContentStore(Request $request)
    {  
        $parentcontent = new ParentContent();
        $parentcontent->parentpage_id=$request->parentpage_id;
        $parentcontent->text =$request->text;
        if($request->hasFile('thumbnailimg'))
        {

       
        $image=$request->file('thumbnailimg');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('/uploads/thumbnailimg'), $imageName);      
        $parentcontent->thumbnailimg=$imageName;
        }

        $parentcontent->save();
        return redirect()->back()->with('parentcontent_added','ParentContenr   added successfully'); 

    }
    public function ParentContents()
    {
        $parentcontents = Parentcontent::all();
        return view('dashboard.parentcontent.all-parentcontent',compact('parentcontents') );
    }

    public function EditParentContent($id)
    {
        $parentcontent = ParentContent::FindorFail($id);
        $parentpages= ParentPage::where('ischild', 0)->get();

        return view('dashboard.parentcontent.edit-parentcontent', compact('parentcontent','parentpages'));

    }
    public function UpdateParentContent(Request $request)
    {      
      
     
      $parentcontent=ParentContent::find($request->id); 
      $parentcontent->parentpage_id=$request->parentpage_id;
      $parentcontent->text =$request->text;
      if($request->hasfile('thumbnailimg'))
        {
            $destination ='uploads/thumbnailimg/'.$parentcontent->thumbnailimg;
            if(File::exists($destination))
            { 
                File::delete($destination);

            }
            $file = $request->file('thumbnailimg');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/thumbnailimg/',$filename); 
            $parentcontent->thumbnailimg=$filename;

        } 

     
    
      $parentcontent->update();
      return back()->with('parentcontent_updated','parentpage updated successfully is successfully updated');
    }
    public function DeleleParentContent($id)
    {
        $parentcontent = ParentContent::find($id);
        if (file_exists($parentcontent ->thumbnailimg))
        {
            unlink(public_path('/uploads/thumbnailimg').'/'.$parentcontent ->thumbnailimg);
        }      
        $parentcontent ->delete();       
       return back()->with('parentcontent_deleted','  ParentContent is delete successfully');
    }
    public function upload(Request $request)
      {

         //echo json_encode(['result'=>$request->all()]);

         

         //dd($request->all());
         if($request->hasFile('upload'))
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
            $request->file('upload')->storeAs('public/uploadck',$filenametostore);
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

        
}
