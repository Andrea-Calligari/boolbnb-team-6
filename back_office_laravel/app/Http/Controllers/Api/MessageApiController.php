<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MessageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::id())->with('messages')->get();

        return response()->json([
            'results' => compact('apartments'),
        ]);
    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $form_data = $request->all();

        $name = Str::slug($form_data['name']);
        $slug = $name;
        do {
            $find = Message::where('slug', $slug)->first();
            if ($find !== null) {
                $slug = $name . '-' . rand(1, 99);
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        $message = Message::create($form_data);

        return response()->json(
            compact('message')
        );

    }

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
