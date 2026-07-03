<?php

namespace App\Http\Controllers;

use App\Exceptions\TestimonialLimitExceededException;
use App\Http\Requests\testimonial\storeTestimonialRequest;
use App\Http\Requests\testimonial\updateTestimonialRequest;
use App\Http\Requests\testimonial\updateVisibilityRequest;
use App\Models\Testimonial;
use App\Services\TestimonialService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct(private TestimonialService $testimonialService) {}



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
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): JsonResponse
    {
        try {
            $testimonial = $this->testimonialService->getTestimonialById($id);
            return response()->json(['message' => 'Testimoni berhasil diambil', 'data' => $testimonial], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateTestimonialRequest $request, string $id): RedirectResponse
    {
        $payload = $request->validated();

        try {
            $this->testimonialService->update($payload, $id);

            return back()->with('success', 'Testimoni ' . $payload['name'] . ' berhasil diperbarui.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateVisibility(updateVisibilityRequest $request,  string $id): RedirectResponse
    {
        $payload = $request->validated();

        try {
            $this->testimonialService->updateVisibility($payload['is_visible'], $id);
            return back()->with('success', 'Berhasil memperbarui status testimoni.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
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
