<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\{Auth, Gate};
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Events\SystemNotificationEvent;
class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return view('admin.landing');
        }
        return view('admin.auth.login');
    }
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function profile(int $id){
        Gate::authorize('view-my-profile',$id);
        return view('admin.auth.profile');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

}
