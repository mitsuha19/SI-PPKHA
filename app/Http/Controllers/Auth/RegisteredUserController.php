<?php

namespace App\Http\Controllers\Auth;

use Closure;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Rules\Recaptcha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

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
            'nama' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255', 'unique:' . User::class . ',nim'],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class . ',username'],
            'prodi' => ['required', 'string', 'max:255'],
            'tahun_lulus' => ['required', 'numeric', 'digits:4', 'max:' . date('Y')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'g-recaptcha-response' => ['required', new Recaptcha]
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'username' => $request->username,
            'prodi' => $request->prodi,
            'tahun_lulus' => $request->tahun_lulus,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('public.beranda', absolute: false));
    }
}
