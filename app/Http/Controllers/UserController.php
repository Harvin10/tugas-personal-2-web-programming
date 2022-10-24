<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class UserController extends Controller
{
    public function login() {
        return view('login');
    }
    public function register() {
        return view('register');
    }

    public function reset() {
        return view('reset');
    }

    public function welcome() {
        return view('welcome');
    }

    public function inputRegister() {
        $data = request()->validate([
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $data["password"] = bcrypt($data["password"]);

        User::create($data);

        return redirect('login')->with('success', 'Login successful.');
    }

    public function authenticate(Request $request) {
        try{
            $this->isTooManyFailedAttempts();
        }catch(Exception $e){
            return redirect('login')->with('loginError', $e->getMessage());
        }


        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)) {
            RateLimiter::clear($this->throttleKey());
            $request->session()->regenerate();

            return redirect()->intended('/welcome');
        }
        RateLimiter::hit($this->throttleKey(), $seconds = 30);
        return back()->with('loginError', "login Failed!!");

    }

    public function throttleKey()
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    public function isTooManyFailedAttempts()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), $perMinute = 3)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());
        throw new Exception("Too many attempts. Try again in {$seconds}s");
    }

    public function resetPassword(Request $request) {
        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        User::where('email', $data["email"])
            ->update(['password' => bcrypt($data["password"])]);

        return redirect('login')->with('successReset', 'Reset password successful.');
    }
}
