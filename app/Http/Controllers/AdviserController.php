<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adviser;
use Illuminate\Support\Facades\File;

class AdviserController extends Controller
{
    //

    public function Addadviser()
    {
        return view('dashboard.adviser.add-team');
    }

    public function adviserStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',


        ]);
        $team = new Adviser();
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
        return redirect()->back()->with('team_added', 'Adviser   added successfully');
    }



    public function advisers()
    {
        $teams = Adviser::all();

        return view('dashboard.adviser.all-team', compact('teams'));
    }
    public function Editadviser($id)
    {
        $team = Adviser::FindorFail($id);
        return view('dashboard.adviser.edit-team', compact('team'));
    }
    public function Updateadviser(Request $request)
    {
        $team = Adviser::find($request->id);
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
        return back()->with('team_updated', 'Adviser updated successfully is successfully updated');
    }

    public function Deleleadviser($id)
    {
        $team = Adviser::find($id);
        $team->delete();
        return redirect()->back()->with('team_deleted', 'Adviser    deleted  successfully');
    }
}
