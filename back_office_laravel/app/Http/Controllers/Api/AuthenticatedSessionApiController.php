<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionApiController extends Controller
{
    // Login
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        // $apartments = Apartment::where('user_id', Auth::id())->with('messages', 'category', 'promotions', 'services')->get();

        return response()->json(compact('user'));
    }

    // All user apartments
    public function getApartments()
    {
        $apartments = Apartment::where('user_id', Auth::id())->with('messages', 'category', 'promotions', 'services', 'views')->get();

        return response()->json(compact('apartments'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'msg' => 'logout',
        ]);
    }
}
