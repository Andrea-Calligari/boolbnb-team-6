<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Braintree\Transaction as Braintree_Transaction;
use Braintree\ClientToken as Braintree_ClientToken;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function process(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $status = Braintree_Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);


        if ($status) {
            $apartment = Apartment::where('slug', $payload['apartmentSlug'])->first();
            $promo_durations = Promotion::all()->pluck('hours', 'id')->all();
            $hours = $promo_durations[$payload['promotionSelected']];

            $start_date = Carbon::now();
            $expiration_date = $start_date->addHours($hours);
            $promotions_with_timestamp[$payload['promotionSelected']] = [
                'start_date' => $start_date,
                'expiration_date' => $expiration_date 
            ];
            $apartment->promotions()->attach($promotions_with_timestamp);
        }

        return response()->json($status);
    }
    public function generate()
    {
        return  Braintree_ClientToken::generate();
    }
}
