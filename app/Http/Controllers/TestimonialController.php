<?php

namespace App\Http\Controllers;

use App\Http\Requests\testimonial\storeTestimonialRequest;
use App\Http\Requests\testimonial\updateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageName = "Testimonial";
        $testimonials = Testimonial::all();
        return view('testimonial', compact('pageName', 'testimonials'));
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
    public function store(storeTestimonialRequest $request): RedirectResponse
    {
        $request->validated();

        Testimonial::create($request->all());

        return back()->with('success', 'New data has been successfully saved');
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
        $testimonial = Testimonial::findOrFail($id);

        return response()->json($testimonial, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateTestimonialRequest $request, string $id)
    {
        $request->validated();

        Testimonial::where('id', '=', $id)->update($request->only(['name', 'position', 'comment', 'rating', 'isShow']));
        return back()->with('success', 'Data changes has been successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
