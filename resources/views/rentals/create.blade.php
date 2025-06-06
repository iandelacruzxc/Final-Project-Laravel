@extends('layouts.app')

@section('title', 'Add New Rental')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Add New Rental</h2>

            <form action="{{ route('rentals.store') }}" method="POST" class="mt-4">
                @csrf

                <!-- Stall selection -->
                <div class="mb-3">
                    <label for="stall_id" class="form-label">Select Stall</label>
                    <select name="stall_id" id="stall_id" class="form-select @error('stall_id') is-invalid @enderror"
                        required>
                        <option value="">-- Choose Stall --</option>
                        @foreach ($stalls as $stall)
                            <option value="{{ $stall->id }}" {{ old('stall_id') == $stall->id ? 'selected' : '' }}>
                                {{ $stall->stall_number }}
                            </option>
                        @endforeach
                    </select>
                    @error('stall_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tenant selection -->
                <div class="mb-3">
                    <label for="tenant_name" class="form-label">Tenant Name</label>
                    <input type="text" name="tenant_name" id="tenant_name"
                        class="form-control @error('tenant_name') is-invalid @enderror" value="{{ old('tenant_name') }}"
                        required>
                    @error('tenant_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Contact --}}
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" name="contact" id="contact"
                        class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}">
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Rental date -->
                <div class="mb-3">
                    <label for="rental_date" class="form-label">Rental Date</label>
                    <input type="date" name="rental_date" id="rental_date"
                        class="form-control @error('rental_date') is-invalid @enderror"
                        value="{{ old('rental_date', date('Y-m-d')) }}" required>
                    @error('rental_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount (₱)</label>
                    <input type="number" step="0.01" min="0" name="amount" id="amount"
                        class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" required>
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Paid checkbox -->
                <div class="form-check mb-3">
                    <input type="hidden" name="is_paid" value="0">
                    <input class="form-check-input" type="checkbox" name="is_paid" id="is_paid" value="1"
                        {{ old('is_paid', false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_paid">Paid</label>
                </div>

                <!-- Buttons -->
                <button type="submit" class="btn btn-success">Add Rental</button>
                <a href="{{ route('stalls.index') }}" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
@endsection
