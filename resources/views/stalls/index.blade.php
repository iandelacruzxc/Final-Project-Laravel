@extends('layouts.app')

@section('title', 'Stalls')

@section('content')
    <div class="container">

        <h2 class="mb-4 text-center fw-bold display-6">Vendor Stall Monitoring</h2>

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

                            <!-- Rental Info Button (Red for occupied) -->
                            <div class="mt-3">
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#rentalModal{{ $rental->id }}">
                                    Rental Info
                                </button>
                            </div>

                            <!-- Rental Info Modal -->
                            <div class="modal fade" id="rentalModal{{ $rental->id }}" tabindex="-1"
                                aria-labelledby="rentalModalLabel{{ $rental->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rentalModalLabel{{ $rental->id }}">
                                                {{ $stall->stall_number }} Info
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <p><strong>Tenant:</strong> {{ $rental->tenant_name }}</p>
                                            <p><strong>Contact:</strong> {{ $rental->contact ?? 'N/A' }}</p>
                                            <p><strong>Date:</strong> {{ $rental->rental_date->format('M d, Y') }}</p>
                                            <p><strong>Amount:</strong> ₱{{ number_format($rental->amount, 2) }}</p>
                                            <p><strong>Status:</strong>
                                                @if ($rental->is_paid)
                                                    <span class="badge bg-success">Paid</span>
                                                @else
                                                    <span class="badge bg-danger">Unpaid</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-primary">
                                                Edit Rental
                                            </a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        @else
                            <span class="badge bg-success">Vacant</span>

                            <!-- Assign Tenant Button -->
                            <div class="mt-3">
                                <a href="{{ route('stall.assign', $stall->id) }}" class="btn btn-sm btn-outline-success">
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
