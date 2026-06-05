<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\loginRequest;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(loginRequest $request)
    {
        $request->validated();

        if (Auth::attempt($request->only('name', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'name' => 'Username or password incorrect',
            'password' => 'Username or password incorrect'
        ])->onlyInput('name' , 'password');
    }
}
