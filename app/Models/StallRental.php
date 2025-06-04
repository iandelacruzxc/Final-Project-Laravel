<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StallRental extends Model
{
    protected $fillable = ['stall_id', 'tenant_name', 'rental_date', 'amount', 'is_paid'];
    protected $dates = ['rental_date'];
    protected $casts = [
        'rental_date' => 'date', // This line fixes the issue
        'is_paid' => 'boolean',
    ];

    public function stall()
    {
        return $this->belongsTo(Stall::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

}

