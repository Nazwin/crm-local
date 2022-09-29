<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getAll()
    {
        $projects = Project::all();

        return response()->json($projects);
    }

    public function getTasks($id)
    {
        $project = Project::find($id);
        if(!$project)
        {
            return response()->json(['message' => 'Project not found'], 419);
        }

        $tasks = $project->tasks;

        return response()->json($tasks);
    }
}
