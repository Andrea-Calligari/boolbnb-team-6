<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProfileApiController extends Controller
{


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $filename = null;
        $path = 'uploads/user/';

        if($request->hasFile('image')){
            //definisci il file
            $file = $request->file('image');
            //definisci l'estensione del file
            $extension = $file->getClientOriginalExtension();
            //definisci il nome del file
            $filename = time().'.'.$extension;
    
            //sposti il file nel percorso
            $file->move(public_path($path), $filename);

            //cancelli file image precedente se esiste
            if(File::exists($request->user()->image)){
                File::delete($request->user()->image);
            }

            //definisci l'attributo image
            $request->user()->image = $path . $filename;
        }

        $request->user()->save();

        return response()->json(
            compact('request')
        );
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        //$form_data = $request->all();
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
         //if(Auth::hash($form_data['password'])){

        
        
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(
             compact('user')
        //$form_data
        );
        // }else{
        //     return response()->json([
        //         'msg' => 'la password non è corretta'
        //     ]);
        // }
    }
}
