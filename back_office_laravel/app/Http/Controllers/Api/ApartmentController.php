<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $form_data = $request->validated();

        // $name = Str::slug($form_data['name']);
        // $slug = $name;
        // do {
        //     $find = Project::where('slug', $slug)->first();
        //     if ($find !== null) {
        //         $slug = $name . '-' . rand(1,99);
        //     }
        // } while ($find !== null);

        // $form_data['slug'] = $slug;

        // $project = Project::create($form_data);

        // if ($request->has('technologies')) {
        //     $project->technologies()->attach($request->technologies);
        // }

        // return to_route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $apartment = Apartment::where('slug',$slug)->get();
        //dump($apartment);
        $apartment->load('user','category','promotions','services','messages');
        return response()->json([
            'results' => $apartment
        ]);

        
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
