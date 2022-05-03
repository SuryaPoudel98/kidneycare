<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    //

    public function Addbranch()
    {   
        
        return view('dashboard.branch.add-branch');
    }
    public function BranchStore(Request $request)
    {              
        $request->validate([
            'branch_name' => 'required',
            'address'=>'required',
            'phone_no'=>'required',           
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'text'=>'required',

        ]);
            $branch = new Branch();
            $branch->branch_name =$request->branch_name;
            $branch->address =$request->address;
            $branch->phone_no =$request->phone_no;

            
            $branch->description =$request->text;
          if($request->hasfile('image'))
           {
                $image=$request->file('image');
                $imageName=time().'.'.$image->extension();
                $image->move(public_path('/uploads/Branchimg'), $imageName);
                    
                $branch->image=$imageName;
        

      
            }
            $branch->save();
        return redirect()->back()->with('branch_added','Branch   added successfully'); 

    }
    public function branches()
    {
        $branches = Branch::all();
        
        return view('dashboard.branch.all-branch',compact('branches'));
    }
    public function EditBranch($id)
    { 
    
        $branch = Branch::FindorFail($id);
        return view('dashboard.branch.edit-branch', compact('branch'));

    }

    public function UpdateBranch(Request $request)
    {      
      
   
      $branch=Branch::find($request->id); 
      $branch->branch_name =$request->branch_name;
      $branch->address =$request->address;
      $branch->phone_no =$request->phone_no;


      $branch->description =$request->text;
      if($request->hasfile('image'))
        {
            $destination ='uploads/Branchimg/'. $branch->image;
            if(File::exists($destination))
            { 
                File::delete($destination);

            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/Branchimg/',$filename); 
            $branch->image=$filename;

        } 

     
    
        $branch->update();
      return back()->with('childcontent_updated','Child Content updated successfully is successfully updated');

    }
    public function Delelebranch($id)
     {
        $branch =Branch::find($id);
        $branch->delete();
        return redirect()->back()->with('branch_deleted','Branch    deleted  successfully'); 

         

     }



    //ckupload
    public function upload(Request $request)
      {

         //echo json_encode(['result'=>$request->all()]);

         

         //dd($request->all());
         if($request->hasFile('uploadbranch'))
         {  

            //getfilename with extension
            $filenamewithextension=$request->file('uploadbranch')->getClientOriginalName();
            
            //getfilename with out extension
            $filename=pathinfo($filenamewithextension, PATHINFO_FILENAME);
            
            //get file_extension
            $extension =$request->file('uploadbranch')->getClientOriginalExtension();
            //file name to store
            $filenametostore =$filename.'_'.time().'.'.$extension;
            //file upload
            $request->file('uploadbranch')->storeAs('public/uploadck',$filenametostore);
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
