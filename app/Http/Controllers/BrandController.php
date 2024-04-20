<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('Brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $create = Brand::create($request->all());
        if ($create) {
            return redirect()->route('brands.index')->with('success', 'Brand Berhasil Dibuat');
        }
        return redirect()->route('brands.index')->with('failed', 'Brand Gagal Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(brand $brand)
    {
        return view('Brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, brand $brand)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $update = $brand->update($request->all());
        if ($update) {
            return redirect()->route('brands.index')->with('success', 'Brand Berhasil Diubah');
        }
        return redirect()->route('brands.index')->with('failed', 'Brand Gagal Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(brand $brand)
    {
        $delete = $brand->delete();
        if ($delete) {
            return redirect()->route('brands.index')->with('success', 'Brand Berhasil Dihapus');
        }
        return redirect()->route('brands.index')->with('failed', 'Brand Gagal Dihapus');
    }
}
