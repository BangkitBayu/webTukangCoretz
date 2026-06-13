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
     * To get count active testimonial
     */

    public function getCountActiveTestimonials(): int
    {
        $countActiveTestimonials = Testimonial::where('isShow', '=', '1')->count();

        return $countActiveTestimonials;
    }

    public function updateActiveStatusTestimonial(Request $request,  string $id): RedirectResponse
    {
        $isShow = $request->isShow == 'on' ? 1 : 0;
        if ($isShow == 1 && $this->getCountActiveTestimonials() === 10) {
            // response()->json(['status' => 'error', 'message' => 'You have reached the total limit of testimonials displayed.'], 422);
            return back()->with('error', 'You have reached the total limit of testimonials displayed.');
        }
        // dd($request->all());

        Testimonial::where('id', '=', $id)->update(['isShow' => $isShow]);


        // response()->json(['status' => 'success', 'message' => 'Update active status testimonial successfull.'], 200);
        return back()->with('success', 'Update active status testimonial successfull.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageName = "Testimonial";
        // $testimonials = Testimonial::all(['id', 'name', 'position', 'comment', 'rating', 'isShow']);
        $testimonials = Testimonial::paginate(10);
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

        if ($request->isShow == 1 && $this->getCountActiveTestimonials() === 10) {
            return back()->with('error', 'You have reached the total limit of testimonials displayed.');
        }

        Testimonial::create($request->all());

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
        $testimonial = Testimonial::findOrFail($id);

        return response()->json($testimonial, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateTestimonialRequest $request, string $id): RedirectResponse
    {
        $request->validated();

        if ($request->isShow == 1 && $this->getCountActiveTestimonials() === 10) {
            return back()->with('error', 'You have reached the total limit of testimonials displayed.');
        }

        Testimonial::where('id', '=', $id)->update($request->only(['name', 'position', 'comment', 'rating', 'isShow']));

        return back()->with('success', 'Data changes has been successfully saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::destroy($id);

        return back()->with('success', 'Data deleted succesfully.');
    }
}
