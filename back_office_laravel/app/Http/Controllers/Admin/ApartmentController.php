<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Apartment;
//use App\Models\User;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::all();

        return view('admin.apartments.index',compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promotions = Promotion::orderBy('title', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $services = Service::orderBy('name', 'asc')->get();

        return view('admin.apartments.create', compact('promotions', 'categories', ' services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request)
    {
        $form_data = $request->validated();
        $form_data = $request->all();
        $base_slug = Str::slug($form_data['title']);
        $slug = $base_slug;
        $n = 0 ;

        do{
            $find = Apartment::where('slug', $slug)->first();
            if($find !== null){
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        }while($find !== null);

        $form_data['slug'] = $slug;
        $apartment = Apartment::create($form_data);
        if($request->has('promotions') ){
            $apartment->promotions()->attach($request->promotion);
        } 
        if($request->has('services') ){
            $apartment->services()->attach($request->services);
        }
        return to_route('admin.apartments.show',$apartment);



    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        $apartment->load(['category', 'promotions' ,'services', ]);
        return view('admin.apartments.show', compact('apartment'));
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
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
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
