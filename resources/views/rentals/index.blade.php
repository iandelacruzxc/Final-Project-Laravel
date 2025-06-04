@extends('layouts.app')

@section('title', 'Tenant Rentals')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Tenant Rentals</h2>
    <a href="{{ route('rentals.create') }}" class="btn btn-primary">Add New Rental</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>Stall</th>
            <th>Tenant Name</th>
            <th>Contact</th>
            <th>Rental Date</th>
            <th>Amount (₱)</th>
            <th>Payment Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rentals as $rental)
            <tr>
                <td>{{ $rental->stall->stall_number }}</td>
                <td>{{ $rental->tenant_name }}</td>
                <td>{{ $rental->contact ?? '-' }}</td>
                <td>{{ $rental->rental_date->format('M d, Y') }}</td>
                <td>{{ number_format($rental->amount, 2) }}</td>
                <td>
                    @if($rental->is_paid)
                        <span class="badge bg-success">Paid</span>
                    @else
                        <span class="badge bg-warning text-dark">Unpaid</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure you want to delete this rental?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No rentals found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $rentals->links() }}
@endsection
