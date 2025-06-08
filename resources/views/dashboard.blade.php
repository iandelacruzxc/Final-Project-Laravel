@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h2 class="mb-4">Dashboard</h2>

        {{-- 🔹 Key Stats Row --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-primary bg-light h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Stalls</h5>
                        <h2 class="text-primary">{{ $totalStalls }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-danger bg-light h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Occupied Today</h5>
                        <h2 class="text-danger">{{ $occupiedStallsToday }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success bg-light h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Vacant</h5>
                        <h2 class="text-success">{{ $vacantStalls }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-dark bg-light h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Unpaid Rentals</h5>
                        <h2 class="text-dark">{{ $unpaidCount }}</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- 💰 Earnings and Pie Chart Row --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card bg-light border mb-3">
                    <div class="card-header">Today's Total Earnings</div>
                    <div class="card-body text-center">
                        <h3 class="card-title mb-0">₱{{ number_format($totalEarningsToday, 2) }}</h3>
                    </div>
                </div>

                {{-- 🌐 Social Links Card --}}
                <div class="card bg-light border mt-3">
                    <div class="card-header">Follow Us</div>
                    <div class="card-body d-flex justify-content-center gap-3">
                        <a href="https://facebook.com" class="btn btn-outline-primary btn-sm rounded-circle" target="_blank"
                            title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com" class="btn btn-outline-info btn-sm rounded-circle" target="_blank"
                            title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://instagram.com" class="btn btn-outline-danger btn-sm rounded-circle" target="_blank"
                            title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://linkedin.com" class="btn btn-outline-secondary btn-sm rounded-circle"
                            target="_blank" title="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- 🟰 Pie Chart --}}
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">Rental Payment Status (Today)</div>
                    <div class="card-body">
                        <canvas id="paymentPieChart" height="230"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const pieCtx = document.getElementById('paymentPieChart').getContext('2d');

        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Paid', 'Unpaid'],
                datasets: [{
                    data: [
                        {{ \App\Models\StallRental::whereDate('rental_date', today())->where('is_paid', true)->count() }},
                        {{ $unpaidCount }}
                    ],
                    backgroundColor: ['rgba(25, 135, 84, 0.8)', 'rgba(220, 53, 69, 0.8)'],
                    borderColor: ['#fff', '#fff'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
@endpush
