<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\View;
use Illuminate\Database\Eloquent\Relations\Pivot;
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
        $apartments = Apartment::where('visible', 1)->with('promotions', 'services')->get();

        $apartments = sortedApartmentsWithProm($apartments);

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
    public function show(Request $request, string $slug)
    {
        $apartment = Apartment::where('slug', $slug)->first();
        $ip_address = $request->ip();
        $apartment_id = $apartment['id'];
        //dump($apartment);

        $new_view = new View();
        $new_view->apartment_id = $apartment_id;
        $new_view->ip_address = $ip_address;
        $new_view->save();

        $apartment->load('user', 'category', 'promotions', 'services');
        return response()->json(compact('apartment'));
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
                if ($form_data['oldImage'] !== null) {
                    $form_data['image'] = $form_data['oldImage'] . ',' . $form_data['image'];
                }

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
            $service_ids = explode(',', $form_data['service_ids']);


            $apartments = Apartment::where('latitude', '<', $lat1 + (0.008995 * $radius))->with('promotions')
                ->where('visible', 1)
                ->where('latitude', '>', $lat1 - (0.008995 * $radius))
                ->where('longitude', '<', $lon1 + (0.011690 * $radius))
                ->where('longitude', '>', $lon1 - (0.011690 * $radius))
                ->where('rooms_number', '>=', $rooms_number)
                ->where('beds_number', '>=', $beds_number)

                ->with('services')

                ->get();

            $apartments = sortApartments($apartments, $lat1, $lon1, $radius);

            if ($form_data['service_ids'] !== null) {
                $apartments = filterApartments($apartments, $service_ids);
            }

            $apartments = sortedApartmentsWithProm($apartments);

            return response()->json(compact('apartments'));
            // return response()->json(['msg' => $service_ids]);
        } else {
            return response()->json(['msg' => 'bad request']);
        }
    }
    public function homePage()
    {
        // prenderci tutti gli appartamenti con promozioni visible = 1
        $now = Carbon::now();
        $apartments = Apartment::with('promotions')->where('visible', 1)->get();
        $apartmentPivot = [];

        // $resultPivot = $apartments[0]['promotions'][0]['pivot']; 
        // $start_date = $apartments[0]['promotions'][0]['pivot']['start_date'];
        // $expiration_date = $apartments[0]['promotions'][0]['pivot']['expiration_date'];
        // $isCurrent = $now->between($start_date, $expiration_date);

        foreach ($apartments as $apartment) {
            foreach ($apartment['promotions'] as $promotion) {
                $start_date =  $promotion['pivot']['start_date'];
                $expiration_date = $promotion['pivot']['expiration_date'];
                if ($now->between($start_date, $expiration_date))
                    $apartmentPivot[] = $apartment;
            }
        }




        //filtrare tutti gli appartamenti dove la data di inizio e fine sono coerenti 



        // $apartment['promotions']['pivot']['start_date'];



        return response()->json(compact('apartmentPivot'));

        // filtrare appartamenti per le promotions ancora in corso
        // response in json 
    }
}

function sortedApartmentsWithProm($apartments)
{
    $nowDate = Carbon::now();

    $apartmentsWithProm = [];
    foreach ($apartments as $apartment) {
        foreach ($apartment['promotions'] as $promotion) {
            if ($nowDate->between($promotion['pivot']['start_date'], $promotion['pivot']['expiration_date'])) {
                $apartmentsWithProm[] = $apartment;
            }
        }
    }

    foreach ($apartments as $apartment) {
        $returnPromotion = 0;
        foreach ($apartment['promotions'] as $promotion) {
            if (!($nowDate->between($promotion['pivot']['start_date'], $promotion['pivot']['expiration_date']))) {
                $returnPromotion++;
                //$apartmentsWithProm[] = $apartment;
            }
        }

        if($returnPromotion === count($apartment['promotions'])){
            $apartmentsWithProm[] = $apartment;
        }

    }


    return $apartmentsWithProm;
}

function sortApartments($apartments, $lat1, $lon1, $radius)
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
        if ($apartments[$i]['distance'] <= $radius) {
            $sortedApartments[] = $apartments[$i];
        }
    };

    return $sortedApartments;
}


function filterApartments($apartments, $services)
{
    $apartmentFitered = [];
    foreach ($apartments as $apartment) {
        if (checkServices($apartment['services'], $services)) {
            $apartmentFitered[] = $apartment;
        }
    };

    return $apartmentFitered;
}

function checkServices($apartmentServices, $serviceToCheck)
{
    $returnX = 0;
    for ($i = 0; $i < count($apartmentServices); $i++) {
        for ($x = 0; $x < count($serviceToCheck); $x++) {
            if ($apartmentServices[$i]['id'] == $serviceToCheck[$x]) {
                $returnX++;
            }
        }
    }

    if ($returnX === count($serviceToCheck)) {
        return true;
    } else {
        return false;
    }
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

