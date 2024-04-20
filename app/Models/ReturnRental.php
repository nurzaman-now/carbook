<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnRental extends Model
{

    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'car_id',
        'rental_date',
        'return_date',
        'total_price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'rental_date' => 'datetime',
        'return_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // get rental_date and return_date attribute ID
    public function getRentalDateAttribute()
    {
        $date = $this->attributes['rental_date'];
        // date to ID
        $date = date('d F Y', strtotime($date));

        return $date;
    }

    public function getReturnDateAttribute()
    {
        $date = $this->attributes['return_date'];
        // date to ID
        $date = date('d F Y', strtotime($date));

        return $date;
    }
}
