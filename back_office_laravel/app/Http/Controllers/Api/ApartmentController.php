<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::all();

        return response()->json([
            $apartments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $title = Str::slug($form_data['title']);
        $slug = $title;
        do {
            $find = Apartment::where('slug', $slug)->first();
            if ($find !== null) {
                $slug = $title . '-' . rand(1, 99);
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        $apartment = Apartment::create($form_data);

        if ($request->has('services_ids')) {
            $apartment->services()->attach($request->services_ids);
        }

        return response()->json(
            compact('apartment')
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $apartment = Apartment::where('slug', $slug)->get();
        //dump($apartment);
        $apartment->load('user', 'category', 'promotions', 'services');
        return response()->json([
            'results' => $apartment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $form_data = $request->all();

        $apartment = Apartment::where('slug', $slug)->first();

        $title = Str::slug($form_data['title']);
        $slug = $title;
        do {
            $find = Apartment::where('slug', $slug)->whereNot('id', $apartment->id)->first();
            if ($find !== null) {
                $slug = $title . '-' . rand(1, 99);
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        $apartment->update($form_data);

        if ($request->has('services_ids')) {
            $apartment->services()->sync($request->services_ids);
        } else {
            $apartment->services()->detach();
        }

        return response()->json(
            compact('apartment')
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $apartment = Apartment::where('slug', $slug)->get();
        $apartment->delete();
        return response()->json([
            'msg'=>'deleted',
        ]);
    }
}
