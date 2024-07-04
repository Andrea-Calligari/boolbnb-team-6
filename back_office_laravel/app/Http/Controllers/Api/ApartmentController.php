<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::all();

        return response()->json(compact('apartments'));
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

        if ($form_data['user_id'] == Auth::id()) {
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
                $form_data['image'] = $form_data['oldImage'] . ',' . $form_data['image'];
                $form_data['image'] = rtrim($form_data['image'], ",");
            } else {
                $form_data['image'] = $form_data['oldImage'];
            }

            $apartment->update($form_data);

            if ($request->has('services_ids')) {
                $apartment->services()->sync($request->services_ids);
            } else {
                $apartment->services()->detach();
            }


            return response()->json(
                compact('apartment')
            );
        } else {
            return response()->json([
                'msg' => 'non sei autorizzato'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $apartment = Apartment::where('slug', $slug)->delete();
        $response = '';
        if ($apartment) {
            $response = 'deleted';
        } else {
            $response = 'apartment to delete not found';
        }
        return response()->json([
            'msg' => $response
        ]);
    }

    public function search(Request $request)
    {
        $form_data = $request->all();

        if ($request->has('lon') && $request->has('lat') && $request->has('radius') && $request->has('rooms_number') && $request->has('beds_number') && $request->has('service_ids')) {

            $lat1 = $form_data['lat'];
            $lon1 = $form_data['lon'];
            $radius = intval($form_data['radius']);
            $rooms_number = intval($form_data['rooms_number']);
            $beds_number = intval($form_data['beds_number']);
            $service_ids = $form_data['service_ids'];
            $apartments = Apartment::where('latitude', '<', $lat1 + (0.008995 * $radius))
                ->where('latitude', '>', $lat1 - (0.008995 * $radius))
                ->where('longitude', '<', $lon1 + (0.011690 * $radius))
                ->where('longitude', '>', $lon1 - (0.011690 * $radius))
                ->where('rooms_number', '>=', $rooms_number)
                ->where('beds_number', '>=', $beds_number)
                ->with('services')

                ->get();


            $apartments = filterApartments($apartments, 14);
            // $apartments = sortApartments($apartments, $lat1, $lon1);

            return response()->json(compact('apartments'));
        } else {
            return response()->json(['msg' => 'bad request']);
        }
    }
}


function filterApartments($apartments, $services)
{
    $apartmentFitered = [];
    foreach ($apartments as $apartment) {
        if (checkServices($apartment['services'], $services) ) {
            $apartmentFitered[] = $apartment;
        }
    };

    return $apartmentFitered;
}
function checkServices($services, $serviceToCheck)
{
    foreach ($services as $service) {
        if ($service['id'] === $serviceToCheck) {
            return true;
        }
    };
    return false;
}



function sortApartments($apartments, $lat1, $lon1)
{
    foreach ($apartments as &$apartment) {
        $apartment['distance'] = getDistance($lat1, $lon1, $apartment['latitude'], $apartment['longitude']);
    };

    $toSortApartments = [];
    foreach ($apartments as $apartment) {
        $toSortApartments[] = $apartment['distance'];
    };
    asort($toSortApartments);
    $sortedApartments = [];
    foreach ($toSortApartments as $i => $apartment) {
        $sortedApartments[] = $apartments[$i];
    };

    return $sortedApartments;
}

function getDistance($lat1, $lon1, $lat2, $lon2)
{
    $R = 6371.0;

    // Converti le coordinate in radianti
    $lat1_rad = deg2rad($lat1);
    $lon1_rad = deg2rad($lon1);
    $lat2_rad = deg2rad($lat2);
    $lon2_rad = deg2rad($lon2);

    // Differenze delle coordinate
    $dlat = $lat2_rad - $lat1_rad;
    $dlon = $lon2_rad - $lon1_rad;

    // Formula dell'haversine
    $a = sin($dlat / 2) ** 2 + cos($lat1_rad) * cos($lat2_rad) * sin($dlon / 2) ** 2;
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    // Distanza
    $distanza = $R * $c;
    return $distanza;
}
