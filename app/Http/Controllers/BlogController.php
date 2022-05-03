<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
        public function Addpost()
        {
            return view('dashboard.blog.add-blog');
        }
    
        public function BlogStore(Request $request)
        {                
        
            $request->validate([
                'text' => 'required',
                'title'=>'required',
                           
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
    
            ]);
                $post = new Blog();
                $post->title =$request->title;
                $post->description =$request->text;
               
              if($request->hasfile('image'))
               {
                    $image=$request->file('image');
                    $imageName=time().'.'.$image->extension();
                    $image->move(public_path('/uploads/Postimg'), $imageName);
                        
                    $post->image=$imageName;
            
    
          
                }
                $post->save();
            return redirect()->back()->with('post_added','Post   added successfully'); 
    
        }
    
        public function blogs()
        {
            $posts = Blog::all();
            
            return view('dashboard.blog.all-blog',compact('posts'));
        }
    
        public function EditBlog($id)
        { 
        
            $post = Blog::FindorFail($id);
            return view('dashboard.blog.edit-blog', compact('post'));
    
        }
    
    
    
    
        public function UpdateBlog(Request $request)
        {      
          
        
       
          $post=Blog::find($request->id); 
          $post->title =$request->title;
         
    
    
          $post->description =$request->text;
          if($request->hasfile('image'))
            {
                $destination ='uploads/Postimg/'. $post->image;
                if(File::exists($destination))
                { 
                    File::delete($destination);
    
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/Postimg/',$filename); 
                $post->image=$filename;
    
            } 
    
         
        
            $post->update();
          return back()->with('post_updated','Blog post updated successfully is successfully updated');
    
        }
    
        public function DeleteBlog($id)
         {
            $post = Blog::find($id);
            $post->delete();
            return redirect()->back()->with('post_deleted','Blog Post   deleted  successfully'); 
    
             
    
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
