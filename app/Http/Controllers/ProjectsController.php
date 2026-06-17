<?php

namespace App\Http\Controllers;

use App\Http\Requests\project\storeProjectRequest;
use App\Http\Requests\project\updateProjectRequest;
use App\Models\CategoryProject;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
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
        $projects = Project::with('category:id,name')->latest('created_at')->paginate(10);
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
    public function edit(string $id): JsonResponse
    {
        $project = Project::findOrFail($id);
        return response()->json($project, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateProjectRequest $request, Project $project): RedirectResponse
    {
        $payload = $request->validated();

        unset($payload['thumbnail']);

        $project->update($payload);

        if ($request->hasFile('thumbnail')) {
            $project->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }

        return back()->with('success', 'Data changes has been successfully saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
