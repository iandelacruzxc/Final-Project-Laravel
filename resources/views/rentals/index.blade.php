@extends('layouts.app')

@section('title', 'Tenant Rentals')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Tenant Rentals</h4>
        <a href="{{ route('stalls.index') }}" class="btn btn-primary btn-sm">Add New Rental</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle table-bordered bg-white"> {{-- 60% background --}}
            <thead class="table-dark"> {{-- 10% accent --}}
                <tr>
                    <th>Stall</th>
                    <th>Tenant</th>
                    <th>Contact</th>
                    <th>Date</th>
                    <th>Amount (₱)</th>
                    <th>Status</th>
                    <th style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->stall->stall_number }}</td>
                        <td>{{ $rental->tenant_name }}</td>
                        <td>{{ $rental->contact ?? 'N/A' }}</td>
                        <td>{{ $rental->rental_date->format('F d, Y') }}</td>
                        <td>{{ number_format($rental->amount, 2) }}</td>
                        <td>
                            @if ($rental->is_paid)
                                <span class="badge bg-success">Paid</span>
                            @else
                                <span class="badge bg-danger">Unpaid</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this rental?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No rentals found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $rentals->links() }}
    </div>
@endsection
