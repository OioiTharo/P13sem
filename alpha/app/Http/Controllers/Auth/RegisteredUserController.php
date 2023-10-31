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
        $request->validate([
            'USUARIO_NOME' => ['required', 'string', 'max:500'],
            'USUARIO_CPF' => ['required', 'string', 'max:500'],
            'USUARIO_EMAIL' => ['required', 'string', 'lowercase', 'email', 'max:500', 'unique:'.User::class],
            'USUARIO_SENHA' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'USUARIO_NOME' => $request->USUARIO_NOME,
            'USUARIO_CPF' => $request->USUARIO_CPF,
            'USUARIO_EMAIL' => $request->USUARIO_EMAIL,
            'USUARIO_SENHA' => Hash::make($request->USUARIO_SENHA),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
