<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Models\ReturnRental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function booking(Car $car)
    {
        return view('Rental.booking', compact('car'));
    }

    public function storeBooking(Request $request, Car $car)
    {
        $request->validate([
            'rental_date' => 'required',
            'return_date' => 'required',
        ]);

        $totalPrice = $car->price_day *
            (strtotime($request->return_date) - strtotime($request->rental_date))
            / (60 * 60 * 24);

        $create = Rental::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'rental_date' => $request->rental_date,
            'return_date' => $request->return_date,
            'total_price' => $totalPrice,
        ]);

        if ($create) {
            return redirect()->route('booking.index')->with('success', 'Booking Berhasil');
        }
        return redirect()->route('cars')->with('failed', 'Booking Gagal');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::all();
        return view('Rental.index', compact('rentals'));
    }

    public function returnBook()
    {
        $rentals = ReturnRental::all();
        return view('Rental.return', compact('rentals'));
    }

    public function returnBookForm($license_plate)
    {
        $car = Car::where('license_plate', $license_plate)->first();
        $rental = Rental::where('car_id', $car->id)->first();
        return view('Rental.return_form', compact('car', 'rental'));
    }

    public function returnBookPost(Request $request, $license_plat)
    {
        $car = Car::where('license_plate', $license_plat)->first();
        if (!$car) {
            return redirect()->route('booking.return')->with('failed', 'Mobil Tidak Ditemukan');
        }
        $rental = Rental::where('car_id', $car->id)->first();

        $totalPrice = $car->price_day *
            (strtotime($rental->return_date) -
                strtotime(now()))
            / (60 * 60 * 24);

        $create = ReturnRental::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'rental_date' => $rental->rental_date,
            'return_date' => now(),
            'total_price' => $totalPrice,
        ]);

        if ($create) {
            return redirect()->route('booking.return')->with('success', 'Return Berhasil');
        }
        return redirect()->route('booking.return')->with('failed', 'Return Gagal');
    }
}
