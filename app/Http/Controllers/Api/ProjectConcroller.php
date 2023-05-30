<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectConcroller extends Controller
{
    public function index()
    {
        //$projects = Project::with('technologies', 'type')->get();

        $projects = Project::with('technologies', 'type')->paginate(2);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show(int $id)
    {
        $project = Project::find($id)->with('technologies', 'type')->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }
    }
}
