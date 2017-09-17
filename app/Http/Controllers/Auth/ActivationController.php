<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = User::byActivationColumns($request->email, $request->token)->firstOrFail();

        $user->update([
            'active' => true,
            'activation_token' => null
        ]);

        auth()->loginUsingId($user->id);

        return redirect()->route('home')->withInfo('Akun kamu berhasil di aktivasi, selamat berkomunitas !');
    }
}
