<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Redirect;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    
    public function store(Request $request,int $project_id)
    {
        $this->validate($request, [
            'name'=>'required|min:3|max:255'
        ]);

        
        $project = Project::find($project_id);
        

        $task = new Task;

        $task->name = $request->name;
        $task->user_id = auth()->user()->id;
        $task->project()->associate($project);

        $task->save();

        return Redirect::back()->with('success','New Task added');
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        //$post->project()->detach();
        $task->delete();

        return Redirect::back()->with('success','Task deleted');   
    }
}
