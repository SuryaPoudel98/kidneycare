<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\ChildContent;
use Illuminate\Http\Request;
use App\Models\SliderImage;
use App\Models\ParentPage;
use App\Models\ChildPage;
use App\Models\ParentContent;
use App\Models\Post;
use App\Models\Blog;



class FrontendController extends Controller
{

  
    
    public function sliderschange()
    {   
      
      //  $headingsubheading=ParentPage::with('childpages')->get();
      // $childpage = ChildPage::with('parentpage')->get();

    
      $sliders=SliderImage::orderBy('created_at','desc')->get();
      return view('frontend1.index',compact('sliders') );
    }

   public function selectPageDetailsFromTable($id)
   {
    
     
       $childContentDetails=ChildContent::select('id','childpage_id','text','Thumbnailimg',)
      ->with(['Childpage'=> function($q){
        $q->select(['id', 'child_title']);
      }])
      ->where('childpage_id',$id)
      ->get();
   
    

      return view('frontend.pages',compact('childContentDetails') );
     }

     public function selectHeadingDetailsFromTable($id)
     {
      
    
         $ParentContentDetails=ParentContent::select('id','parentpage_id','text','Thumbnailimg',)
         ->where('parentpage_id',$id)->get();
    

       // dd($ParentContentDetails);
     
      
  
        return view('frontend.mainpage',compact('ParentContentDetails'));
       }


      public function selectNewsDetailsFromTable($id)
      {

      $NewsContentDetails=Post::select('id','title','description','image',)
        ->where('id',$id)->get();
       return view('frontend.news-single',compact('NewsContentDetails'));


      }

      public function selectBranchDetailsFromTable($id)
      {
        $BranchDetails=Branch::select('id','branch_name','image','address','Phone_no','description',)
        ->where('id',$id)->get();
       return view('frontend.branchpage',compact('BranchDetails'));
      }

      // public function Branchlisting()
      // {
        
      // }

      public function selectBlogdetailFromTable($id)
      {
        $BlogDetails=Blog::select('id','title','description','image',)
        ->where('id',$id)->get();
       return view('frontend.blogpage',compact('BlogDetails'));
           
      }
    
    
}
