<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    protected $fillable = ['stall_number'];

    public function rentals()
    {
        return $this->hasMany(StallRental::class);
    }

    public function todayRental()
    {
        return $this->hasOne(StallRental::class)->whereDate('rental_date', today());
    }
}
