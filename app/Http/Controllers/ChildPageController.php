<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildPage;
use App\Models\ParentPage;


class ChildPageController extends Controller
{
    
                public function  addChildPage()
                {
                
                 $parentpages=ParentPage::where('ischild', 1)->get();   
                 return view('dashboard.childpage.add-childpage',compact('parentpages'));
                  
                } 
                
                 public function  ChildPageStore(Request $request)
                 {       
                                    
                    $childpage = new ChildPage();
                    $childpage->child_title =$request->title;
                    $childpage->parentpage_id=$request->parentpage_id;
                    $childpage->save();
                     return redirect()->back()->with('childpage_added','Child Page  added successfully');                
                 }
                 public function Childpages()
                  {
                     $childpages=ChildPage::with('parentpage')->get();
                    
                     return view('dashboard.childpage.all-childpage',compact('childpages'));
                  }
                   public function editchildpage($id)
                   { 
                     $childpage = ChildPage::with('parentpage')->FindorFail($id);
           
                     $parentpages= ParentPage::where([ ['ischild',1],['title','!=','$childpage->parentpage->title'],
                     ])->get();

                     
                    
                     return view('dashboard.childpage.edit-childpage', compact('childpage','parentpages'));
                   }
                 public function updatechildpage(Request $request)
                   {      
                   
                     $childpage=ChildPage::find($request->id);               
                     $childpage->child_title =$request->title;
                      $childpage->parentpage_id=$request->parentpage_id;
                   
                      $childpage->update();
                     return back()->with('childpage_updated','Childpage is successfully updated');
                   }
                 public function deletechildpage($id)
                {
                    $childpage = ChildPage::find($id);
                    
                    $childpage->delete();
                    return back()->with('childpage_deleted','childpage is delete successfully');

                }
                
            

     

}
