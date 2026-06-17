<?php

namespace App\Http\Controllers;

use App\Http\Requests\project\storeProjectRequest;
use App\Models\CategoryProject;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageName = "Projects";
        $projects = Project::latest('created_at')->paginate(10);
        // dd($projects);
        $categories = CategoryProject::all(['id', 'name']);
        return view('projects', compact('pageName', 'projects', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProjectRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        // dd($payload);

        unset($payload['thumbnail']);
        $project = Project::create($payload);

        $project->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');

        $project->getFirstMediaUrl('thumbnail', 'webp');

        return back()->with('success', 'New data has been successfully saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
