<?php

namespace App\Http\Controllers\projectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectManagement\storeProjectRequest;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProjectRequest $request)
    {
        $request->validated();
        $slug = strtolower(str_replace(' ', '-', $request->only('name')));
        try {
            Project::create([
                'name' => $request->name,
                'slug' => $slug,
                'description' => $request->description ? $request->description : null,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'category_id' => $request->category_id,
                'is_published' => $request->boolean('is_published') ? 1 : 0,
            ]);
            return back()
                ->with('status', 'success')
                ->with('message', 'Project created successfully');
        } catch (Exception $e) {
            return back()
                ->with('status', 'error')
                ->with('message', 'Failed to create project ' . $e->getMessage());
        }
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
