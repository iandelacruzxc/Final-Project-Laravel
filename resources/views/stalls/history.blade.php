@extends('layouts.app')

@section('title', 'Rental History')

@section('content')
<h2 class="mb-4">Rental History</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Stall</th>
            <th>Tenant</th>
            <th>Date</th>
            <th>Amount (₱)</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rentals as $rental)
            <tr>
                <td>{{ $rental->stall->stall_number }}</td>
                <td>{{ $rental->tenant->name }}</td>
                <td>{{ $rental->rental_date->format('M d, Y') }}</td>
                <td>{{ number_format($rental->amount, 2) }}</td>
                <td>
                    @if($rental->is_paid)
                        <span class="badge bg-success">Paid</span>
                    @else
                        <span class="badge bg-warning text-dark">Unpaid</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No rental records found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $rentals->links() }}
@endsection
