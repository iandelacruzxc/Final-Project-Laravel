@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Vendor Stall Monitoring</h1>

<div class="mb-3 fs-4">
    Today's Total Earnings: <strong>₱{{ number_format($totalEarnings, 2) }}</strong>
</div>

<div class="d-flex flex-wrap">
    @foreach($stalls as $stall)
        @php
            $rental = $stall->todayRental;
        @endphp

        <div class="stall-box {{ $rental ? 'occupied' : 'vacant' }}">
            <div>{{ $stall->stall_number }}</div>

            @if($rental)
                <div class="mt-2">{{ $rental->tenant_name }}</div>
            @else
                <a href="{{ route('stall.assign', $stall->id) }}" 
                   class="btn btn-light btn-sm mt-2 px-3" 
                   title="Assign Tenant to {{ $stall->stall_number }}">+</a>
            @endif
        </div>
    @endforeach
</div>
@endsection
