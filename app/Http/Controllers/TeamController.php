<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    //

    public function Addteam()
    {
        return view('dashboard.team.add-team');
    }

    public function TeamStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',


        ]);
        $team = new Team();
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
        return redirect()->back()->with('team_added', 'Team    added successfully');
    }



    public function teams()
    {
        $teams = Team::all();

        return view('dashboard.team.all-team', compact('teams'));
    }
    public function EditTeam($id)
    {
        $team = Team::FindorFail($id);
        return view('dashboard.team.edit-team', compact('team'));
    }
    public function UpdateTeam(Request $request)
    {
        $team = Team::find($request->id);
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
        return back()->with('team_updated', 'Team updated successfully is successfully updated');
    }

    public function DeleleTeam($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->back()->with('team_deleted', 'Team    deleted  successfully');
    }
}
