<?php

namespace App\Http\Controllers;

use App\Models\Stall;
use App\Models\StallRental;
use Illuminate\Http\Request;

class StallController extends Controller
{
    public function index()
    {
        $stalls = Stall::with(['todayRental.tenant'])->get();

        $totalEarnings = StallRental::whereDate('rental_date', today())->where('is_paid', true)->sum('amount');

        return view('stalls.index', compact('stalls', 'totalEarnings'));
        
    }
    public function history()
{
    $rentals = StallRental::with(['stall', 'tenant'])
        ->orderBy('rental_date', 'desc')
        ->paginate(20);

    return view('stalls.history', compact('rentals'));
}

}
