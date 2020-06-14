<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use DB;
use Redirect;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')
                        ->where('user_id',auth()->user()->id)
                        ->get();
        return view('projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /*
    public function getProjectID($id){
        $project_id = Project::find($id);
        return view('projects.index',compact($project_id));
    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:3|max:255',
            'description'=>'nullable',
        ]);

        $project = new Project;
        $project->name = $request->name;
        $project->description= $request->description;
        $project->user_id = auth()->user()->id;
        $project->save();

        return Redirect::back()->with('success','New Project added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show',compact('project'))->with('success','You are viewing Project:'. $project->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        //$project->task()->detach();
        $project->delete();

        return Redirect::back()->with('success','Project deleted');     
    }
}
