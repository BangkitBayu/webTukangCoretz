<?php

namespace App\Http\Controllers;

use App\Exceptions\TestimonialLimitExceededException;
use App\Http\Requests\testimonial\storeTestimonialRequest;
use App\Http\Requests\testimonial\updateTestimonialRequest;
use App\Models\Testimonial;
use App\Services\TestimonialService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct(private TestimonialService $testimonialService) {}

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
        $testimonials = Testimonial::latest('created_at')->paginate(20);
        $testimonials_count = Testimonial::count();
        $active_testimonials_count = Testimonial::visible()->count();
        return view('testimonial', compact('pageName', 'testimonials', 'testimonials_count', 'active_testimonials_count'));
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

        $payload =  $request->validated();

        try {
            $this->testimonialService->store($payload);

            return back()->with('success', 'Testimoni ' . $payload['name'] . ' berhasil ditambahkan.');
        } catch (TestimonialLimitExceededException $e) {
            return back()->with('error', $e->getMessage());
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
