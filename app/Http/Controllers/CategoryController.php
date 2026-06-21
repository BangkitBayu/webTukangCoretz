<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\storeCategoryRequest;
use App\Http\Requests\category\updateCategoryRequest;
use App\Models\CategoryProject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(CategoryProject $category)
    {
        $pageName = 'Categories';
        $categories = $category->select(['id', 'name'])->withCount('project')->get();
        return view('categories', compact('pageName', 'categories'));
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
    public function store(storeCategoryRequest $request, CategoryProject $category): RedirectResponse
    {
        $request->validated();

        $category->create([
            'name' => $request->category_name
        ]);

        return back()->with('success', 'Category ' . $request->category_name . ' saved successfully');
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
        $category = CategoryProject::select(['id', 'name'])->where('id', $id)->withCount('project')->find($id);

        if (!$category) return response()->json(['message' => 'Category not found'], 404);
        return response()->json(['message' => 'Category successfully taken', 'data' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateCategoryRequest $request, string $id): RedirectResponse
    {
        $category = CategoryProject::find($id, 'id');

        if (!$category) return back()->with('error', 'Category not found');

        $payload = $request->validated();

        $category->update(['name' => $payload['category_name']]);

        return back()->with('success', 'Category ' . $request->category_name . ' save changes successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
