<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
//use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Toastr;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $teams = Team::all();
        return view('backEnd.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $team=new Team();
        $team->team_name=$request->team_name;
        $team->team_designation=$request->team_designation;
        
        if ($request->hasFile('team_image'))
        {
            
            $file=$request->file('team_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/team/',$filename);
            $filePath='public/uploads/team/'.$filename;
            $team->team_image=$filePath;
            
        }
        
        $team->save();
        Toastr::success('Success','Data insert successfully');
        return redirect()->intended('/admin/teams')->with('success','Team Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('backEnd.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
//        dd($request->all());
        $team->team_name=$request->team_name;
        $team->team_designation=$request->team_designation;
        
        if ($request->hasFile('team_image'))
        {
            
         
            if ($request->hasFile('team_image'))
            {
                if($team->team_image && file_exists($team->team_image) )
                {
                    unlink($team->team_image);
                }

                $file=$request->file('team_image');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('public/uploads/team/',$filename);
                $filePath='public/uploads/team/'.$filename;
                $team->team_image=$filePath;
            }
            
        }
        
        $team->save();
        Toastr::success('Success','Team Updated Successfully');
        return redirect()->intended('/admin/teams')->with('success','Team Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        
        if($team->team_image && file_exists($team->team_image) )
        {
            unlink($team->team_image);
        }
        $team->delete();
        Toastr::success('Success','Team Deleted Successfully');
        return redirect()->back()->with('success','Team Deleted Successfully');
    }
}
