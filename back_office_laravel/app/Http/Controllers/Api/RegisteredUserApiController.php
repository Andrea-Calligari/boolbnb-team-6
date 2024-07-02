<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisteredUserApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'image' => ['nullable', 'image', 'max:2048'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $filename = null;
        $path = 'uploads/user/';
        $defaultImage = 'uploads/user/Netflix_avatar.png';
        
        if($request->hasFile('image')){
            //definisci il file
            $file = $request->file('image');
            //definisci l'estensione del file
            $extension = $file->getClientOriginalExtension();
            //definisci il nome del file
            $filename = time().'.'.$extension;
    
            //sposti il file nel percorso
            $file->move(public_path($path), $filename);
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'image' => $filename ? $path . $filename : $defaultImage,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        

        return response()->json(compact('user'));
    }
}
