<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'image',
        'name',
        'brand_id',
        'model',
        'license_plate',
        'price_day',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price_day' => 'decimal:2',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function returnRentals()
    {
        return $this->hasMany(ReturnRental::class);
    }

    public function getAvailableAttribute()
    {
        // Mengambil semua rental yang masih berlangsung atau telah dibuat tetapi belum dikembalikan
        $ongoingRentals = $this->rentals()->where(function ($query) {
            $query->where('rental_date', '<=', now())
                ->where('return_date', '>=', now());
        })->exists();

        // Mengembalikan false jika ada rental yang sedang berlangsung atau true jika tidak ada
        return !$ongoingRentals;
    }
}
