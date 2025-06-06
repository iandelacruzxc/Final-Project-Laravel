@extends('layouts.app')

@section('title', 'Rental History')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Rental History</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle bg-white">
            <thead class="table-dark text-center">
                <tr>
                    <th>Stall</th>
                    <th>Tenant</th>
                    <th>Contact</th>
                    <th>Rental Date</th>
                    <th>Amount (₱)</th>
                    <th>Status</th>
                    <th style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rentals as $rental)
                    <tr>
                        <td>{{ $rental->stall->stall_number }}</td>
                        <td>{{ $rental->tenant_name }}</td>
                        <td>{{ $rental->contact ?? '-' }}</td>
                        <td>{{ $rental->rental_date->format('M d, Y') }}</td>
                        <td>₱{{ number_format($rental->amount, 2) }}</td>
                        <td class="text-center">
                            @if ($rental->is_paid)
                                <span class="badge bg-success">Paid</span>
                            @else
                                <span class="badge bg-danger">Unpaid</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this rental?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No rental records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $rentals->links() }}
    </div>
</div>
@endsection
