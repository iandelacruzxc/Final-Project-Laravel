@extends('layouts.app')

@section('title', 'Assign Tenant')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2>Assign Tenant to {{ $stall->stall_number }}</h2>

        <form action="{{ route('stall.assign.store', $stall->id) }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Tenant Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact (optional)</label>
                <input type="text" class="form-control" id="contact" name="contact" 
                       value="{{ old('contact') }}">
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount (₱)</label>
                <input type="number" step="0.01" min="0" class="form-control" id="amount" 
                       name="amount" value="{{ old('amount') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Assign Tenant</button>
            <a href="{{ route('stalls.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
