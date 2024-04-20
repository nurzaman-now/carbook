<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
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
            'rental_date' => 'required|date',
            'return_date' => 'required|date',
        ]);

        $totalPrice = $car->price_day * (strtotime($request->return_date) - strtotime($request->rental_date)) / (60 * 60 * 24);

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
