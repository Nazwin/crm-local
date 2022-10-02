<?php

namespace App\Http\Controllers;

use App\Jobs\EmailNewTask;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
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
        $users = User::all();
        $projects = Project::all();

        return view('pages.tasks_edit', compact(['task', 'users', 'projects']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required|string',
           'description' => 'required|string',
           'status' => 'required|string',
            'project_id' => 'required|integer',
            'user_id' => 'required|array',
            'user_id.*' => 'integer',
        ]);

        $data = $request->all();

        $task = Task::updateOrCreate([
            'id' => $id
        ], [
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => $data['status'],
            'project_id' => $data['project_id']
        ]);
        $task->users()->sync($data['user_id']);

//        EmailNewTask::dispatch($task);

        return redirect()->route('tasks.index')->with('message', 'Success');
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
