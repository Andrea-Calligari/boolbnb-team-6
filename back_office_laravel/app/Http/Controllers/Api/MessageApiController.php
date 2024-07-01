<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::id())->with('messages')->get();




        // $apartment_messages = [];
        // $messages = [];

        // foreach ($apartments as $apartment) {

        //     array_push($apartment_messages,$apartment->messages);
            
            
            
        // }
        // foreach($apartment_messages as $message){
            
        //     $i = 0;

        //     if (empty($message)) {
        //         $i++;
        //     }else{
        //         array_push($messages, $message);
        //     }

            
            
        // }


        return response()->json([
            'results' => compact('apartments'),
            //'results'=>$id
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
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $message = Message::where('slug', $slug)->get();
        return response()->json([
            'results' => $message
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
