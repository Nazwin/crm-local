<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'DESC')->paginate(15);

        return view('pages.tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $projects = Project::all();

        return view('pages.tasks_create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'name' => 'required|string',
           'description' => 'required|string',
            'project_id' => 'required|integer'
        ]);

        Task::create($data);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('pages.tasks_edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if(!$task){
            return redirect()->route('tasks.index');
        }
        $task->delete();

        return redirect()->route('tasks.index')->with('message', 'Задачу видалено');
    }
}
