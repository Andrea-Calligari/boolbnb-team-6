<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //$request->validate([
           // 'name' => ['required', 'string', 'max:255'],
           // 'surname' => ['required', 'string', 'max:255'],
           // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
           // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
           // 'image' => ['nullable', 'image', 'max:2048']
        //]);

        //definisci path e filename iniziale + default image
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
            'password' => Hash::make($request->password),
            'image' => $filename ? $path . $filename : $defaultImage, //salva nuovo path solo se viene caricato un file, altrimenti usi default image
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
