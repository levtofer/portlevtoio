<?php
namespace App\Http\Controllers;

use App\Models\Project;

class WorksController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', 'published')
                           ->orderBy('order')
                           ->get();
        return view('works.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('works.show', compact('project'));
    }
}