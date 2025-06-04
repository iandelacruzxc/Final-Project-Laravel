@extends('layouts.app')

@section('title', 'Edit Rental')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2>Edit Rental - {{ $rental->stall->stall_number }}</h2>

        <form action="{{ route('rentals.update', $rental->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="stall_id" class="form-label">Select Stall</label>
                <select name="stall_id" id="stall_id" class="form-select" required>
                    @foreach($stalls as $stall)
                        <option value="{{ $stall->id }}" 
                            {{ (old('stall_id', $rental->stall_id) == $stall->id) ? 'selected' : '' }}>
                            {{ $stall->stall_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tenant_name" class="form-label">Tenant Name</label>
                <input type="text" name="tenant_name" id="tenant_name" 
                       class="form-control @error('tenant_name') is-invalid @enderror"
                       value="{{ old('tenant_name', $rental->tenant_name) }}" required>
                @error('tenant_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact (optional)</label>
                <input type="text" name="contact" id="contact" 
                       class="form-control @error('contact') is-invalid @enderror"
                       value="{{ old('contact', $rental->contact) }}">
                @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rental_date" class="form-label">Rental Date</label>
                <input type="date" name="rental_date" id="rental_date" 
                       class="form-control @error('rental_date') is-invalid @enderror"
                       value="{{ old('rental_date', $rental->rental_date->format('Y-m-d')) }}" required>
                @error('rental_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount (₱)</label>
                <input type="number" step="0.01" min="0" name="amount" id="amount"
                       class="form-control @error('amount') is-invalid @enderror"
                       value="{{ old('amount', $rental->amount) }}" required>
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_paid" id="is_paid" value="1"
                       {{ old('is_paid', $rental->is_paid) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_paid">Paid</label>
            </div>

            <button type="submit" class="btn btn-primary">Update Rental</button>
            <a href="{{ route('rentals.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
