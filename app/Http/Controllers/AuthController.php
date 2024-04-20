<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function home()
    {
        // get all cars and group by brand_id
        $carsBrand = [];
        $cars = Car::all()->groupBy('brand_id');
        foreach ($cars as $key => $car) {
            $carsBrand[$key] = $car->first();
        }
        $totalCar = Car::all()->count();
        $totalBrand = Brand::all()->count();

        // if login
        if (auth()->check() && !auth()->user()->is_admin) {
            return view('dashboard', compact('carsBrand', 'totalCar', 'totalBrand'));
        } elseif (auth()->check() && auth()->user()->is_admin) {
            return view('Admin.dashboard', compact('carsBrand', 'totalCar', 'totalBrand'));
        }
        return view('home', compact('carsBrand', 'totalCar', 'totalBrand'));
    }

    public function cars(Request $request)
    {
        $q = $request->get('q');
        if ($q) {
            $cars = Car::where('name', 'like', "%$q%")
                ->orWhere('model', 'like', "%$q%")
                ->paginate(10);
        } else {
            $cars = Car::paginate(10);
        }
        return view('cars', compact('cars', 'q'));
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
        return back()->with('failed', 'Invalid credentials');
    }

    public function profile()
    {
        return view('profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
            'address' => 'required',
            'phone_number' => 'required',
            'SIM_number' => 'required',
        ]);

        $user = User::find($user->id);
        $user->update($request->all());
        return back()->with('success', 'Profile updated');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
