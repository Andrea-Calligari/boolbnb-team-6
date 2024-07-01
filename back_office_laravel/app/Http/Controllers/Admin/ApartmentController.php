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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::all();

        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promotions = Promotion::orderBy('title', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $services = Service::orderBy('name', 'asc')->get();

        return view('admin.apartments.create', compact('promotions', 'categories', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request)
    {
        //dd($request);
        $form_data = $request->validated();

        $form_data = $request->all();

        //definire lo slug
        $base_slug = Str::slug($form_data['title']);
        $slug = $base_slug;
        $n = 0;

        do {
            $find = Apartment::where('slug', $slug)->first();
            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        //definire user_id dell'utente loggato
        $form_data['user_id'] = Auth::id();

        //definire visible come false per default
        $form_data['visible'] = $request->input('visible', false);

        if ($request->has('image')) {
            //imposti l'array vuoto
            $form_data['image'] = '';

            foreach ($request->file('image') as $file) {
                //definisci l'estensione del file
                $extension = $file->getClientOriginalExtension();
                //definisci il nome del file
                $filename = time() . '-' . uniqid() . '.' . $extension;
                //definisci il percorso
                $path = 'uploads/apartment/';
                //sposti il file nel percorso
                $file->move($path, $filename);
                //aggiungi il file all'array
                $form_data['image'] = $form_data['image'] . $path . $filename . ',';
            }
            $form_data['image'] = rtrim($form_data['image'], ",");
        }

        $new_apartment = Apartment::create($form_data);

        if ($request->has('promotions')) {
            $new_apartment->promotions()->attach($request->input('promotions'));
        }
        if ($request->has('services')) {
            $new_apartment->services()->attach($request->input('services'));
        }

        return redirect()->route('admin.apartments.show', $new_apartment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        //$images = json_decode($apartment->image, true);
        $apartment->load(['category', 'promotions', 'services']);
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        $promotions = Promotion::orderBy('title', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $services = Service::orderBy('name', 'asc')->get();

        return view('admin.apartments.edit', compact('apartment', 'promotions', 'categories', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $form_data = $request->validated();
        $form_data = $request->all();

        if ($request->has('image')) {
            //definisci il file
            $file = $request->file('image');
            //definisci l'estensione del file
            $extension = $file->getClientOriginalExtension();
            //definisci il nome del file
            $filename = time() . '.' . $extension;
            //definisci il percorso
            $path = 'uploads/apartment/';
            //sposti il file nel percorso
            $file->move($path, $filename);

            //cancelli file image precedente se esiste
            if (File::exists($apartment->image)) {
                File::delete($apartment->image);
            }

            //definisci l'attributo image in form_data
            $form_data['image'] = $path . $filename;
        }

        $apartment->fill($form_data);
        $apartment->save();

        if ($request->has('promotions')) {
            $apartment->visible = 1;
        }

        return to_route('admin.apartments.show', $apartment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
