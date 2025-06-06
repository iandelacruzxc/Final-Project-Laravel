<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    protected $fillable = ['stall_id', 'tenant_name', 'contact', 'rental_date', 'amount', 'is_paid'];

    protected $dates = ['rental_date'];

    protected $casts = [
        'rental_date' => 'date',
        'is_paid' => 'boolean',
    ];

    public function stall()
    {
        return $this->belongsTo(Stall::class);
    }
    public function todayRental()
    {
        return $this->hasOne(StallRental::class)
            ->whereDate('rental_date', date('Y-m-d'));
    }
    

}
