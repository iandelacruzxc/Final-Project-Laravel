<?php

namespace App\Http\Controllers;

use App\Models\StallRental;
use App\Models\Stall;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEarningsToday = StallRental::whereDate('rental_date', today())
            ->where('is_paid', true)
            ->sum('amount');

        $paidCount = StallRental::whereDate('rental_date', today())
            ->where('is_paid', true)
            ->count();

        $unpaidCount = StallRental::whereDate('rental_date', today())
            ->where('is_paid', false)
            ->count();

        $totalStalls = Stall::count();

        $occupiedStallsToday = StallRental::whereDate('rental_date', today())->count();

        $vacantStalls = $totalStalls - $occupiedStallsToday;

        return view('dashboard', compact('totalEarningsToday', 'paidCount', 'unpaidCount', 'totalStalls', 'occupiedStallsToday', 'vacantStalls'));
    }
}