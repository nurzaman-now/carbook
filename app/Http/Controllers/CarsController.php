<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('Car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('Car.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|max:1024|mimes:png,jpg,jpeg',
            'name' => 'required',
            'brand_id' => 'required',
            'model' => 'required',
            'license_plate' => 'required',
            'price_day' => 'required',
        ]);

        $create = Car::create($request->except('image'));
        if ($create) {
            $image = $request->file('image');
            $image->storeAs('public/cars', $create->id . '.' . $image->extension());
            $create->image = $create->id . '.' . $image->extension();
            $create->save();
            return redirect()->route('cars.index')->with('success', 'Car Berhasil Dibuat');
        }
        return redirect()->route('cars.index')->with('failed', 'Car Gagal Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        return view('Car.edit', compact('car', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'image' => 'max:1024|mimes:png,jpg,jpeg|nullable',
            'name' => 'required',
            'brand_id' => 'required',
            'model' => 'required',
            'license_plate' => 'required',
            'price_day' => 'required',
        ]);

        $update = $car->update($request->all());
        if ($update) {
            if ($request->hasFile('image')) {
                // delete image if exist
                if ($car->image) {
                    Storage::delete('public/cars/' . $car->image);
                }
                $image = $request->file('image');
                $image->storeAs('public/cars', $car->id . '.' . $image->extension());
                $car->image = $car->id . '.' . $image->extension();
                $car->save();
            }
            return redirect()->route('cars.index')->with('success', 'Car Berhasil Diubah');
        }
        return redirect()->route('cars.index')->with('failed', 'Car Gagal Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $delete = $car->delete();
        if ($delete) {
            if ($car->image) {
                Storage::delete('public/cars/' . $car->image);
            }
            return redirect()->route('cars.index')->with('success', 'Car Berhasil Dihapus');
        }
        return redirect()->route('cars.index')->with('failed', 'Car Gagal Dihapus');
    }
}
