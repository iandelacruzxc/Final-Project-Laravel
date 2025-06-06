@extends('layouts.app')

@section('title', 'Stalls')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Vendor Stall Monitoring</h1>
        </div>

        <div class="alert alert-info fs-5">
            Today's Total Earnings: <strong>₱{{ number_format($totalEarnings, 2) }}</strong>
        </div>

        <div class="row">
            @foreach ($stalls as $stall)
                @php
                    $rental = $stall->todayRental;
                @endphp

                <div class="col-md-3 mb-4">
                    <div class="card border-{{ $rental ? 'danger' : 'success' }}">
                        <div class="card-header bg-{{ $rental ? 'danger' : 'success' }} text-white text-center">
                            {{ $stall->stall_number }}
                        </div>
                        <div class="card-body text-center">
                            @if ($rental)
                                <p class="mb-1"><strong>{{ $rental->tenant_name }}</strong></p>
                                <span class="badge bg-danger">Occupied</span>
                                <div class="mt-3">
                                    <a href="{{ route('rentals.edit', $rental->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Edit Rental
                                    </a>
                                </div>
                            @else
                                <span class="badge bg-success">Vacant</span>
                                <div class="mt-3">
                                    <a href="{{ route('stall.assign', $stall->id) }}"
                                        class="btn btn-sm btn-outline-success">
                                        Assign Tenant
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
