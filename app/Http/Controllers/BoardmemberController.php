<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boardmember;

use Illuminate\Support\Facades\File;




class BoardmemberController extends Controller
{
    //
    public function Addboardmember()
    {
        return view('dashboard.boardmember.add-team');
    }

    public function boardmemberStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',


        ]);
        $team = new Boardmember();
        $team->name = $request->name;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->gmail = $request->gmail;




        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('/uploads/teamimg'), $imageName);

            $team->image = $imageName;
        }
        $team->save();
        return redirect()->back()->with('team_added', 'Board member   added successfully');
    }



    public function boardmembers()
    {
        $teams = Boardmember::all();

        return view('dashboard.boardmember.all-team', compact('teams'));
    }
    public function Editboardmember($id)
    {
        $team = Boardmember::FindorFail($id);
        return view('dashboard.boardmember.edit-team', compact('team'));
    }
    public function Updateboardmember(Request $request)
    {
        $team = Boardmember::find($request->id);
        $team->name = $request->name;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->gmail = $request->gmail;

        if ($request->hasfile('image')) {
            $destination = 'uploads/teamimg/' . $team->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/teamimg/', $filename);
            $team->image = $filename;
        }



        $team->update();
        return back()->with('team_updated', 'Board member  updated successfully is successfully updated');
    }

    public function Deleleboardmember($id)
    {
        $team = Boardmember::find($id);
        $team->delete();
        return redirect()->back()->with('team_deleted', 'Board member    deleted  successfully');
    }
}
