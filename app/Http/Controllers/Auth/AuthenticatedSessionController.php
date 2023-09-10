<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $data['title'] = "iSchool";
        $data['menu'] = "Authentication";
        $data['submenu'] = "User Login";
        
        return view('cms.auth.auth-login', $data);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->type === 0){ 
            return redirect()->intended(RouteServiceProvider::HOME_SISWA);
        } elseif (Auth::user()->type === 1) {
            return redirect()->intended(RouteServiceProvider::HOME_STAFF);
        } elseif (Auth::user()->type === 2) {
            return redirect()->intended(RouteServiceProvider::HOME_GURU);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
