<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentPage;

class ParentPageController extends Controller
{
    //

    public function  addParentPage()
    {
       return view('dashboard.parentpage.add-parentpage');
    }
    public function  ParentPageStore(Request $request)
    {   
        $request->validate(['title' => 'required']);
        $parentpage = new ParentPage();
        $parentpage->title =$request->title;
        $parentpage->ischild =$request->ischild;
        $parentpage->save();
        return redirect()->back()->with('parentpage_added','Parent Page   added successfully');      
    }
    public function Parentpages()
    {   
        $parentpages=ParentPage::all();

        
        return view('dashboard.parentpage.all-parentpage',compact('parentpages'));
    }
    public function editparentpage($id)
    { 
        $parentpage = ParentPage::FindorFail($id);
        
        return view('dashboard.parentpage.edit-parentpage', compact('parentpage'));
    }
    public function updateParentpage(Request $request)
    {      
        $parentpage=ParentPage::find($request->id);
       
        $parentpage->title = $request->title;
        $parentpage->ischild = $request->ischild;
        $parentpage->update();
        return back()->with('parentpage_updated','Parentpage is successfully updated');
    }
    public function deleteParentpage($id)
    {
        $parentpage = ParentPage::find($id);
        
        $parentpage->delete();
         return back()->with('parentpage_deleted','page is delete successfully');

    }
  

    
}
