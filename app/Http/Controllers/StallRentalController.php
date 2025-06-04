<?php

namespace App\Http\Controllers;

use App\Models\Stall;
use App\Models\StallRental;
use App\Models\Tenant;
use Illuminate\Http\Request;

class StallRentalController extends Controller
{
    public function index()
    {
        $rentals = StallRental::with('stall')->orderBy('rental_date', 'desc')->paginate(15);
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $stalls = Stall::all();
        return view('rentals.create', compact('stalls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stall_id' => 'required|exists:stalls,id',
            'tenant_name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'rental_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'is_paid' => 'sometimes|boolean',
        ]);

        StallRental::create([
            'stall_id' => $request->stall_id,
            'tenant_name' => $request->tenant_name,
            'contact' => $request->contact,
            'rental_date' => $request->rental_date,
            'amount' => $request->amount,
            'is_paid' => $request->has('is_paid'),
        ]);

        return redirect()->route('rentals.index')->with('success', 'Rental added successfully!');
    }

    public function edit(StallRental $rental)
    {
        $stalls = Stall::all();
        return view('rentals.edit', compact('rental', 'stalls'));
    }

    public function update(Request $request, StallRental $rental)
    {
        $request->validate([
            'stall_id' => 'required|exists:stalls,id',
            'tenant_name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'rental_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'is_paid' => 'sometimes|boolean',
        ]);

        $rental->update([
            'stall_id' => $request->stall_id,
            'tenant_name' => $request->tenant_name,
            'contact' => $request->contact,
            'rental_date' => $request->rental_date,
            'amount' => $request->amount,
            'is_paid' => $request->has('is_paid'),
        ]);

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully!');
    }

    public function destroy(StallRental $rental)
    {
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully!');
    }
}