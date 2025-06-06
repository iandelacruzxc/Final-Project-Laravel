@extends('layouts.app')

@section('title', 'Edit Rental')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Edit Rental</h2>

            <form action="{{ route('rentals.update', $rental->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="tenant_name" class="form-label">Tenant Name</label>
                    <input type="text" name="tenant_name" id="tenant_name" class="form-control"
                        value="{{ $rental->tenant_name }}" required>
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control" value="{{ $rental->contact }}">
                </div>

                <div class="mb-3">
                    <label for="rental_date" class="form-label">Rental Date</label>
                    <input type="date" name="rental_date" id="rental_date" class="form-control"
                        value="{{ $rental->rental_date->format('Y-m-d') }}" required>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" value="{{ $rental->amount }}"
                        required>
                </div>

                <div class="form-check mb-3">
                    <input type="hidden" name="is_paid" value="0"> <!-- ensures unchecked box sends 0 -->
                    <input type="checkbox" name="is_paid" id="is_paid" class="form-check-input" value="1"
                        {{ $rental->is_paid ? 'checked' : '' }}>
                    <label for="is_paid" class="form-check-label">Paid</label>
                </div>


                <button type="submit" class="btn btn-success">Update Rental</button>
                <a href="{{ route('stalls.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
