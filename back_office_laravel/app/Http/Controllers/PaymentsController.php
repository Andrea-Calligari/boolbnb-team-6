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
        $promo_selected = Promotion::where('id', $payload['promotionSelected'])->first();

        $status = Braintree_Transaction::sale([
            'amount' => $promo_selected['price'],
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($status->success) {
            $apartment = Apartment::where('slug', $payload['apartmentSlug'])->with('promotions')->first();
            $promo_durations = Promotion::all()->pluck('hours', 'id')->all();
            $start_date = Carbon::now();

            $promotions_with_timestamp = [];
            $old_start_date = $start_date;
            do {
                $old_start_date = $start_date;
                foreach ($apartment['promotions'] as $promotion) {
                    if ($start_date->between($promotion['pivot']['start_date'], $promotion['pivot']['expiration_date'])) {

                        $start_date = (new Carbon($promotion['pivot']['expiration_date']))->addSecond();
                    }
                }
            } while ($old_start_date !== $start_date);

            $hours = $promo_durations[$payload['promotionSelected']];
            $expiration_date = (new Carbon($start_date))->addHours($hours);

            $promotions_with_timestamp[$payload['promotionSelected']] = [
                'start_date' => $start_date,
                'expiration_date' => $expiration_date
            ];


            $apartment->promotions()->attach($promotions_with_timestamp);

            $apartment->visible = true;
            $apartment->update();
        }

        return response()->json($status);
    }
    public function generate()
    {
        return Braintree_ClientToken::generate();
    }
}
