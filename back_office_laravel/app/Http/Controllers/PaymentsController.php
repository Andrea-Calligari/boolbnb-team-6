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
            $start_date = Carbon::now();

            $promotions_with_timestamp = [];

            foreach ($apartment['promotions'] as $promotion) {
                $promotions_with_timestamp[$promotion['id']] = [
                    'start_date' => $promotion['pivot']['start_date'],
                    'expiration_date' => $promotion['pivot']['expiration_date']
                ];
            }


            do {
                $okCount = 0;
                foreach ($promotions_with_timestamp as $key => $promotion) {
                    if ($start_date->between($promotion['start_date'], $promotion['expiration_date'])) {
                        $start_date = (new Carbon($promotion['expiration_date']))->addSecond();
                    } else {
                        $okCount++;
                    }
                }
            } while (!($okCount === count($promotions_with_timestamp)));

            $hours = $promo_durations[$payload['promotionSelected']];
            $expiration_date = (new Carbon($start_date))->addHours($hours);

            $promotions_with_timestamp[$payload['promotionSelected']] = [
                'start_date' => $start_date,
                'expiration_date' => $expiration_date
            ];


            $apartment->promotions()->sync($promotions_with_timestamp);
        }

        return response()->json($status);
    }
    public function generate()
    {
        return  Braintree_ClientToken::generate();
    }
}
