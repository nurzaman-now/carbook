<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function home()
    {
        // if login
        if (auth()->check() && !auth()->user()->is_admin) {
            return view('dashboard');
        } elseif (auth()->check() && auth()->user()->is_admin) {
            return view('Admin.dashboard');
        }
        return view('home');
    }

    public function cars(Request $request)
    {
        $query = $request->get('query');
        if ($query) {
            $cars = Car::where('name', 'like', "%$query%")
                ->orWhere('model', 'like', "%$query%")
                ->get();
        } else {
            $cars = Car::all();
        }
        return view('cars', compact('cars'));
    }

    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required',
            'SIM_number' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create($request->all());
        auth()->login($user);
        return redirect()->route('home');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
