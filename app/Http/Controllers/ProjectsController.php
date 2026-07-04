<?php

namespace App\Http\Controllers;

use App\Http\Requests\project\storeProjectRequest;
use App\Http\Requests\project\updateProjectRequest;
use App\Models\CategoryProject;
use App\Models\Project;
use App\Services\ProjectService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct(private ProjectService $projectService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageName = "Projects";
        $projects = Project::with('category:id,name')->latest('created_at')->paginate(10);

        $categories = CategoryProject::all(['id', 'name']);
        return view('projects', compact('pageName', 'projects', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProjectRequest $request): RedirectResponse
    {
        // dd($request->all());
        $payload = $request->validated();

        try {
            $this->projectService->store($payload);
            return back()->with('success', 'Proyek ' . $payload['name'] . ' berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menambahkan proyek, silahkan cek data dan coba lagi!');
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
    public function edit(string $id): JsonResponse
    {
        try {
            $project = $this->projectService->getProjectById($id);
            return response()->json(['message' => 'Proyek berhasil diambil', 'data' => $project]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateProjectRequest $request, string $id): RedirectResponse
    {
        $payload = $request->validated();

        try {
            $this->projectService->update($payload, $id);
            return back()->with('success', 'Proyek ' . $payload['name'] . ' berhasil diubah.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal mengubah proyek, silahkan cek data dan coba lagi!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Project::destroy($id);

        return back()->with('success', 'Data deleted succesfully.');
    }
}
