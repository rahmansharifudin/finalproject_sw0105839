<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('user')->get();
        $users = User::all();
        return view('project.index', compact('projects','users'));
    }

    public function create()
    {
        if(Gate::allows('admin', auth()->user())){
            $users = User::all();
            return view('project.create', compact('users'));
        }
        else
        {
            return view('errors.403');
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'start_date',
            'end_date',
            'duration',
            'cost',
            'client',
            'project_stage' =>'required',
            'project_status' =>'required',
            'user_id' =>'required'
        ]);

        Project::create($request->all());

        return redirect()->route('project.index')->with('success','Project successfully created!');
    }

    public function show(Project $project)
    {
        
    }

    public function edit(Project $project)
    {   
        if(Gate::allows('admin', auth()->user())){
            $users = User::all();
            $projectLeader = User::find($project->id);
            return view('project.update', compact('project', 'projectLeader', 'users'));
        }
        if(Gate::allows('leader', auth()->user())){
            $users = User::all();
            $projectLeader = User::find($project->id);
            return view('project.edit', compact('project', 'projectLeader', 'users'));
        }
        else{
            return view('errors.403');
        }
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'start_date', 
            'end_date',
            'duration',
            'cost',
            'client',
            'project_stage', 
            'project_status']);

        $project->update($request->all());

        return redirect()->route('project.index')->with('success', 'Your updates have been changed!');
    }

    public function destroy(Project $project)
    {
        
    }
}